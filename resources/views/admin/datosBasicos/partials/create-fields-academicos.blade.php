<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"' , 'title' => 'Ingrese los datos del plantel de procedencia', 'id' => 'plantel']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_curso','Curso:') !!}
	
	<select name="id_curso" class="form-control" id="id_curso">
		<option value='0'>Selecciona curso</option>
			@foreach($cursos as $c)
				<option value="{{$c->id}}">{{$c->curso}}</option>
			@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('regular','¿Lleva Materia Pendiente?') !!}
	{{-- {!! Form::checkbox('pendiente','Si',['id' => 'pendiente','title' => 'Seleccione si el estudiante tiene materia(s) pendiente(s)']) !!} --}}

	<input type="checkbox" name="pendiente" id="pendiente" value="Si">
	
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('materiap','Materia Pendiente') !!}
	<!-- <select class="form-control select2" multiple="multiple" name="id_asignatura[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) " disabled="disabled">
		
	</select> -->
	{!! Form::select('id_asignatura[]',['placeholder' => 'Seleccione las asignaturas'],null,['class' => 'form-control select2', 'title' => 'Seleccione la asignatura', 'id' => 'id_asignatura', 'multiple' => 'multiple','disabled' => 'disabled']) !!}
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
	<!-- <select class="form-control select2" disabled="disabled" multiple="multiple" name="id_asignaturarep[]" id="id_asignaturare" title="Seleccione la(s) asignatura(s) pendiente(s) ">

	</select> -->
	{!! Form::select('id_asignaturarep[]',['placeholder' => 'Seleccione las asignaturas'],null,['class' => 'form-control select2', 'title' => 'Seleccione la asignatura','id' => 'id_asignaturare', 'multiple' => 'multiple', 'disabled' => 'disabled']) !!}
</div>

