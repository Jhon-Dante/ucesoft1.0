<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
</div>
<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellido',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('lugar_nac') ? ' has-error' : '' }}">
	{!! Form::label('lugar_nac','Lugar de nacimiento') !!}
	{!! Form::text('lugar_nac',null,['class' => 'form-control','placeholder' => 'Ej: Hospital de clínicas Aragua', 'title' => 'Ingrese el lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
	{!! Form::label('estado','Estado') !!}
	{!! Form::text('estado',null,['class' => 'form-control','placeholder' => 'Ej: Caracas', 'title' => 'Ingrese el estado del lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('nacimiento') ? ' has-error' : '' }}">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
	{!! Form::label('edad','Edad') !!}
	{!! Form::text('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad actual del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
	{!! Form::label('sexo','Sexo:') !!}
	{!! Form::label('sexo','M') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
	{!! Form::label('sexo','F') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
</div>
<div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
	{!! Form::label('peso','Peso') !!}
	{!! Form::text('peso',null,['class' => 'form-control','placeholder' => 'Ej: 23', 'title' => 'Ingrese el peso del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('talla') ? ' has-error' : '' }}">
	{!! Form::label('talla','Talla') !!}
	{!! Form::text('talla',null,['class' => 'form-control','placeholder' => 'Ej: 4 - L', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('salud') ? ' has-error' : '' }}">
	{!! Form::label('salud','Salud') !!}
	{!! Form::text('salud',null,['class' => 'form-control','placeholder' => 'Ej: Autismo, ceguera...', 'title' => 'Ingrese las enfermedades o discapacidades que padece el estudiante estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>

<div class="form-group{{ $errors->has('nombre_p') ? ' has-error' : '' }}">
	{!! Form::label('nombre_p','Nombre del Padre') !!}
	{!! Form::text('nombre_p',null,['class' => 'form-control','placeholder' => 'Ej: Carlos Marquez', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('cedula_p') ? ' has-error' : '' }}">
	{!! Form::label('cedula_p','Cédula del padre') !!}
	{!! Form::text('cedula_p',null,['class' => 'form-control','placeholder' => 'Ej: 11999676', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('vive_p') ? ' has-error' : '' }}">
	{!! Form::label('vive_p','¿vive?') !!}
	{!! Form::label('vive_p','Si') !!}
	{!! Form::radio('vive_p',null,['class' => 'form-control']) !!}
	{!! Form::label('vive_p','No') !!}
	{!! Form::radio('vive_p',null,['class' => 'form-control']) !!}
</div>

<div class="form-group{{ $errors->has('nombre_m') ? ' has-error' : '' }}">
	{!! Form::label('nombre_m','Nombre de la madre') !!}
	{!! Form::text('nombre_m',null,['class' => 'form-control','placeholder' => 'Ej: Diana López', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('cedula_m') ? ' has-error' : '' }}">
	{!! Form::label('cedula_m','Cédula de la madre') !!}
	{!! Form::text('cedula_m',null,['class' => 'form-control','placeholder' => 'Ej: 11999676', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('vive_m') ? ' has-error' : '' }}">
	{!! Form::label('vive_m','¿vive?') !!}
	{!! Form::label('vive_m','Si') !!}
	{!! Form::radio('vive_m',null,['class' => 'form-control']) !!}
	{!! Form::label('vive_m','No') !!}
	{!! Form::radio('vive_m',null,['class' => 'form-control']) !!}
</div>
