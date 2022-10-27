<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'=> Company::first()->id,
            'address'   => 'Tres Arroyos 329 - Parque Industrial La Cantábrica Planta N° 18 - Haedo - Bs. As. - Argentina',
            'email'     => 'blupergolosinas@gmail.com',
            'phone1'    => '+540111560249844|011 15-6024-9844',
            'phone3'    => '+540111560249844',
            'instagram' => '#',
            'facebook'  => '#',
            'logo_header'=> 'images/data/logo_header.png',
            'logo_footer'=> 'images/data/logo_footer.png',
        ]);
    }
}