@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::open(['route' => 'instituition.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

	<table class="default-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome da Instituição</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			@foreach($instituitions as $i)
				<tr>
					<td>{{ $i->id }}</td>
					<td>{{ $i->name }}</td>
					<td>
						{!! Form::open(['route' => ['instituition.destroy', $i->id], 'method' => 'delete']) !!}
						{!! Form::submit('Remover') !!}
						{!! Form::close() !!}
						<a href="{{ route('instituition.show', $i->id) }}">Detalhes</a>
						<a href="{{ route('instituition.edit', $i->id) }}">Editar</a>
						<a href="{{ route('instituition.product.index', $i->id) }}">Produtos</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection