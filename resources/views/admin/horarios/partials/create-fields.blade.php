<div class="form-group">
	{!! Form::label('turno','Turno') !!}
	{!! Form::select('Turno', ['Mañana', 'Tarde'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el turno del nuevo horario']) !!}
</div>
<div class="form-group">
	{!! Form::label('curso','Curso') !!}
	{!! Form::select('Curso', ['1er grado','2do grado'], ['class' => 'form-control','required' => 'required', 'title' => 'Especifique el curso del nuevo horario']) !!}
</div>
<div class="form-group">
	{!! Form::label('seccion','Sección') !!}
	{!! Form::select('nacionalidad', ['A', 'B' , 'U'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('periodo','Periodo') !!}
	{!! Form::select('periodo', ['2016-2017', '2017-2018'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el periodo del horario']) !!}
</div>
<div class="form-group">
	{!! Form::label('asignatura','Asignatura') !!}
	{!! Form::select('asignatura', ['Lengua', 'Matematica','Cs Naturales','Educ. Física','Lengua','Educ. Vial'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la asignatura a la que especificar en el horario']) !!}
</div>