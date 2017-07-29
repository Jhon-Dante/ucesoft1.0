<div class="form-group{{ $errors->has('asignatura') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
	{!! Form::label('asignatura','Asignatura') !!}
	{!! Form::text('asignatura',null,['class' => 'form-control','placeholder' => 'Matemática Aplicada', 'title' => 'Ingrese la asignatura que desea registrar']) !!}
</div>
<div class="form-group{{ $errors->has('id_curso') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
	{!! Form::label('curso','Curso') !!}
	{!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'title' => 'Seleccione el Curso donde desea asignar la sección']) !!}
</div>