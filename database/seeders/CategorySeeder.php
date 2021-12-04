<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'SPORTSWEAR',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'MENS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'WOMENS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'KIDS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'FASHION',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'HOUSEHOLDS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'INTERIORS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'CLOTHING',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'BAGS',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'SHOES',
            'category_discription' => 'It is a long established fact that a reade',
        ]);
    }
}
