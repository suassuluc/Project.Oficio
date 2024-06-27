<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $oficio = oficio::paginate();
        return view('pages.protocolos.home',['oficio'=> $oficio]);
    }

    public function alterarAutorizado(Request $request, $id)
    {
        $novoEstado = $request->input('novoEstado');

        $oficio = Oficio::findOrFail($id);
        $oficio->autorizado = $novoEstado;
        $oficio->save();

        return response()->json(['success' => true]);
    }

}
