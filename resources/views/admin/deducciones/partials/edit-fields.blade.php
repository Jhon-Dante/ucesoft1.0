<div class="form-group">
	{!! Form::label('deduccion','Deducción') !!}
	{!! Form::text('deduccion',$deduccion->deduccion,['class' => 'form-control','placeholder' => 'IVSS','required' => 'required', 'title' => 'Ingrese el nombre de la deducción que desea actualizar']) !!}
</div>

<div class="form-group">
	{!! Form::label('monto','Monto (%)') !!}
	{!! Form::text('monto',$deduccion->monto,['class' => 'form-control','placeholder' => '10','required' => 'required', 'title' => 'Ingrese el monto de la deducción expresada en porcentaje que desea actualizar']) !!}
</div>