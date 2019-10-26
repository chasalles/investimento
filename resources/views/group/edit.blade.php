@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'N Grupo']])
		@include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'data' => $user_list,'attributes' => ['placeholder' => 'usuário']])
		@include('templates.formulario.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'data' => $instituition_list, 'attributes' => ['placeholder' => 'instituição']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])

	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

@endsection