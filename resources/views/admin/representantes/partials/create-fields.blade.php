<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la nacionalidad del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => '4555666','required' => 'required', 'title' => 'Ingrese la nacionalidad del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombres','Nombres') !!}
	{!! Form::text('nombres',null, ['class' => 'form-control','placeholder' => 'Carlos Alejandro','required' => 'required', 'title' => 'Ingrese el primer y segundo nombre del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Apellidos') !!}
	{!! Form::text('apellidos',null, ['class' => 'form-control','placeholder' => 'Garrido Silva','required' => 'required', 'title' => 'Ingrese la el primer y segundo apellido del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('profesion','Profesión') !!}
	{!! Form::text('profesion',null, ['class' => 'form-control','placeholder' => 'Administrador','required' => 'required', 'title' => 'Ingrese la profesión del representante']) !!}
</div>
<div class="form-group">
		{!! Form::label('parentesco','Parentesco') !!}
        {!! Form::select('id_parentesco',$parentesco,null,['class' => 'form-control', 'required' => 'required', 'title' => 'Identifique el parentesco del representante con el estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('vive_estu','¿Vive con el estudiante?') !!}
	{!! Form::select('vive_estu', ['Si', 'No'], ['class' => 'form-control','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('ingreso_apx','Ingresos Aproximados') !!}
	{!! Form::number('ingreso_apx',null, ['class' => 'form-control','placeholder' => '200000','required' => 'required', 'title' => 'Ingrese la profesión del representante','min' => '0', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('n_familia','Número de miembros en el hogar') !!}
	{!! Form::number('n_familia',null, ['class' => 'form-control','placeholder' => '3','required' => 'required', 'title' => 'Cuantos familiares habitan en su grupo hogar?','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección del representante') !!}
	{!! Form::textarea('direccion', null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_habitacion','Teléfono del hogar') !!}
	{!! Form::select('codigo_hab', ['0244', '0412', '0414', '0416' , '0416'], ['class' => 'form-control','required' => 'required']) !!}
	{!! Form::text('telf_hab', null, ['class' => 'form-control','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('lugar_tra','Lugar de trabajo del representante') !!}
	{!! Form::text('lugar_tra',null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Vencerámica c.a.', 'title' => 'lugar de trabajo del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_trabajo','Teléfono de trabajo') !!}
	{!! Form::select('codigo_tra', ['0244', '0412', '0414', '0416' , '0416'], ['class' => 'form-control','required' => 'required']) !!}
	{!! Form::text('telf_tra', null, ['class' => 'form-control','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('responsable_m','Responsable de pagar las mensualidades') !!}
	{!! Form::text('responsable_m',null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Maria Ruiz']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_responsable','Teléfono de trabajo') !!}
	{!! Form::select('codigo_responsable', ['0244', '0412', '0414', '0416' , '0416'], ['class' => 'form-control','required' => 'required']) !!}
	{!! Form::text('telf_responsable', null, ['class' => 'form-control','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_opcional','Teléfono opcional') !!}
	{!! Form::select('codigo_opcional', ['0244', '0412', '0414', '0416' , '0416'], ['class' => 'form-control','required' => 'required']) !!}
	{!! Form::text('telf_opcional', null, ['class' => 'form-control','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre_opcional','En caso de no poseer teléfono, indicar el número de algún contacto') !!}
	{!! Form::text('responsable_m',null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Alberto delgado']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_emergencia','En caso de EMERGENCIA, llamar a') !!}
	{!! Form::select('codigo_emergencia', ['0244', '0412', '0414', '0416' , '0416'], ['class' => 'form-control','required' => 'required']) !!}
	{!! Form::text('telf_emergencia', null, ['class' => 'form-control','required' => 'required']) !!}
</div>