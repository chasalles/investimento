@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::open(['route' => 'moviment.getback.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
	
		@include('templates.formulario.select', ['label' => 'Grupo', 'select' => 'group_id', 'data' => $group_list ?? [],'attributes' => ['placeholder' => 'Grupo']])
		@include('templates.formulario.select', ['label' => 'Produto', 'select' => 'product_id', 'data' => $product_list ?? [], 'attributes' => ['placeholder' => 'Produto']])
		@include('templates.formulario.input', ['label' => 'Valor', 'input' => 'value'])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	
	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

@endsection