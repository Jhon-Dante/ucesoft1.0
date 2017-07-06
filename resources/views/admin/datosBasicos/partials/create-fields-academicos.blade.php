<div class="form-group">
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"','required' => 'required', 'disabled' => 'disabled' , 'title' => 'Ingrese los datos del plantel de procedencia', 'id' => 'plantel']) !!}
</div>

<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	{!! Form::text('materiap',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Matemática','required' => 'required', 'title' => 'Ingrese el nombre de la materia pendiente del estudiante', 'id' => 'materiap']) !!}
</div>
<div class="form-group">
	{!! Form::label('repite','¿Repite?') !!}
</div>
<div class="form-group">
	{!! Form::label('repite','Si') !!}
	<input type="radio" name="repite" value="Si" required="required" disabled="disabled" id="repite1">
</div>
<div>
	{!! Form::label('repite','No') !!}
	<input type="radio" name="repite" value="No" required="required" disabled="disabled" id="repite2">
</div>
<div class="form-group">
	{!! Form::label('asignatura','Asignatura con las que repite') !!}
	{!! Form::text('asignatura',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Lengua, Matemática','required' => 'required', 'title' => 'Ingrese la cedula del estudiante', 'id' => 'asignatura']) !!}
</div>

