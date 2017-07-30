<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"', 'disabled' => 'disabled' , 'title' => 'Ingrese los datos del plantel de procedencia', 'id' => 'plantel']) !!}
</div>

<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('materiap','Materia Pendiente') !!}
	{!! Form::text('materiap',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Matemática', 'title' => 'Ingrese el nombre de la materia pendiente del estudiante', 'id' => 'materiap']) !!}
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('repite','¿Repite?') !!}
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('repite','Si') !!}
	<input type="radio" name="repite" value="Si" disabled="disabled" id="repite1">
	(<span style="color: red;">*</span>)
</div>
<div>
	{!! Form::label('repite','No') !!}
	<input type="radio" name="repite" value="No" disabled="disabled" id="repite2">
	(<span style="color: red;">*</span>)
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('asignatura','Asignatura con las que repite') !!}
	{!! Form::text('asignatura',null,['class' => 'form-control', 'disabled' => 'disabled' ,'placeholder' => 'Lengua, Matemática', 'title' => 'Ingrese la cedula del estudiante', 'id' => 'asignatura']) !!}
</div>

