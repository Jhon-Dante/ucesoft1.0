<div class="form-group">
	{!! Form::label('seccion','Sección') !!}
	{!! Form::text('seccion',null,['class' => 'form-control','placeholder' => 'A','required' => 'required', 'title' => 'Ingrese la sección desea registrar']) !!}
</div>
<div class="form-group">
	{!! Form::label('curso','Curso') !!}
	{!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'title' => 'Seleccione el Curso donde desea asignar la sección']) !!}
</div>