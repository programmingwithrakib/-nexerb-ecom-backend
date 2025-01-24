<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\ProductDetailResource;
use App\Http\Resources\FrontEnd\ProductResource;
use App\Http\Resources\FrontEnd\VariantResource;
use App\Http\Resources\FrontEnd\VariationResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductKeywords;
use App\Models\ProductVariant;
use App\Models\VariationAttribute;
use App\Models\VariationOption;
use App\Utils\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function get_products(Request $request)
    {


        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);
        $load_more = $request->input('load-more', false);
        $q = $request->input('q', '');
        $product_query = Product::with('product_keywords', 'product_variants');
        $min_price = $request->input('min', 0);
        $max_price = $request->input('max', 0);
        $tags = $request->input('tags', '');
        $sort_by = $request->input('sort_by', '');
        $variations_query = $request->input('vrt', '');
        $collections = $request->input('collections', '');

        $next_load_product_route = route('products', [
            ...$request->query(),
            'load-more' => true,
            'offset' => $offset+$limit,
        ]);



        if($q){
            $product_query = $product_query->where('name', 'like', '%' . $q . '%');
        }


        $product_query = $product_query->whereHas('product_variants', function ($product_variants) use ($min_price, $max_price, $variations_query) {
            if($min_price && $max_price) {
                $product_variants->whereBetween('after_discount_sell_price', [$min_price, $max_price]);
            }

            if ($variations_query){
                $variation_array = explode(' ', $variations_query);
                $variation_option = VariationOption::whereIn('name', $variation_array)->pluck('id')->toArray();

                $product_variants->whereJsonContains('variation_combinations', $variation_option);

            }
        });


        if ($collections){
            $product_query = $product_query->whereHas('category', function ($category) use ($collections) {
                $collection_array = explode(' ', $collections);
                $category->whereIn('slug', $collection_array);
            });
        }



        if ($tags){
            $tags_array = explode(' ', $tags);
            $product_query = $product_query->whereHas('product_keywords', function ($product_keywords) use ($tags_array) {
                $product_keywords->where(function($query) use ($tags_array) {
                   foreach ($tags_array as $tag) {
                       $query->orWhere('keyword_name', 'like', '%' . $tag . '%');
                   }
                });
            });
        }


        $product_ids = $product_query->pluck('id')->toArray();
        $category_ids = $product_query->pluck('category_id')->unique()->toArray();
        $products =  $product_query->with(['product_keywords'])->limit($limit)->skip($offset)->get();

        if (!$load_more){
            $variation_option_ids = Cache::remember('variation_options_ids', now()->addMinutes(10), function () use ($product_ids) {
                return ProductVariant::whereIn('product_id', $product_ids)
                    ->pluck('variation_combinations')
                    ->flatMap(function ($variation_combinations) {
                        return json_decode($variation_combinations);
                    })->unique()->toArray();
            });


            $variations = VariationAttribute::whereIn('id', $variation_option_ids)->with('variation_options')->get();


            $keywords =  ProductKeywords::whereIn('product_id', $product_ids)->distinct()->take(50)->select(
                DB::raw('keyword_name as name'),
                DB::raw("COUNT(product_id) as count_of_product")
            )->groupBy('keyword_name')->get();


            $categories = Category::whereIn('id', $category_ids)->withCount('products')->get()->map(function ($item) {
                return [
                    'name' => $item->name,
                    'slug' => $item->slug,
                    'count_of_product' => $item->products_count,
                ];
            });





            return Helper::ApiResponse('', [
                'count_of_product' => count($product_ids),
                'next-load' => $next_load_product_route,
                'query' => [
                    'limit' => $limit,
                    'offset' => $offset,
                    'q' => $q,
                    'min_price' => $min_price,
                    'max_price' => $max_price,
                    'tags' => $tags,
                    'vrt' => $variations_query,
                    'sort_by' => $sort_by
                ],
                'sort_by' => [
                    'price-desc' => 'Price, high to low',
                    'price-asc' => 'Price, low to high',
                    'best-selling' => 'Best Selling',
                    'stock_available' => 'Availability',
                    'title-asc' => 'Alphabetically, A-Z',
                    'title-desc' => 'Alphabetically, Z-A',
                    'date-desc' => 'Date, Old To New',
                    'date-asc' => 'Date, New to Old',
                    'sale-off' => 'Sale Off',
                ],
                'collections' => $categories,
                'tags' => $keywords,
                'price_range' => [
                    'min' => ProductVariant::whereIn('product_id', $product_ids)->min('after_discount_sell_price'),
                    'max' => ProductVariant::whereIn('product_id', $product_ids)->max('after_discount_sell_price'),
                ],
                'variations' => VariationResource::collection($variations),
                'products' => ProductResource::collection($products),
            ]);
        }
        else{
            return Helper::ApiResponse('', [
                'next-load' => $next_load_product_route,
                'products' => ProductResource::collection($products),
            ]);
        }



    }


    public function mergeCombination($item){
        $d = [];
        // If it's an array, recursively flatten the array
        if(is_array($item)){
            foreach ($item as $subItem) {
                $d = array_merge($d, $this->mergeCombination($subItem));  // Recursively flatten
            }
        }
        // If it's numeric, add to the result array
        elseif (is_numeric($item)){
            $d[] = $item;
        }
        return $d;
    }

    public function product_details($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();


        return Helper::ApiResponse('', ProductDetailResource::make($product));
    }


    public function get_variant_product(Request $request, $slug)
    {
        $combination_input = $request->combination;
        $combination = explode(',', $combination_input);
        $combination = array_map(function($item){
            return intval($item);
        }, $combination);
        $product = Product::where('slug', $slug)->firstOrFail();

        $variation_product = $product->product_variants()->extractVariationMatch($combination)->firstOrFail();

        return Helper::ApiResponse('',[
            'product_variant_info' => VariantResource::make($variation_product),
        ]);
    }
}
