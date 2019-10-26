<table class="default-table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Instituição</th>
			<th>Nome do Responsável</th>
			<th>Editar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($group_list as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{ $group->name }}</td>
				<td>R$ {{ number_format($group->total_value, 2, ',', '.') }}</td>
				<td>{{ $group->user->name }}</td>
				<td>{{ $group->instituition->name }}</td>
				<td>
					{!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}
					<a href="{{ route('group.show', $group->id) }}">Detalhes</a>
					<a href="{{ route('group.edit', $group->id) }}">Editar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>