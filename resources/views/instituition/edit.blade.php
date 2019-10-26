@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::model($instituition, ['route' => ['instituition.update', $instituition->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.submit', ['input' => 'Atualizar'])

	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

@endsection