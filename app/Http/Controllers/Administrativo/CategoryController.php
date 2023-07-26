<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $page = Page::where('view', 'category.index')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.categoria.index', compact('contador'));
    }

    public function create()
    {
        $page = Page::where('view', 'category.create')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.categoria.create', compact('contador'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'time' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'time' => $request->time,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria creada Exitosamente.');
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
                
        $page = Page::where('view', 'category.edit')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.categoria.edit', compact('categoria','contador'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'time' => 'required'
        ]);

        $categoria = Category::find($id);
        $categoria->name = $request->name;
        $categoria->time = $request->time;

        $categoria->save();
        return redirect()->route('categories.index')->with('success', 'Categoria editada Exitosamente.');
    }

}
