<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Oficio;
use App\Models\Setor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProtocolosController extends Controller
{
    public function create()
    {
        $setores = Setor::all();
        $roles= User::ROLE;
        return view('pages.protocolos.create', ['setores' => $setores, 'roles'=>$roles]);
    }

    public function store(Request $request)
    {
      //  dd($request->all());
        $validator = Validator::make($request->all(),[
            'assunto' => 'required',
            'setor_id' => 'required',
            'arquivos' => 'required|file|mimes:pdf,docx,doc',
            'numero_processo'=> 'required',
            'destino'=>'required',
        ]);

        // dd($validator->errors());
        // dd(Auth::user()->role);

        if ($validator->fails()) {
            return redirect()->route('protocolos.create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $oficio = Oficio::create([
            'assunto' => $request->assunto,
            'data' => now(),
            'destino' => $request->destino,
            'setor_id' => $request->setor_id,
            'numero_processo' => $request->numero_processo,
            'tipo'=>$request->tipo,
            'autorizado'=> Auth::user()->role == 'Gabinete' ? true : false,
            'numero_oficio' => Auth::user()->role == 'Gabinete'? Oficio::whereYear('created_at', Carbon::now()->year)->where('numero_oficio', '!=', null)->max('numero_oficio') + 1 : false,
        ]);

        if ($request->hasFile('arquivos')) {
            $this->store_file($request, $oficio->id, 'arquivos');
        }

        return redirect()->route('protocolos.home')->with('success', 'Assunto cadastrado com sucesso!');
    }

    public function store_file(Request $request, $id, $fieldName)
    {

        $caminho = 'files/';
        $name = $request->$fieldName->hashName();
        $oficio = Oficio::find($id);
        $oficio->$fieldName = $name;
        $oficio->save();

        $request->$fieldName->storeAs('files', $name);

    }
}
