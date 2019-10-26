<table class="default-table">
	<thead>
		<td>ID</td>
		<td>CPF</td>
		<td>Nome</td>
		<td>Telefone</td>
		<td>Nascimento</td>
		<td>E-mail</td>
		<td>Status</td>
		<td>Permissão</td>
		<td>Editar</td>
	</thead>
		<tbody>
		@foreach($user_list as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->formatted_cpf }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->formatted_phone }}</td>
				<td>{{ $user->formatted_birth }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->status }}</td>
				<td>{{ $user->permission }}</td>
				<td>
					{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}
					<a href="{{ route('user.edit', $user->id) }}">Detalhes</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>