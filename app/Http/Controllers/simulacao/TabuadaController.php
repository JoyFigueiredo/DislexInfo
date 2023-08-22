<?php

namespace App\Http\Controllers\simulacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TabuadaController extends Controller
{
    public function index()
    {
        return view('tabuada');
    }
}
