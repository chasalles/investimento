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
				<th>Data</th>
				<th>Produto</th>
				<th>Grupo</th>
				<th>Valor</th>
				<th>Valor</th>
			</tr>
		</thead>
		<tbody>
			@foreach($moviment_list as $moviment)
				<tr>
					<td>{{ $moviment->created_at->format("d/m/y h:i") }}</td>
					<td>{{ $moviment->type == 1 ? "Aplicação" : "Resgate" }}</td>
					<td>{{ $moviment->product->name }}</td>
					<td>{{ $moviment->group->name }}</td>
					<td>{{ $moviment->value }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection