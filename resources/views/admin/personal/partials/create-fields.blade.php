<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::number('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000','required' => 'required', 'title' => 'Ingrese la cedula del personal','min' => '6','maxLength' => '8','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa','required' => 'required', 'title' => 'Ingrese el primer y segundo apellido del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('fecha_nacimiento',null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la fecha de nacimiento del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('edad','Edad') !!}
	{!! Form::number('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8','required' => 'required', 'title' => 'Ingrese la edad del personal','min' => '18','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>

<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación','required' => 'required', 'title' => 'Ingrese la dirección del personal']) !!}
</div>

<div class="form-group">
	{!! Form::label('edo_cvil','Estado Civil') !!}
	{!! Form::select('edo_civil', ['Soltero(a)', 'Casado(a)','Concuvino(a)','Viudo(a)'],null, ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el estado civil del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_hab','Teléfono de Habitación') !!}
	{!! Form::select('codigo_hab', ['0243', '0244'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el código del teléfono de habitación']) !!}
	{!! Form::number('telf_hab',null,['class' => 'form-control','placeholder' => '1234567','maxLength' => '7','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_cel','Teléfono Celular') !!}
	{!! Form::select('codigo_cel', ['0412', '0416','0426','0414','0424'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el código del celular']) !!}
	{!! Form::number('celular',null,['class' => 'form-control','placeholder' => '1234567','maxLength' => '7','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','required' => 'required']) !!}
</div>
<div>
	{!! Form::label('cargo','Cargo') !!}
	{!! Form::select('id_cargo', $cargos,null, ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el cargo']) !!}	
</div>