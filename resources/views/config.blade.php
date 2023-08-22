@extends('layouts.app')

@section('content')
<div class="row">
    <form method="POST" action="{{ route('config.submit') }}">
        </br>
        @csrf
        <div class="col m4">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <span class="card-title">{{ __('Leitura') }}</span>
                        <div class="col m3">
                            Confundo as letras:
                            </br>
                            <label>
                                <input name="choseB" {{str_contains($simulacao->leitura, 'B') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>b(B)</span>
                            </label>
                            </br>
                            <label>
                                <input name="choseD" {{str_contains($simulacao->leitura, 'D') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>d(D)</span>
                            </label>
                            </br>
                            <label>
                                <input name="choseP" {{str_contains($simulacao->leitura, 'P') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>p(P)</span>
                            </label>
                            </br>
                            <label>
                                <input name="choseQ" {{str_contains($simulacao->leitura, 'Q') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>q(Q)</span>
                            </label>
                        </div>
                        <div class="col m6">
                            <div class="input-field col 12">
                                <input id="frequencia" type="number" name="frequencia" class="validate" value="{{$simulacao->frequencia}}">
                                <label for="frequencia">Frequencia de troca</label>
                            </div>
                        </div>
                        <div class="col m6"> Texto trocando de exemplo</div>
                        <button type="button" class="btn col m12">Gerar link</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m4">
            <div class="card">
                <div class="card-content row">
                    <span class="card-title">{{ __('Taboada') }}</span>
                    <div class="input-field col m12">
                        <input id="dificuldade" name="dificuldade" type="number" class="validate" value="{{$simulacao->tabuada}}">
                        <label for="dificuldade">Dificuldade de decora tabuada a partir do numero:</label>
                    </div>
                    <button type="button" class="btn col m12">Gerar link</button>
                </div>
            </div>
        </div>
        <div class="col m4">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <span class="card-title">{{ __('Espacial') }}</span>
                        <div class="col m3">
                            Confundo as letras:
                            </br>
                            <label>
                                <input name="DE" {{str_contains($simulacao->espacial, 'H') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>Direita/Esquerda</span>
                            </label>
                            </br>
                            <label>
                                <input name="CB" {{str_contains($simulacao->espacial, 'V') ? 'checked="checked"' :""}} type="checkbox" />
                                <span>Cima/Baixo</span>
                            </label>
                        </div>
                        <button type="button" class="btn col m12">Gerar link</button>
                    </div>
                </div>
            </div>
            <div class="col m12">
                <button class="btn right">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection