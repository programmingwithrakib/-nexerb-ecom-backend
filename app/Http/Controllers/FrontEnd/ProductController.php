<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\ProductResource;
use App\Http\Resources\VariationResource;
use App\Models\Product;
use App\Models\ProductKeywords;
use App\Models\ProductVariant;
use App\Models\VariationAttribute;
use App\Utils\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function get_products(Request $request)
    {
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0);
        $q = $request->input('q', false);
        $product_query = Product::query();
        $min_price = $request->input('min', 0);
        $max_price = $request->input('max', 0);
        $tags = $request->input('tags', false);
        $variations = $request->input('vrt', false);

        if($q){
            $product_query = $product_query->where('name', 'like', '%' . $q . '%');
        }


        $product_query = $product_query->whereHas('product_variants', function ($product_variants) use ($min_price, $max_price, $variations) {
            if($min_price && $max_price) {
                $product_variants->whereBetween('after_discount_sell_price', [$min_price, $max_price]);
            }

            if ($variations){
                $variation_array = explode(' ', $variations);
                $product_variants->whereHas('variation_option', function ($variation_option) use ($variation_array) {
                   $variation_option->where(function ($query) use ($variation_array) {
                       foreach ($variation_array as $variation){
                           $query->orWhere('name', 'like', '%' . $variation . '%');
                       }
                   });
                });

            }
        });


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
        $products =  $product_query->with(['product_variants.variation_option', 'product_keywords'])->limit($limit)->skip($offset)->get();

        $variation_option_ids = ProductVariant::whereIn('product_id', $product_ids)->pluck('variation_option_id')->toArray();
        $variations = VariationAttribute::whereIn('id', $variation_option_ids)->with('variation_options')->get();

        $keywords =  ProductKeywords::whereIn('product_id', $product_ids)->distinct()->take(50)->select(
            DB::raw('keyword_name as name'),
            DB::raw("COUNT(product_id) as count_of_product")
        )->groupBy('keyword_name')->get();

        return Helper::ApiResponse('', [
            'tags' => $keywords,
            'price_range' => [
                'min' => ProductVariant::whereIn('product_id', $product_ids)->min('after_discount_sell_price'),
                'max' => ProductVariant::whereIn('product_id', $product_ids)->max('after_discount_sell_price'),
            ],
            'variations' => VariationResource::collection($variations),
            'products' => ProductResource::collection($products),
        ]);
    }
}
