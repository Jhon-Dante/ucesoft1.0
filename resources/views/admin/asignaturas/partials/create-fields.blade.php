<div class="form-group">
	{!! Form::label('asignatura','Asignatura') !!}
	{!! Form::text('asignatura',null,['class' => 'form-control','placeholder' => 'Matemática Aplicada','required' => 'required', 'title' => 'Ingrese la asignatura que desea registrar']) !!}
</div>
<div class="form-group">
	{!! Form::label('curso','Curso') !!}
	{!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'title' => 'Seleccione el Curso donde desea asignar la sección']) !!}
</div>