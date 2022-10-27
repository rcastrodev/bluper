<?php

namespace App\Http\Controllers;

use App\Page;
use App\Image;
use App\Content;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function create()
    {
        return view('administrator.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $request->has('outstanding') ? $data['outstanding'] = 1 : $data['outstanding'] = 0;

        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/category', 'public');

        $category = Category::create($data);
        
        return response()->json([], 201);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('administrator.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request)
    {
        $element = Category::find($request->input('id'));
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $request->has('outstanding') ? $data['outstanding'] = 1 : $data['outstanding'] = 0;

        if ($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
                
            $data['image'] = $request->file('image')->store('images/category', 'public');
        }
        
        $element->update($data);
        return response()->json([], 200);
    }

    public function find($id)
    {
        $content = Category::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Category::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function getList()
    {
        $categories = Category::orderBy('order', 'ASC');
        return DataTables::of($categories)
        ->editColumn('image', function($category) {
            if (Storage::disk('public')->exists($category->image))
                return '<img src="'.asset($category->image).'" width="80" height="50" style="object-fit: cover;">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

}
