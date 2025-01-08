<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\SuggestionResource;
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
}
