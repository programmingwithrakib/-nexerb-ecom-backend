<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Nike',
                'slug' => Str::slug('Nike'),
                'short_desc' => 'Nike is a global leader in sportswear and footwear.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg',
            ],
            [
                'name' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'short_desc' => 'Adidas is a German multinational corporation that designs shoes, clothing, and accessories.',
                'logo' => 'https://static.vecteezy.com/system/resources/thumbnails/010/994/239/small_2x/adidas-logo-black-symbol-clothes-design-icon-abstract-football-illustration-with-white-background-free-vector.jpg',
            ],
            [
                'name' => 'Puma',
                'slug' => Str::slug('Puma'),
                'short_desc' => 'Puma is a German multinational corporation that designs and manufactures athletic and casual footwear, apparel, and accessories.',
                'logo' => 'https://w7.pngwing.com/pngs/670/927/png-transparent-puma-logo-puma-logo-adidas-swoosh-brand-adidas-text-carnivoran-sneakers-thumbnail.png',
            ],
            [
                'name' => 'Reebok',
                'slug' => Str::slug('Reebok'),
                'short_desc' => 'Reebok is a global athletic footwear and apparel company.',
                'logo' => 'https://e7.pngegg.com/pngimages/623/514/png-clipart-reebok-logo-reebok-outlet-store-destin-logo-shoe-sneakers-reebok-logo-s-angle-text-thumbnail.png',
            ],
            [
                'name' => 'Under Armour',
                'slug' => Str::slug('Under Armour'),
                'short_desc' => 'Under Armour is an American sportswear and casual apparel brand.',
                'logo' => 'https://www.logo.wine/a/logo/Under_Armour/Under_Armour-Logo.wine.svg',
            ],
            [
                'name' => 'Levi\'s',
                'slug' => Str::slug('Levis'),
                'short_desc' => 'Levi Strauss & Co. is an American clothing company known worldwide for its Levi\'s brand of denim jeans.',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRB5MI0VSB2ZrcnhijA57e6ByZ_2PUcGITh73EqKhi9XBmLRhDWDuaQR9iYm6nFqDvjA88&usqp=CAU',
            ],
            [
                'name' => 'H&M',
                'slug' => Str::slug('H&M'),
                'short_desc' => 'H&M is a Swedish multinational clothing retail company.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/8/8e/H%26M-Logo.svg',
            ],
            [
                'name' => 'Zara',
                'slug' => Str::slug('Zara'),
                'short_desc' => 'Zara is a Spanish multinational company known for its trendy and stylish fashion.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/f4/Zara_Logo.svg',
            ],
            [
                'name' => 'Uniqlo',
                'slug' => Str::slug('Uniqlo'),
                'short_desc' => 'Uniqlo is a Japanese global apparel retailer.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Uniqlo_logo.svg',
            ],
            [
                'name' => 'Gucci',
                'slug' => Str::slug('Gucci'),
                'short_desc' => 'Gucci is an Italian luxury fashion brand.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/53/Gucci_logo.svg',
            ],
            [
                'name' => 'Louis Vuitton',
                'slug' => Str::slug('Louis Vuitton'),
                'short_desc' => 'Louis Vuitton is a French luxury fashion house and retail company.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Louis_Vuitton_logo_2.svg',
            ],
            [
                'name' => 'Chanel',
                'slug' => Str::slug('Chanel'),
                'short_desc' => 'Chanel is a French luxury fashion house that focuses on haute couture, ready-to-wear, and accessories.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/5f/Chanel_logo_interlocking_c_and_h.png',
            ],
            [
                'name' => 'Burberry',
                'slug' => Str::slug('Burberry'),
                'short_desc' => 'Burberry is a British luxury fashion brand known for its trench coats.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/73/Burberry_Logo.svg',
            ],
            [
                'name' => 'Ralph Lauren',
                'slug' => Str::slug('Ralph Lauren'),
                'short_desc' => 'Ralph Lauren is an American fashion company known for its premium lifestyle brand.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Ralph_Lauren_logo.svg',
            ],
            [
                'name' => 'Tommy Hilfiger',
                'slug' => Str::slug('Tommy Hilfiger'),
                'short_desc' => 'Tommy Hilfiger is an American multinational corporation known for its preppy American style.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/16/Tommy_Hilfiger_logo.svg',
            ],
        ];

        // Insert brands
        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand['name'],
                'slug' => $brand['slug'],
                'short_desc' => $brand['short_desc'],
                'logo' => $brand['logo'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
