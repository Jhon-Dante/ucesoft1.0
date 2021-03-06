<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)

			{!! Form::label('nombres','Nombres') !!}
			{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('apellidos','Apellidos') !!}
			{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del personal']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('nacio','Nacionalidad') !!}
			{!! Form::select('nacio', ['V'=>'V', 'E'=>'E'],null, ['class' => 'form-control', 'title' => 'Seleccione el estado civil del personal']) !!}
		</div>
	</div>
	<div class="col-md-10">
		<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('cedula','Cédula') !!}
			{!! Form::number('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del personal','min' => '6','maxLength' => '8','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
			(<span style="color: red;">*</span>)
			{!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
			{!! Form::date('fecha_nacimiento',null,['class' => 'form-control', 'title' => 'Ingrese la fecha de nacimiento del personal']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('genero','Sexo') !!}
			{!! Form::select('genero', ['M' => 'M','F' => 'F'],null, ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('edo_civil') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
		{!! Form::label('edo_cvil','Estado Civil') !!}
		{!! Form::select('edo_civil', ['Soltero(a)' => 'Soltero(a)', 'Casado(a)' => 'Casado(a)', 'Concuvino(a)' => 'Concuvino(a)','Viudo(a)' => 'Viudo(a)'],null, ['class' => 'form-control', 'title' => 'Seleccione el estado civil del personal']) !!}
		</div>
	</div>
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación', 'title' => 'Ingrese la dirección del personal']) !!}
</div>

<div class="row">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('codigo_hab') ? ' has-error' : '' }}">
				(<span style="color: red;">*</span>)
				{!! Form::label('codigo_hab','codigo de habitación') !!}
				{!! Form::select('codigo_hab',[
				'0244' => '0244', 
				'0424' => '0424',
				'0416' => '0416',
				'0426' => '0426'
				] ,['Propio', 'Alquilado'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group{{ $errors->has('telf_hab') ? ' has-error' : '' }}">
				(<span style="color: red;">*</span>)
				{!! Form::label('telf_hab','Teléfono de habitación') !!}
				{!! Form::text('telf_hab',null,['class' => 'form-control','placeholder' => 'Ej: 04162455643', 'title' => 'Ingrese el teléfono móvil del personal','maxLength' => '7']) !!}
			</div>
		</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('codigo_cel') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('codigo_cel','Codigo de celular') !!}
			{!! Form::select('codigo_cel',[
			'0412'=>'0412',
			'0414'=>'0414',
			'0424'=>'0424',
			'0416'=>'0416',
			'0426'=>'0426'
			] ,['Propio', 'Alquilado'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('celular','Teléfono Celular') !!}
			{!! Form::text('celular',null,['class' => 'form-control','placeholder' => 'Ej: 6675544', 'title' => 'Ingrese el teléfono de habitación del personal','maxLength' => '7']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('correo','Correo Electrónico') !!}
			{!! Form::email('correo',null,['class' => 'form-control','placeholder' => 'Ej: jose_sosa@live.com', 'title' => 'Ingrese el correo del personal']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('cargo','Cargo') !!}
			{!! Form::select('id_cargo', $cargos, null, ['class' => 'form-control','value' => '1', 'title' => 'Seleccione el cargo']) !!}	
		</div>
	</div>
</div>