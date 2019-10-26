@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	<header>
		<h1>Nome do grupo: {{ $group->name }}</h1>
		<h2>Instituição: {{ $group->instituition->name }}</h2>
		<h2>responsável: {{ $group->user->name }}</h2>
	</header>

	{!! Form::open(['route' => ['group.user.store', $group->id],'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'Usuário']])
		@include('templates.formulario.submit', ['input' => 'Incluir ao grupo ' . $group->name])
	{!! Form::close() !!}

	@include('user.list', ['user_list' => $group->users])

@endsection