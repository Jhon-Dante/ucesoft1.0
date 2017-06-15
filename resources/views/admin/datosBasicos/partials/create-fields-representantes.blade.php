<div class="form-group">
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellido',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa','required' => 'required', 'title' => 'Ingrese el primer y segundo apellido del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del representante','required' => 'required', 'title' => 'Ingrese la nacionalidad del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => '24999000','required' => 'required', 'title' => 'Ingrese la cedula del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('profesion','Profesión') !!}
	{!! Form::text('profesion',null,['class' => 'form-control','placeholder' => 'Ej: Arquitecto','required' => 'required', 'title' => 'Ingrese la cedula del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('parentesco','Parentesco') !!}
	{!! Form::text('parentesco',null,['class' => 'form-control','placeholder' => 'Ej: Hijo(a)','required' => 'required', 'title' => 'Ingrese la cedula del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('vive_a','¿Vive con el alumno?') !!}
	{!! Form::label('vive_a','Si') !!}
	{!! Form::radio('vive_a',null,['class' => 'form-control','placeholder' => '24999000','required' => 'required']) !!}
	{!! Form::label('vive_a','No') !!}
	{!! Form::radio('vive_a',null,['class' => 'form-control','placeholder' => '24999000','required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('ingreso','Ingreso Aprox.') !!}
	{!! Form::text('ingreso',null,['class' => 'form-control','placeholder' => 'Ej: Hijo(a)','required' => 'required', 'title' => 'Ingrese el ingreso del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('n-familia','Número de miembros de la familia') !!}
	{!! Form::text('n_familia',null,['class' => 'form-control','placeholder' => 'Ej: 5','required' => 'required', 'title' => 'Número de personas en el hogar']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección','required' => 'required', 'title' => 'Ingrese la dirección del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('tel_hab','Teléfono de habitación') !!}
	{!! Form::text('tel_hab',null,['class' => 'form-control','placeholder' => 'Ej: 02445561199','required' => 'required', 'title' => 'Teléfono de habitación']) !!}
</div>
<div class="form-group">
	{!! Form::label('telefono','Teléfono celular') !!}
	{!! Form::text('telefono',null,['class' => 'form-control','placeholder' => 'Ej: 04123346050','required' => 'required', 'title' => 'Teléfono móvil']) !!}
</div>
<div class="form-group">
	{!! Form::label('lugar_tra','Lugar de trabajo') !!}
	{!! Form::text('lugar_tra',null,['class' => 'form-control','placeholder' => 'Ej: Vencerámicas c.a.','required' => 'required', 'title' => 'Ingrese el lugar de trabajo del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('tel_tra','Teléfono de trabajo') !!}
	{!! Form::text('parentesco',null,['class' => 'form-control','placeholder' => 'Ej: 02441104455','required' => 'required', 'title' => 'Teléfono del trabajo del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('responsable_m','Respondable de cancelar la mensualidad') !!}
	{!! Form::text('parentesco',null,['class' => 'form-control','placeholder' => 'Ej: Hijo(a)','required' => 'required', 'title' => 'Ingrese el nombre del responsable de cancelar la mensualidad']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion_r','Dirección del responsable') !!}
	{!! Form::text('direccion_r',null,['class' => 'form-control','placeholder' => 'Dirección','required' => 'required', 'title' => 'Ingrese la dirección del responsable de cancerlar la mensualidad']) !!}
</div>
<div class="form-group">
	{!! Form::label('tele_res','Teléfono del responable') !!}
	{!! Form::text('tele_res',null,['class' => 'form-control','placeholder' => 'Ej: Hijo(a)','required' => 'required', 'title' => 'Teléfono del responsable']) !!}
</div>
<div class="form-group">
	{!! Form::label('tele_opcion','En caso de no poseer teléfono, indicar el número de algún contacto') !!}
	{!! Form::text('tele_opcion',null,['class' => 'form-control','placeholder' => 'Ej: 04148867755','required' => 'required', 'title' => 'Ingrese el número de algún contacto opcional']) !!}
</div>
<div class="form-group">
	{!! Form::label('tele_e','En caso de EMERGENCIA llamar a:') !!}
	{!! Form::text('tele_e',null,['class' => 'form-control','placeholder' => '041201019944','required' => 'required', 'title' => 'Ingrese la dirección del representante']) !!}
</div>