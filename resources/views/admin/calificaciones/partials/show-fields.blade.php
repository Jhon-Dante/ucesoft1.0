<div class="form-group">
		{!! Form::label('Docentes','Docentes') !!}
        <select name="id_personal" class="form-control select2" title="Seleccione el docente">
        	@foreach($docentes as $key)
        		<option value="{{$key->id}}">{{$key->apellidos}}, {{$key->nombres}} C.I.: {{$key->nacionalidad}}-{{$key->cedula}}</option>
			@endforeach
        </select>

</div>
<div class="form-group">
		{!! Form::label('carga','Carga Académica') !!}
        <select name="id_seccion" class="form-control select2" title="Seleccione el docente">
        	@foreach($docentes as $key2)
        		@foreach($key2->asignacion_s as $key3)
        		<option>{{$key3->id_seccion}}</option>
        		@endforeach
			@endforeach
        </select>

</div>