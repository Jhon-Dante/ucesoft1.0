<div class="form-group">
	{!! Form::label('nombres','Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacio','Nacionalidad') !!}
	{!! Form::select('nacio', ['V', 'E'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::number('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del personal','min' => '6','maxLength' => '8','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('fecha_nacimiento',null,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación', 'title' => 'Ingrese la fecha de nacimiento del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('edad','Edad') !!}
	{!! Form::number('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad del personal','min' => '18','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('edo_cvil','Estado Civil') !!}
	{!! Form::select('edo_civil', ['Soltero(a)', 'Casado(a)','Concuvino(a)','Viudo(a)'],null, ['class' => 'form-control', 'title' => 'Seleccione el estado civil del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación', 'title' => 'Ingrese la dirección del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('genero','Sexo') !!}
	{!! Form::select('genero', ['M', 'F'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('codigo_hab','codigo de habitación') !!}
	{!! Form::select('codigo_hab',['0244','0412','0414','0424','0416','0426'] ,['Propio', 'Alquilado'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_hab','Teléfono de habitación') !!}
	{!! Form::number('telf_hab',null,['class' => 'form-control','placeholder' => 'Ej: 04162455643', 'title' => 'Ingrese el teléfono móvil del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('codigo_cel','Codigo de celular') !!}
	{!! Form::select('codigo_cel',['0244','0412','0414','0424','0416','0426'] ,['Propio', 'Alquilado'], ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
</div>
<div class="form-group">
	{!! Form::label('celular','Teléfono fijo') !!}
	{!! Form::text('celular',null,['class' => 'form-control','placeholder' => 'Ej: 6675544', 'title' => 'Ingrese el teléfono de habitación del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('correo','Correo Electrónico') !!}
	{!! Form::email('correo',null,['class' => 'form-control','placeholder' => 'Ej: jose_sosa@live.com', 'title' => 'Ingrese el correo del personal']) !!}
</div>
<div>
	{!! Form::label('cargo','Cargo') !!}
	{!! Form::select('id_cargo', $cargos, null, ['class' => 'form-control','value' => '1', 'title' => 'Seleccione el cargo']) !!}	
</div>