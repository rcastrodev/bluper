<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id'   => 1,        
            'order'         => 'A1',
            'code'          => '30022',
            'name'          => 'Frasco Bolon mediano',
            'slug'          => 'frasco-bolon-mediano',
        ]);

        Product::create([
            'category_id'   => 2,        
            'order'         => 'A2',
            'code'          => '30022',
            'name'          => 'Bolsa pastillas botoncitos',
            'slug'          => 'bolsa-pastillas-botoncitos',
        ]);
    }
}






