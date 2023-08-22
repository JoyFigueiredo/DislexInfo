<?php

namespace App\Http\Controllers\simulacao;

use App\Models\Simulacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->simulacao != null) {
            $simulacao = Auth::user()->simulacao;
            if($simulacao == null){
                $simulacao = new Simulacao();
            }
            return view('config')->with('simulacao', $simulacao);
        } else {
            return redirect()->route('home');
        }
    }

    public function submit(Request $r)
    {
        $id = Auth::id();
        $leitura = "";
        if ($r->input("choseQ") == 'on') {
            $leitura .= "Q";
        }
        if ($r->input("choseP") == 'on') {
            $leitura .= "P";
        }
        if ($r->input("choseD") == 'on') {
            $leitura .= "D";
        }
        if ($r->input("choseB") == 'on') {
            $leitura .= "B";
        }
        $frequencia = $r->input("frequencia");
        $dificuldade = $r->input("dificuldade");
        $espacial = "";
        if ($r->input("choseQ") == 'on') {
            $espacial .= "V";
        }
        if ($r->input("choseP") == 'on') {
            $espacial .= "H";
        }
        $simulacao = Simulacao::find($id); 
        if ($simulacao == null) {
            Simulacao::create([
                'user_id' => $id,
                'frequencia' => $frequencia,
                'leitura' => $leitura,
                'tabuada' => $dificuldade,
                'espacial' => $espacial
            ]);
        }else{
            $simulacao->frequencia = $frequencia;
            $simulacao->leitura = $leitura;
            $simulacao->tabuada = $dificuldade;
            $simulacao->espacial = $espacial;
            $simulacao->save(); 
        }
        return redirect()->route('config');
    }
}
