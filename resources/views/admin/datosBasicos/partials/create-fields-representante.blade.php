<div class="form-group">
	{!! Form::label('confirmar','El Representante ya esté registrado?') !!}
	{!! Form::checkbox('confirmar','Si',false,['title' => 'Seleccione si el representante no se enuentra registrado']) !!}
	
</div>

<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('representante','Representante') !!}
	<select name="representante" id="representante" title="Identifique el parentesco del representante con el estudiante" class="form-control select2">
		@foreach($representantes as $key)
			<option value="{{$key->id}}">{{$key->apellidos}},{{$key->nombres}} {{$key->nacionalidad}}-{{$key->cedula}}</option>
		@endforeach
	</select>
</div>