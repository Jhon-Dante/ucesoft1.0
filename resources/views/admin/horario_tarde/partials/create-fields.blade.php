<div class="form-group">
	{!! Form::label('curso','Curso') !!}
	{!! Form::select('Curso', ['1er grado','2do grado'], ['class' => 'form-control','required' => 'required', 'title' => 'Especifique el curso del nuevo horario']) !!}
</div>
<div class="form-group">
	{!! Form::label('seccion','Sección') !!}
	{!! Form::select('nacionalidad', ['A', 'B' , 'U'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>