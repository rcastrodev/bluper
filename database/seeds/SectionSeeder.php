<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Inicio */
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_1']);

        /** novedades */
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_1']);

        /** representantes */
        Section::create(['page_id' => Page::where('name', 'representantes')->first()->id, 'name' => 'section_1']);

        /** nosotros */
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_3']);
    }
}
