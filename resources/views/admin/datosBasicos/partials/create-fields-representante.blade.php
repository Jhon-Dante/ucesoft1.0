

<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('representante','Representante') !!}
	<select name="id_representante" id="id_representante" title="Identifique el parentesco del representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			<option value="{{$key->id}}">{{$key->apellidos}},{{$key->nombres}} {{$key->nacionalidad}}-{{$key->cedula}}</option>
		@endforeach
	</select>
</div>