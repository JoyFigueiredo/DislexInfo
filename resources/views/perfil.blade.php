@extends('layouts.app')

@section('myjs')
<script src="{{ asset('js/validate_perfil.js') }}" defer></script>
@endsection

@section('content')
<div class="row">
    <div class="col m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ __('Informações') }}</span>
                <div class="row">
                    <div class="col m12">
                        <form id="info" method="POST" action="{{ route('perfil.submit') }}">
                            @csrf
                            @if(Auth::user()->perfil == null)
                            <p>
                                <label>
                                    <input name="verificar" id="verificar" type="checkbox" />
                                    <span>Li e Aceito os termos</span>
                                </label>
                            </p>
                            @else
                            <input name="verificar" id="verificar" type="checkbox" hidden checked />
                            @endif
                            <a href="#" class="col m12">Termos</a>
                            <div class="input-field col s4">
                                <input id="nome" name="nome" class="validate" value="{{Auth::user()->name}}" required>
                                <label for="nome">Nome</label>
                            </div>
                            <div class="input-field col s5">
                                <input id="sobrenome" name="sobrenome" class="validate" value="{{Auth::user()->perfil != null?Auth::user()->perfil->sobrenome : ''}}" required>
                                <label for="sobrenome">Sobrenome</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="data" name="data" class="data" type="date" value="{{Auth::user()->perfil != null?Auth::user()->perfil->dataDeNascimento : ''}}" required>
                                <label for="data">Data de nascimento</label>
                            </div>
                            <button class="btn col m2 right">Envia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->perfil != null){
    <div class="col m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ __('Curriculo') }}</span>
                <div class="row">
                    <div class="col m12">
                        <form method="POST" action="{{ route('perfil.doc') }}">
                            @csrf
                            <div class="input-field col m5">
                                <select id="select-doc" name="select-doc" required>
                                    <option value=0>Proficional de pissicologia</option>
                                    <option value=1>Proficional de pedagodia</option>
                                </select>
                                <label for="select-doc">Materialize Select*</label>
                            </div>
                            <div class="input-field col s5">
                                <input id="nome-doc-p" name="nome-doc" class="validate" required>
                                <label for="nome-doc-p">Nome do certificado ou diploma</label>
                            </div>
                            <button class="btn col m2">Adicionar</button>
                        </form>
                    </div>

                    <div class="col m12">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Area</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse(Auth::user()->documentos as $doc)
                                <tr>
                                    <td>{{$doc->nome}}</td>
                                    <td>{{$doc->proficonal == 0? 'Pissicologia' : 'Pedagogia'}}</td>
                                    <td><button onclick="excluir({{$doc->id}})" type="button" class="btn"><i class="small material-icons">delete</i></button></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" id="form-sbmt" action="{{ route('perfil.doc.delete')}}">
        @csrf
        <input name="id" hidden id="exclui_id">
    </form>
    @endif
</div>
@endsection