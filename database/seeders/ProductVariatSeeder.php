<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\VariationAttribute;
use App\Models\VariationOption;
use Illuminate\Database\Seeder;

class ProductVariatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

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


    public function run(): void
    {



        $product_ids = Product::pluck('id')->toArray();
        foreach ($product_ids as $product_id) {


            $GLOBALS['product_variants'] = [];

            $attributes = [];
            for($i = 0; $i < rand(1,3); $i++){
                $attribute_id = fake()->randomElement(VariationAttribute::get()->pluck('id')->toArray());
                if(!in_array($attribute_id, $attributes)){
                    $attributes[] = $attribute_id;
                }
            }



            $combinations = collect();
            for ($i = 0; $i < count($attributes); $i++){
                $attribute_idd = $attributes[$i];
                $attribute_option = VariationOption::where('variation_attribute_id', $attribute_idd)
                    ->pluck('id')
                    ->toArray();

                if ($i == 0){
                    $combinations = collect($attribute_option);
                }
                else{
                    $combinations = $combinations->crossJoin($attribute_option);
                }
            }

            $combinations = $combinations->map(function ($item) {
                return $this->mergeCombination($item);
            });

            $combinations->each(function ($variant_combination) use ($product_id) {
                $variant = ProductVariant::factory()->count(1)->make()->first()->toArray();
                $variant['product_id'] = $product_id;
                $variant['variation_combinations'] = json_encode($variant_combination);
                $GLOBALS['product_variants'] [] = $variant;
            });

            ProductVariant::insert($GLOBALS['product_variants']);
        }



        /*$product_variants = ProductVariant::factory()->count(1)->make();
        dd($product_variants);


        try {
            ProductVariant::insert($product_variants->toArray());
        }
        catch (\Exception $e) {

        }*/
    }
}
