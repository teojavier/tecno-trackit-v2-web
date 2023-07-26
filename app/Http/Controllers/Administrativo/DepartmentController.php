<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\Page;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $page = Page::where('view', 'departments.index')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.departamento.index', compact('contador'));
    }

    public function create()
    {
        $page = Page::where('view', 'departments.create')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.departamento.create', compact('contador'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Department::create([
            'name' => $request->name,
            'table' => 'departments',
            'redirect' => '/departments'
        ]);

        return redirect()->route('departments.index')->with('success', 'departamento creado Exitosamente.');
    }

    public function edit($id)
    {
        $departamento = Department::find($id);
                
        $page = Page::where('view', 'departments.edit')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.departamento.edit', compact('departamento','contador'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $departamento = Department::find($id);
        $departamento->name = $request->name;

        $departamento->save();
        return redirect()->route('departments.index')->with('success', 'departamento editado Exitosamente.');
    }
}
