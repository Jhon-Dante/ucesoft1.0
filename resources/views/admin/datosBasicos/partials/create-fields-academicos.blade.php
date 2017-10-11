<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"' , 'title' => 'Ingrese los datos del plantel de procedencia', 'id' => 'plantel']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_curso','Curso:') !!}
	{!! Form::select('id_curso',['placeholder' => 'Seleccione el curso'],null,['class' => 'form_control', 'id' => 'id_curso']) !!}
</div>
<div class="form-group">
	{!! Form::label('regular','¿Lleva Materia Pendiente?') !!}
	{{-- {!! Form::checkbox('pendiente','Si',['id' => 'pendiente','title' => 'Seleccione si el estudiante tiene materia(s) pendiente(s)']) !!} --}}

	<input type="checkbox" name="pendiente" id="pendiente" value="Si">
	
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('materiap','Materia Pendiente') !!}
	<select class="form-control select2" multiple="multiple" name="id_asignatura[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) " disabled="disabled">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('repite','¿Repite?') !!}
	{{-- 
	{!! Form::checkbox('repite','Si',['id' => 'repite','title' => 'Seleccione si el estudiante es repitiente','checked' => 'checked']) !!} 
	--}}
	<input type="checkbox" name="repite" value="Si" id="repite">
	
</div>

<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('asignatura','Asignatura(s) que repite') !!}
	<select class="form-control select2" disabled="disabled" multiple="multiple" name="id_asignaturarep[]" id="id_asignaturarep" title="Seleccione la(s) asignatura(s) pendiente(s) ">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>

