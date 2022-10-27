<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description)); 
        $sections   = $page->sections;
        $sliders    = Content::where('section_id', 1)->orderBy('order', 'ASC')->limit(4)->get();
        $categories = Category::where('outstanding', '1')->orderBy('order', 'ASC')->limit(4)->get();
        $products   = Product::where('outstanding', '1')->orderBy('order', 'ASC')->limit(4)->get();
        $news       = Content::where('section_id', 2)->where('content_5', '1')->orderBy('order', 'ASC')->limit(3)->get();
        return view('paginas.index', compact('sliders', 'categories', 'products', 'news'));
    }

    public function productos(Request $request)
    {
        SEO::setTitle('produtos');
        SEO::setDescription(strip_tags($this->data->description)); 
        $categorias = Category::orderBy('order', 'ASC')->get();
        if ($request->get('producto'))
            $productos = Product::where('name', 'like', "%{$request->get('producto')}%")->orderBy('order', 'ASC')->get();
        else
            $productos = Product::orderBy('order', 'ASC')->get();
        
        
        return view('paginas.productos', compact('productos', 'categorias'));
    }

    public function categoria($slug)
    {
        SEO::setTitle('categorías');
        SEO::setDescription(strip_tags($this->data->description)); 
        $categoria = Category::where('slug', $slug)->first();
        if(! $categoria) abort('404');
        $categorias = Category::orderBy('order', 'ASC')->get();
        $productos = $categoria->products()->orderBy('order', 'ASC')->get();
        return view('paginas.categoria', compact('productos', 'categorias', 'categoria'));
    }

    public function producto($slug)
    {
        $producto = Product::where('slug', $slug)->first();
        if (!$producto) abort('404');
        SEO::setTitle($producto->name);
        SEO::setDescription(strip_tags($producto->description)); 
        return view('paginas.producto', compact('producto'));
    }

    public function novedades()
    {
        SEO::setTitle('novedades');
        SEO::setDescription(strip_tags($this->data->description)); 
        $news = Content::where('section_id', 2)->orderBy('order', 'ASC')->get();
        return view('paginas.novedades', compact('news'));
    }

    public function novedad($id)
    {
        $new = Content::findOrFail($id);
        SEO::setTitle($new->content_1);
        SEO::setDescription(strip_tags($new->content_3)); 
        return view('paginas.novedad', compact('new'));
    }

    public function empresa()
    {
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($this->data->description));
        $section1  = Content::where('section_id', 4)->first();
        $section2  = Content::where('section_id', 5)->first();
        $sections3 = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        return view('paginas.empresa', compact('section1', 'section2', 'sections3'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description)); 
        $descargas = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('descargas'));
    }

    public function contacto()
    {
        $content = Content::where('section_id', 9)->where('content_1', 'Contacto')->first();
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        return view('paginas.contacto', compact('content'));
    }

    public function descargarArchivo($id, $reg)
    {
        $content = Content::findOrFail($id);  
        if (Storage::disk('public')->exists($content->$reg)) {
            return Response::download($content->$reg);  
        }else{
            return back();  
        }
        
    }

}
