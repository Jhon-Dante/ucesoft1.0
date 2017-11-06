<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',$datosBasicos->cedula,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombre',$datosBasicos->nombres,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
</div>
<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellido',$datosBasicos->apellidos,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('lugar_nac') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('lugar_nac','Lugar de nacimiento') !!}
	{!! Form::text('lugar_nac',$datosBasicos->lugar_nac,['class' => 'form-control','placeholder' => 'Ej: Hospital de clínicas Aragua', 'title' => 'Ingrese el lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('estado','Estado') !!}
	{!! Form::text('estado',$datosBasicos->estado,['class' => 'form-control','placeholder' => 'Ej: Caracas', 'title' => 'Ingrese el estado del lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('nacimiento') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',$datosBasicos->nacimiento,['class' => 'form-control','placeholder' => 'Fecha de nacimiento', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('edad','Edad') !!}
	{!! Form::text('edad',$datosBasicos->edad,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad actual del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('sexo','Sexo:') !!}
	{!! Form::label('sexo','M') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
	{!! Form::label('sexo','F') !!}
	{!! Form::radio('sexo',null,['class' => 'form-control']) !!}
</div>
<div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('peso','Peso') !!}
	{!! Form::text('peso',$datosBasicos->peso,['class' => 'form-control','placeholder' => 'Ej: 23', 'title' => 'Ingrese el peso del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('talla') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('talla','Talla') !!}
	{!! Form::text('talla',$datosBasicos->talla,['class' => 'form-control','placeholder' => 'Ej: 4 - L', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('salud') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('salud','Salud') !!}
	{!! Form::text('salud',$datosBasicos->salud,['class' => 'form-control','placeholder' => 'Ej: Autismo, ceguera...', 'title' => 'Ingrese las enfermedades o discapacidades que padece el estudiante estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',$datosBasicos->direccion,['class' => 'form-control','placeholder' => 'Dirección', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>


