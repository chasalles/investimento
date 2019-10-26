@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}


		@include('user.form_fields')
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])

	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

	@include('user.list', ['user_list' => $users])

@endsection