<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil');
    }

    public function submit(Request $r)
    {
        $id = Auth::id();
        $verificar = $r->input("verificar");
        $nome = $r->input("nome");
        $sobreno = $r->input("sobrenome");
        $data = $r->input("data");
        if ($verificar != 'on') {
            return redirect()->route('perfil');
        } else {
            $verificar = true;
        }
        $perfil = Perfil::find($id);
        if ($perfil == null) {
            perfil::create([
                'user_id' => $id,
                'sobrenome' => $sobreno,
                'dataDeNascimento' => $data,
                'aceitacao' => $verificar,
                'bloqueio' => 0
            ]);
        } else {
            Auth::user()->name = $nome;
            Auth::user()->save();
            $perfil->sobrenome = $sobreno;
            $perfil->dataDeNascimento = $data;
            $perfil->save();
        }
        return redirect()->route('perfil');
    }

    public function documentos(Request $r)
    {
        $id = Auth::id();
        $perfil = Perfil::find($id);
        if (!$perfil->aceitacao) {
            return redirect()->route('perfil');
        }
        $nome = $r->input("nome-doc");
        $profi = $r->input("select-doc");

        Documentos::create([
            'user_id' => $id,
            'nome' => $nome,
            'proficonal' => $profi,
        ]);
        return redirect()->route('perfil');
    }

    public function doc_delete(Request $r)
    {
        $id = $r->input('id');
        Documentos::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
}
