@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name'])
		@include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'data' => $user_list,'attributes' => ['placeholder' => 'usuário']])
		@include('templates.formulario.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'data' => $instituition_list, 'attributes' => ['placeholder' => 'instituição']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

	@include('group.list', ['group_list' => $groups])


@endsection