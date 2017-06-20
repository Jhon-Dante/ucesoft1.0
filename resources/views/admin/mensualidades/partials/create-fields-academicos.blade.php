<div class="form-group">
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"','required' => 'required', 'disabled' => 'disabled' , 'title' => 'Ingrese los datos del plantel de procedencia']) !!}
</div>

<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	{!! Form::text('materiap',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Matemática','required' => 'required', 'title' => 'Ingrese el nombre de la materia pendiente del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('repite','¿Repite?') !!}
</div>
<div class="form-group">
	{!! Form::label('repite','Si') !!}
	{!! Form::radio('repite', 'Si',['class' => 'form-control', 'disabled' => 'disabled' ,'required' => 'required'] ) !!}
</div>
<div>
	{!! Form::label('repite','No') !!}
	{!! Form::radio('repite', 'No',['class' => 'form-control','required' => 'required'] ) !!}
</div>
<div class="form-group">
	{!! Form::label('asignatura','Asignatura con las que repite') !!}
	{!! Form::text('asignatura',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Lengua, Matemática','required' => 'required', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>

