<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\SuggestionResource;
use App\Models\Product;
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

        $suggestion_keywords = Product::where('keywords', 'like', '%' . $text . '%')->pluck('keywords')
        ->flatMap(function ($keywords) {
            return explode(',', $keywords);
        })->filter(function ($word) use ($text){
            return stripos($word, $text) !== false; // Case-insensitive match
        })->unique()->values()->take(20)->toArray();


        $suggestion_products = Product::where('keywords', 'like', '%' . $text . '%')
            ->orWhere('name', 'like', '%' . $text . '%')
            ->limit(15)->get();


        return Helper::ApiResponse('', [
            'keywords' => $suggestion_keywords,
            'suggestion' => [
                [
                    'title' => "Products",
                    'products' => $suggestion_products
                ]
            ]
        ]);
    }
}
