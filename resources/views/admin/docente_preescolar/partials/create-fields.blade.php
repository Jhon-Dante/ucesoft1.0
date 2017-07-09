<div class="form-group">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa','required' => 'required', 'title' => 'Ingrese el primer y segundo apellido del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacio','Nacionalidad') !!}
	{!! Form::select('nacio', ['V', 'E'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::number('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000','required' => 'required', 'title' => 'Ingrese la cedula del personal','min' => '6','maxLength' => '8','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación','required' => 'required', 'title' => 'Ingrese la dirección del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('tenencia','Tenencia') !!}
	{!! Form::select('tenencia', ['Propio', 'Alquilado'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese la fecha de nacimiento del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('edad','Edad') !!}
	{!! Form::number('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8','required' => 'required', 'title' => 'Ingrese la edad del personal','min' => '18','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>

<div class="form-group">
	{!! Form::label('sexo','Sexo') !!}
	{!! Form::select('sexo', ['M', 'F'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('edo_cvil','Estado Civil') !!}
	{!! Form::select('edo_civil', ['Soltero(a)', 'Casado(a)','Concuvino(a)','Viudo(a)'],null, ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el estado civil del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('municipio','Municipio') !!}
	{!! Form::text('municipio',null,['class' => 'form-control','placeholder' => 'Ej: José Felix Rivas','required' => 'required', 'title' => 'Ingrese el municipio del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('ciudad','Ciudad') !!}
	{!! Form::text('ciudad',null,['class' => 'form-control','placeholder' => 'Ej: La Victoria','required' => 'required', 'title' => 'Ingrese la ciudad del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('estado','Estado') !!}
	{!! Form::select('estado', ['Aragua', 'Caracas','Guarico'], ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el estado del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('pais','Pais') !!}
	{!! Form::text('pais',null,['class' => 'form-control','placeholder' => 'Ej: Venezuela','required' => 'required', 'title' => 'Ingrese el pais del personal']) !!}
</div>

<div class="form-group">
	{!! Form::label('telf_movil','Teléfono móvil') !!}
	{!! Form::text('telf_movil',null,['class' => 'form-control','placeholder' => 'Ej: 04162455643','required' => 'required', 'title' => 'Ingrese el teléfono móvil del personal']) !!}
</div>

<div class="form-group">
	{!! Form::label('telf_fijo','Teléfono fijo') !!}
	{!! Form::text('telf_fijo',null,['class' => 'form-control','placeholder' => 'Ej: 02446675544','required' => 'required', 'title' => 'Ingrese el teléfono de habitación del personal']) !!}
</div>

<div class="form-group">
	{!! Form::label('correo','Correo Electrónico') !!}
	{!! Form::email('correo',null,['class' => 'form-control','placeholder' => 'Ej: jose_sosa@live.com','required' => 'required', 'title' => 'Ingrese el correo del personal']) !!}
</div>

<div class="form-group">
	{!! Form::label('titulo','Título') !!}
	{!! Form::text('titulo',null,['class' => 'form-control','placeholder' => 'Ej: Educación','required' => 'required', 'title' => 'Ingrese el título del personal']) !!}
</div>
<div class="form-group">
	{!! Form::label('mencion','Mención') !!}
	{!! Form::text('mencion',null,['class' => 'form-control','placeholder' => 'Ej: Orientación','required' => 'required', 'title' => 'Ingrese la mención del personal']) !!}
</div>
<div>
	{!! Form::label('cargo','Cargo') !!}
	{!! Form::select('id_tipoPersonal', $tipos, null, ['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el tipo de personal']) !!}	
</div>
<div>
	{!! Form::label('cargo','Cargo') !!}
	{!! Form::select('id_cargo', $cargos, null, ['class' => 'form-control','value' => '1', 'title' => 'Seleccione el cargo']) !!}	
</div>