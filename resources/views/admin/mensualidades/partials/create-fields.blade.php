<div class="form-group">
	{!! Form::label('apellidos','Nombre') !!}
	{!! Form::text('apellidos',null, ['class' => 'form-control','placeholder' => 'Carlos José', 'disabled' => 'disabled']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacionalidad','Tipo de pago') !!}
	{!! Form::select('nacionalidad', ['Efectivo', 'Depósito', 'Transferencia'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Monto') !!}
	{!! Form::text('Monto',null, ['class' => 'form-control','placeholder' => '15,500.00','disabled' => 'disabled']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Periodo') !!}
	{!! Form::text('',null, ['class' => 'form-control','placeholder' => '2017-2018','disabled'=>'disabled']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacionalidad','Nombre del banco') !!}
	{!! Form::select('nacionalidad', ['Banco Bicentenario', 'Banco de Venezuela', 'Banesco'], ['class' => 'form-control',]) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Número de depósito') !!}
	{!! Form::text('apellidos',null, ['class' => 'form-control','placeholder' => '00001555565244531129','']) !!}
</div>