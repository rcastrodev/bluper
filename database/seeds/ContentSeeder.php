<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        Content::create([
            'section_id'=> 1,
            'order'     => 'AA',
            'image'     => 'images/home/image_robot_2.png',
            'content_1' => 'Encontrá tus golosinas favoritas',
        ]);

        Content::create([
            'section_id'=> 2,
            'order'     => 'A1',
            'image'     => 'images/news/image15.png',
            'content_1' => 'Nuevos chicles bola',
            'content_2' => '<p>Nuevos chicles bola</p>',
            'content_3' => 'Productos',
        ]);


        Content::create([
            'section_id'=> 2,
            'order'     => 'A2',
            'image'     => 'images/news/image16.png',
            'content_1' => 'Slime con brillantinas',
            'content_2' => '<p>Nuevos slime con brillantinas</p>',
            'content_3' => 'Productos',
        ]);


        Content::create([
            'section_id'=> 2,
            'order'     => 'A3',
            'image'     => 'images/news/image17.png',
            'content_1' => 'Heladitos con chicles confitados bolitas para decorar',
            'content_2' => '<p>Te dejamos una idea muy linda para hacer este verano.</p>',
            'content_3' => 'Ideas',
        ]);
        
        /** Nosotros */
        Content::create([
            'section_id'=> 4,
            'content_1' => 'Quienes somos',
            'content_2' => '<p>Somos  pioneros en la fabricación de juguetes con golosinas de la República Argentina.</p>
            <p>Actualmente la empresa se encuentra gestionada por la 2da y 3ra generación familiar, siendo una tradición y referencia dentro del rubro de las golosinas.</p>
            <p>Atendida por sus propios dueños ofrecemos una atención personalizada y asesoramiento para todas aquellas consultas sobre nuestros productos.</p>',
            'image'     => 'images/company/image8.png',
            'image2'     => 'images/company/image104.png',
        ]);

        Content::create([
            'section_id'=> 5,
            'content_1' => '¿Por qué elegirnos?',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'A1',
            'image'     => 'images/company/noun-fast-195788.png',
            'content_1' => 'Servicio',
            'content_2' => '<p>Servicio, Calidad y Rapidez en las entregas son las pautas con que trabaja nuestra empresa.</p>',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'A2',
            'image'     => 'images/company/Group3714.png',
            'content_1' => 'Misión',
            'content_2' => '<p>Atención preferencial y trato cordial, hacen que cada cliente, se contacte directamente con nuestro Dto. de Ventas, dando así, rápida respuesta a cada necesidad.</p>',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'A3',
            'image'     => 'images/company/noun-quality-3320903.png',
            'content_1' => 'Calidad',
            'content_2' => '<p>Contamos con LABORATORIO para ensayos y pruebas de materiales, desarrollo de nuevos productos y contamos con certificación de SENASA e INAL.</p>',
        ]);
    }
}














