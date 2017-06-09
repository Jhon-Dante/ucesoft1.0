<div class="form-group">
	{!! Form::label('deduccion','Deducción') !!}
	{!! Form::text('deduccion',null,['class' => 'form-control','placeholder' => 'IVSS','required' => 'required', 'title' => 'Ingrese el nombre de la deducción que desea registrar']) !!}
</div>

<div class="form-group">
	{!! Form::label('monto','Monto (%)') !!}
	{!! Form::text('monto',null,['class' => 'form-control','placeholder' => '10','required' => 'required', 'title' => 'Ingrese el monto de la deducción expresada en porcentaje']) !!}
</div>