<?php

namespace App\Http\Controllers;

use App\Page;
use App\Brand;
use App\Product;
use App\Category;
use App\Application;
use App\ProductPicture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $categories = Category::all();
        return view('administrator.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $data['outstanding'] = $request->has('outstanding') ? '1' : '0';

        $product = Product::create($data);
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }

        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 6 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'categories', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {        
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $data['outstanding'] = $request->has('outstanding') ? '1' : '0';
        $product = Product::find($request->input('id'));

        if($request->hasFile('data_sheet')){
            if (Storage::disk('public')->exists($product->data_sheet))
                    Storage::disk('public')->delete($product->data_sheet);
            
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet', 'public');
        }

        $product->update($data);

        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }
                        
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        $element = Product::find($id);
        if (Storage::disk('public')->exists($element->data_sheet))
            Storage::disk('public')->delete($element->data_sheet);

        $element->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroyDescriptionImage($id, $field)
    {
        $element = Product::find($id);
        if (Storage::disk('public')->exists($element->$field))
            Storage::disk('public')->delete($element->$field);
        
        $element->$field = null;
        $element->save();
    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');
        return DataTables::of($products)
        ->editColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }

    public function imageDestroyProduct($id)
    {
        $element = ProductPicture::find($id);
        if ($element) {
            if (Storage::disk('public')->exists($element->image)) {
                Storage::disk('public')->delete($element->image);
                $element->delete();
            }
        }
        return response()->json([], 200);
    }

    public function import(Request $request) 
    {
        try {
            if (! $request->hasFile('products')) return back();
                $result = Excel::import(new ProductImport, $request->file('products'));
                
            return back()->with('mensaje', 'Importaci??n completada con exito');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back();
        }

    }
}
