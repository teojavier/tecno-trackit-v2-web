<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $page = Page::where('view', 'users.index')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.usuario.index', compact('contador'));
    }

    public function create()
    {
        $page = Page::where('view', 'users.create')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;
        $roles = Role::all();
        $departamentos = Department::all();

        return view('administrativo.usuario.create', compact('roles', 'contador', 'departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:7',
            'check' => 'required',
            'department_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'table' => 'users',
            'redirect' => '/users',
            'department_id' => $request->department_id,
        ])->assignRole($request->check);

        return redirect()->route('users.index')->with('success', 'Usuario creado Exitosamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        
        $page = Page::where('view', 'users.edit')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;
        $departamentos = Department::all();
        $depa = Department::find($user->department_id);

        return view('administrativo.usuario.edit', compact('user', 'roles', 'contador', 'departamentos', 'depa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:7',
            'check' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->password != ""){
            $user->password = bcrypt($request->password);
        }
        $user->roles()->sync($request->check);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario editado Exitosamente.');
    }

}
