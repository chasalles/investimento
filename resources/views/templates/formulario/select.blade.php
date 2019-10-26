<label class="{{ $class ?? null }}">
	
	<span> {{ $label }} </span>

	{!! Form::select($select, $data ?? []) !!}

</label>