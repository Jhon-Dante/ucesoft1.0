<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000','required' => 'required', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellido',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa','required' => 'required', 'title' => 'Ingrese el primer y segundo apellido del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('lugar_nac','Lugar de nacimiento') !!}
	{!! Form::text('lugar_nac',null,['class' => 'form-control','placeholder' => 'Ej: Hospital de clínicas Aragua','required' => 'required', 'title' => 'Ingrese el lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('estado','Estado') !!}
	{!! Form::text('estado',null,['class' => 'form-control','placeholder' => 'Ej: Caracas','required' => 'required', 'title' => 'Ingrese el estado del lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento','required' => 'required', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('edad','Edad') !!}
	{!! Form::text('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8','required' => 'required', 'title' => 'Ingrese la edad actual del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('sexo','Sexo:') !!}
	{!! Form::label('sexo','M') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
	{!! Form::label('sexo','F') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('peso','Peso') !!}
	{!! Form::text('peso',null,['class' => 'form-control','placeholder' => 'Ej: 23','required' => 'required', 'title' => 'Ingrese el peso del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('talla','Talla') !!}
	{!! Form::text('talla',null,['class' => 'form-control','placeholder' => 'Ej: 4 - L','required' => 'required', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('salud','Salud') !!}
	{!! Form::text('salud',null,['class' => 'form-control','placeholder' => 'Ej: Autismo, ceguera...','required' => 'required', 'title' => 'Ingrese las enfermedades o discapacidades que padece el estudiante estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección','required' => 'required', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>

<div class="form-group">
	{!! Form::label('nombre_p','Nombre del Padre') !!}
	{!! Form::text('nombre_p',null,['class' => 'form-control','placeholder' => 'Ej: Carlos Marquez','required' => 'required', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula_p','Cédula del padre') !!}
	{!! Form::text('cedula_p',null,['class' => 'form-control','placeholder' => 'Ej: 11999676','required' => 'required', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('vive_p','¿vive?') !!}
	{!! Form::label('vive_p','Si') !!}
	{!! Form::radio('vive_p',null,['class' => 'form-control']) !!}
	{!! Form::label('vive_p','No') !!}
	{!! Form::radio('vive_p',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nombre_m','Nombre de la madre') !!}
	{!! Form::text('nombre_m',null,['class' => 'form-control','placeholder' => 'Ej: Diana López','required' => 'required', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula_p','Cédula del padre') !!}
	{!! Form::text('cedula_p',null,['class' => 'form-control','placeholder' => 'Ej: 11999676','required' => 'required', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('vive_m','¿vive?') !!}
	{!! Form::label('vive_m','Si') !!}
	{!! Form::radio('vive_m',null,['class' => 'form-control']) !!}
	{!! Form::label('vive_m','No') !!}
	{!! Form::radio('vive_m',null,['class' => 'form-control']) !!}
</div>
