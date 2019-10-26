@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	<header>
		<h1>{{ $instituition->name }}</h1>
	</header>

	@include('group.list', ['group_list' => $instituition->group])

@endsection