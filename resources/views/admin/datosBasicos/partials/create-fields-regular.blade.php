<div class="form-group">
@foreach($datosBasicos as $db)
	@if($db->id == $id_estudiante)
		{!! Form::hidden('id_datosBasicos',$db->id) !!}
		{!! Form::label('dato_basico','Estudiante:') !!}
		{{$db->nombres}} {{$db->apellidos}}
		</div>
		<div class="form-group">
		{!! Form::label('','Cédula')!!}
		{{$db->nacionalidad}}-{{$db->cedula}}
	@endif
@endforeach
</div>
<div class="form-group">
	{!! Form::label('seccion','Curso y sección')!!}
	<select name="id_seccion" class="form-group" required="required">
		@foreach($secciones as $seccion)
		<option value="{{$seccion->id}}">Curso: {{$seccion->curso->curso}}, Sección: {{$seccion->seccion}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('periodo','Período')!!}
	{!! Form::select('id_periodo',$periodos,['title' => 'Seleccione el período que cursará el estudiante','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	<select class="form-control select2" multiple="multiple" name="repite[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) ">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	<select class="form-control select2" multiple="multiple" name="pendiente[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) ">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>