@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

		@include('user.form_fields')
		@include('templates.formulario.submit', ['input' => 'Atualizar'])

	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

@endsection