@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['message'] }}</h3>
	@endif

	<table class="default-table">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Nome da Instituição</th>
				<th>Valor Investido</th>
			</tr>
		</thead>
		<tbody>
			@foreach($product_list as $product)
				<tr>
					<td>{{ $product->name }}</td>
					<td>{{ $product->instituition->name }}</td>
					<td>{{ $product->valueFromUser(Auth::user()) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection