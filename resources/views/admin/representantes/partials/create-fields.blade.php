{{ csrf_field() }}
<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad',['V','E'],['class' => 'form_control']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => '4555666', 'title' => 'Ingrese la nacionalidad del representante','maxlength' => '8']) !!}
</div>
<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nombres','Nombres') !!}
	{!! Form::text('nombres',null, ['class' => 'form-control','placeholder' => 'Carlos Alejandro', 'title' => 'Ingrese el primer y segundo nombre del representante']) !!}
</div>
<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('apellidos','Apellidos') !!}
	{!! Form::text('apellidos',null, ['class' => 'form-control','placeholder' => 'Garrido Silva', 'title' => 'Ingrese la el primer y segundo apellido del representante']) !!}
</div>
<div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('profesion','Profesión') !!}
	{!! Form::text('profesion',null, ['class' => 'form-control','placeholder' => 'Administrador', 'title' => 'Ingrese la profesión del representante']) !!}
</div>
<div class="form-group{{ $errors->has('vive_estu') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('vive_estu','¿Vive con el estudiante?') !!}
	<select name="vive_estu" style="width: 80px;" id="vive_estu" class="form-control" title="Seleccione de acuerdo a la convivencia con el estudiante">
		<option value="Si">Si</option>
		<option value="No">No</option>
	</select>
</div>
<div class="form-group{{ $errors->has('ingreso_apx') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('ingreso_apx','Ingresos Aproximados') !!}
	{!! Form::number('ingreso_apx',null, ['class' => 'form-control','placeholder' => '200000', 'title' => 'Ingrese el ingreso del representante','min' => '0', 'maxlength' => '10','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group{{ $errors->has('n_familia') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('n_familia','Número de miembros en el hogar') !!}
	{!! Form::number('n_familia',null, ['class' => 'form-control','placeholder' => '3', 'title' => 'Cuantos familiares habitan en su grupo hogar?','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('direccion','Dirección del representante') !!}
	{!! Form::textarea('direccion', null, ['class' => 'form-control', 'placeholder' => 'Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del representante']) !!}
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('email','Correo Eléctrónico') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Usuario@hormail.com', 'title' => 'Ingrese el email del representante']) !!}
</div>
<div class="form-group{{ $errors->has('telf_habitacion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('telf_habitacion','Teléfono del hogar') !!}
	<select name="codigo_hab" id="codigo_hab" style="width: 80px;" class="form-control" title="Seleccione el código del teléfono del hogar">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	{!! Form::text('telf_hab', null, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>
<div class="form-group{{ $errors->has('lugar_tra') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('lugar_tra','Lugar de trabajo del representante') !!}
	{!! Form::text('lugar_tra',null, ['class' => 'form-control', 'placeholder' => 'Vencerámica c.a.', 'title' => 'lugar de trabajo del representante']) !!}
</div>
<div class="form-group{{ $errors->has('telf_tra') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('telf_trabajo','Teléfono de trabajo') !!}
	<select name="codigo_tra" id="codigo_tra" style="width: 80px;" class="form-control" title="Seleccione el código del teléfono del trabajo">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	
	{!! Form::text('telf_tra', null, ['class' => 'form-control', 'maxlength' => '7']) !!}


</div>
<div class="form-group{{ $errors->has('responsable_m') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('responsable_m','Responsable de pagar las mensualidades') !!}
	{!! Form::text('responsable_m',null, ['class' => 'form-control',  'placeholder' => 'Maria Ruiz']) !!}
</div>
<div class="form-group{{ $errors->has('telf_responsable') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('telf_responsable','Teléfono de trabajo') !!}
	<select name="codigo_responsable" id="codigo_responsable" style="width: 80px;" class="form-control" title="Seleccione el código del teléfono">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	
	{!! Form::text('telf_responsable', null, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('telf_opcional','Teléfono opcional') !!}
	<select name="codigo_opcional" id="codigo_opcional" style="width: 80px;" class="form-control" title="Seleccione el código del teléfono">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	
	{!! Form::text('telf_opcional', null, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>
<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('nombre_opcional','En caso de no poseer teléfono, indicar el número de algún contacto') !!}
	{!! Form::text('nombre_opcional',null, ['class' => 'form-control',  'placeholder' => 'Alberto delgado']) !!}
</div>
<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('telf_emergencia','En caso de EMERGENCIA, llamar a') !!}
	<select name="codigo_emergencia" id="codigo_emergencia" style="width: 80px;" class="form-control" title="Seleccione el código del teléfono de emergencia">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	{!! Form::text('telf_emergencia', null, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>