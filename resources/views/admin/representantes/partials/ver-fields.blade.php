<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad:') !!}
	{{$representante->nacionalidad}}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula:') !!}
	{{$representante->cedula}}
</div>
<div class="form-group">
	{!! Form::label('nombre','Nombres:') !!}
	{{$representante->nombres}}
</div>
<div class="form-group">
	{!! Form::label('apellido','Apellidos:') !!}
	{{$representante->apellidos}}
</div>
<div class="form-group">
	{!! Form::label('profesion','Profesión:') !!}
	{{$representante->profesion}}
</div>
<div class="form-group">
	{!! Form::label('id_parentesco','Parentesco:') !!}
	{{$representante->parentesco->parentesco}}
</div>
<div class="form-group">
	{!! Form::label('vive_estu','¿Vive con el estudiante?:') !!}
	{{$representante->vive_estu}}
</div>
<div class="form-group">
	{!! Form::label('ingreso_apx','Ingresos aproximados:') !!}
	{{$representante->ingreso_apx}} Bs.F.
</div>
<div class="form-group">
	{!! Form::label('n_familia','Número de familiares en el hogar:') !!}
	{{$representante->n_familia}}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección:') !!}
	{{$representante->direccion}}
</div>
<div class="form-group">
	{!! Form::label('telf_hab','Teléfono de habitación:') !!}
	{{$representante->codigo_hab}} - {{$representante->telf_hab}}
</div>
<div class="form-group">
	{!! Form::label('lugar_tra','Lugar de trabajo:') !!}
	{{$representante->lugar_tra}}
</div>
<div class="form-group">
	{!! Form::label('telf_tra','Teléfono de trabajo:') !!}
	{{$representante->codigo_tra}} - {{$representante->telf_hab}}
</div>

<div class="form-group">
	{!! Form::label('responsable_m','Responsable de pagar las mansualidades:') !!}
	{{$representante->responsable_m}}
</div>
<div class="form-group">
	{!! Form::label('telf_responsable','Teléfono del responsable:') !!}
	{{$representante->codigo_responsable}} - {{$representante->telf_responsable}}
</div>
<div class="form-group">
	{!! Form::label('nombre_opcional','Nombre de familiar o persona de confianza(opcional):') !!}
	{{$representante->nombre_opcional}}
</div>

<div class="form-group">
	{!! Form::label('telf_opcional','Teléfono del familiar o persona de confianza(opcional):') !!}
	{{$representante->codigo_opcional}} - 
	{{$representante->telf_opcional}}
</div>
<div class="form-group">
	{!! Form::label('cedula_m','Teléfono de emergencia:') !!}
	{{$representante->codigo_emergencia}} - {{$representante->telf_emergencia}}
</div>

