<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\ProductResource;
use App\Http\Resources\FrontEnd\SuggestionResource;
use App\Models\Product;
use App\Models\ProductKeywords;
use App\Models\Suggestion;
use App\Models\SuggestionKeyword;
use App\Utils\Helper;

class SearchController extends Controller
{
    public function search_suggestion()
    {
        $keywords = SuggestionKeyword::pluck('keyword')->toArray();
        $suggestion = SuggestionResource::collection(Suggestion::get());

        return Helper::ApiResponse('', [
            'keywords' => $keywords,
            'suggestion' => $suggestion
        ]);
    }


    public function search_suggestion_product($text)
    {

        $suggestion_keywords = ProductKeywords::where('keyword_name', 'like', '%' . $text . '%')->distinct()->take(20)->pluck('keyword_name')->toArray();

        $suggestion_products = Product::whereRelation('product_keywords', 'keyword_name','like', '%' . $text . '%')
            ->orWhere('name', 'like', '%' . $text . '%')
            ->limit(15)->get();


        return Helper::ApiResponse('', [
            'keywords' => $suggestion_keywords,
            'suggestion' => [
                [
                    'title' => "Products",
                    'products' => ProductResource::collection($suggestion_products)
                ]
            ]
        ]);
    }
}
