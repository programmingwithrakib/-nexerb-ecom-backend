<?php

namespace Database\Seeders;

use App\Models\SearchSuggestion;
use App\Models\SuggestionKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestionKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keywords = [
            'jackets',
            'blazer',
            'sweatshirt',
        ];

        foreach ($keywords as $keyword) {
            SuggestionKeyword::insert([
                'keyword' => $keyword,
            ]);
        }

    }
}
