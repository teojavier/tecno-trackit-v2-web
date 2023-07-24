<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
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
        $roles = Role::all();
        return view('administrativo.usuario.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'required|min:7',
            'check' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ])->assignRole($request->check);

        return redirect()->route('users.index')->with('success', 'Usuario creado Exitosamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('usuario.edit', compact('user', 'roles'));
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
        return redirect()->route('administrativo.usuario.index')->with('success', 'Usuario editado Exitosamente.');
    }

}
