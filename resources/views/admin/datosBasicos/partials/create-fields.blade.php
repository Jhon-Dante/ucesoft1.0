<div class="form-group">
	{!! Form::label('padre','Datos del padre') !!}
</div>

<div class="form-group">
	{!! Form::label('nombreP','Nombres') !!}
	{!! Form::text('nombresP',null,['class' => 'form-control','placeholder' => 'Pedro Pablo','required' => 'required', 'title' => 'Ingrese los nombres del Padre']) !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['style'=>'size:5px important!','class' => 'form-control','placeholder' => 'Nacionalidad del Padre','required' => 'required', 'title' => 'Ingrese la nacionalidad del Padre']) !!}
	{!! Form::text('cedulaP',null,['class' => 'form-control','placeholder' => '87654321','required' => 'required', 'title' => 'Ingrese los nombres del Padre','id' => 'cedulaP']) !!}
</div>

<div id="cedulaP">
	
</div>


<div class="form-group">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Juan José','required' => 'required', 'title' => 'Ingrese los datos del primer y segundo nombre del estudiante']) !!}
</div>

<div class="form-group">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellido',null,['class' => 'form-control','placeholder' => 'Ramírez Zerpa','required' => 'required', 'title' => 'Ingrese el primer y segundo apellido del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante','required' => 'required', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => '24999000','required' => 'required', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección','required' => 'required', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento','required' => 'required', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
