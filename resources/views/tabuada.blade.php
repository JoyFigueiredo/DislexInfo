@extends('layouts.app')

@section('myjs')
<script src="{{ asset('js/simulacaotabuada.js') }}" defer></script>
@endsection


@section('content')
</br>
<div class="row">
	<div class="col s12">
	<div class="row">
		<select id="dificuldade_select" class="browser-default col s2">
			<option value="" disabled selected>Seleção de Dificuldade</option>
			<option value="1">Fácil</option>
			<option value="2">Médio</option>
			<option value="3">Difícil</option>
		</select>
		<select id="dificuldade_s" onchange="mudar_numero()" class="browser-default col s2">
			<option value="" disabled selected>Seleção de Tabuada</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<a id="btninicio" onclick="tabuada()" class="waves-effect waves-light btn col s1 offset-s1">Iniciar</a>
		<a id="contador" class="waves-effect waves-light btn col s1 offset-s1">00:00</a>
	</div>

	<div class="row">
		<div class="input-field col s1">
			<input value="1" id="numero_um" type="text" class="validate center" disabled>
		</div>
		<div class="col s1 center" style="margin-top: 30px;"><i class="material-icons">close</i></div>
		<div class="input-field col s1">
			<input value="1" id="dificuldade_i" type="text" class="validate center" disabled>
		</div>
		<div class="col s1 center" style="margin-top: 30px;"><i class="material-icons">drag_handle</i></div>
		<div class="input-field col s1">
			<input id="resultado" type="text" class="validate center">
		</div>
		<button onclick="confirma()" type="button" id="proximo" class="btn-floating btn-large waves-effect waves-light hide"><i class="material-icons">arrow_right_alt</i></button>
	</div>
</div>
</div>
@endsection