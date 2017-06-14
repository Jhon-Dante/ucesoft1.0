<div class="form-group">
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"','required' => 'required', 'title' => 'Ingrese los datos del plantel de procedencia']) !!}
</div>

<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	{!! Form::text('materiap',null,['class' => 'form-control','placeholder' => 'Matemática','required' => 'required', 'title' => 'Ingrese el nombre de la materia pendiente del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => '24999000','required' => 'required', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección','required' => 'required', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento','required' => 'required', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
