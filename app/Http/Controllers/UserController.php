<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::whereNotIn('int_GrupoId', [1,2,3,19,15,16,17,18,20,22])->paginate();
        return view('pages.usuarios.index',['usuarios'=> $usuarios]);

    }


    public function promoteToAdmin($id)
{
    $user = User::findOrFail($id);
    $user->role = 'admin';
    $user->save();

    return redirect()->back()->with('success', 'Usuário promovido a administrador com sucesso!');
}
}
