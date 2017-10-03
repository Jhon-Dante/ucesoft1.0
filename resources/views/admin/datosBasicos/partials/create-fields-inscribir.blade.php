
<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	<select class="form-control select2" id="id_estudiante" title="Seleccione el estudiante a Reinscribir" name="id_estudiante">
		@foreach($datosBasicos as $db)
			<option value="{{$db->id}}">{{$db->nacionalidad}}-{{$db->cedula}} {{$db->apellidos}}, {{$db->nombres}}</option>
		@endforeach
	</select>
</div>