@extends('layouts.app')

@section('myjs')
<script src="{{ asset('js/simulacaoleitura.js') }}" defer></script>
@endsection

@section('mycss')
<link href="{{ asset('css/simulacaoleitura.css') }}" rel="stylesheet">
<style>
	.fonte {
		font-size: 20px;
	}
</style>
@endsection

@section('content')

<div class="row">
	<div class="col s12">
		<label>Dificuldade</label>
		<select id="selecao" class="browser-default">
			<option value="" disabled selected>Seleção</option>
			<option value='1'>facil</option>
			<option value='2'>medio</option>
			<option value='3'>dificil</option>

		</select>
		<label>Letras</label>
		<select id="letra" class="browser-default">
			<option value="" disabled selected>Seleção</option>
			<option value='0'>Random</option>
			<option value='1'>p</option>
			<option value='2'>q</option>
			<option value='3'>d</option>
			<option value='4'>b</option>

		</select>

		<div class="fonte">
			<p>Teste do simulador.</p>

			<p id="text">A dislexia é um distúrbio genético que dificulta o aprendizado e a realização da leitura e da escrita. O cérebro, por razões ainda não muito bem esclarecidas, tem dificuldade para encadear as letras e formar as palavras, e não relaciona direito os sons às sílabas formadas. Como sintoma, a pessoa começa a trocar a ordem de certas letras ao ler e escrever.</p>
		</div>
	</div>
</div>
@endsection