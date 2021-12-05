<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'brand_name' => 'ACNE',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'GRUNE ERDE',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'ALBIRO',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'RONHILL',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'ODDMOLLY',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'BOUDESTIJN',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'ROSCH',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'CREATIVE CULTURE',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'SQURE',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('brands')->insert([
            'brand_name' => 'UNILIVER',
            'brand_discription' => 'It is a long established fact that a reade',
        ]);
    }
}
