<div class="form-group">
	{!! Form::label('docentes','Lista de docentes de '.$cargo) !!}
	<select name="correo" title="Seleccione al Docente al que desea cargar calificaciones" class="form-control select2">
		@foreach($docentes as $key)
		<option value="{{$key->correo}}">
			{{$key->apellidos}}, {{$key->nombres}} C.I.:{{$key->nacionalidad}}-{{$key->cedula}}
		</option>
		@endforeach
	</select>

</div>
{!! Form::hidden('cargo',$cargo) !!}

