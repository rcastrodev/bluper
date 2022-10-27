<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'order'             => 'A1',
            'name'              => 'Chicles',
            'slug'              => 'chicles',
            'outstanding'       => 1,
        ]);

        Category::create([
            'order'             => 'A2',
            'name'              => 'Pastillas',
            'slug'              => 'pastillas',
            'outstanding'       => 1,
        ]);

        Category::create([
            'order'             => 'A3',
            'name'              => 'Juguetes con golosinas',
            'slug'              => 'juguetes-con-golosinas',
            'outstanding'       => 1,
        ]);

        Category::create([
            'order'             => 'A4',
            'name'              => 'Slime',
            'slug'              => 'slime',
            'outstanding'       => 1,
        ]);
    }
}
