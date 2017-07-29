<div class="form-group">
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad',['V','E'],$representantes->nacionalidad ,['class' => 'form_control']) !!}
</div>
<div class="form-group">
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula', $representantes->cedula, ['class' => 'form-control','placeholder' => '4555666', 'title' => 'Ingrese la nacionalidad del representante','maxlength' => '8']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombres','Nombres') !!}
	{!! Form::text('nombres',$representantes->nombres, ['class' => 'form-control','placeholder' => 'Carlos Alejandro', 'title' => 'Ingrese el primer y segundo nombre del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos','Apellidos') !!}
	{!! Form::text('apellidos',$representantes->apellidos, ['class' => 'form-control','placeholder' => 'Garrido Silva', 'title' => 'Ingrese la el primer y segundo apellido del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('profesion','Profesión') !!}
	{!! Form::text('profesion',$representantes->profesion, ['class' => 'form-control','placeholder' => 'Administrador', 'title' => 'Ingrese la profesión del representante']) !!}
</div>
<div class="form-group">
		{!! Form::label('parentesco','Parentesco') !!}
        {!! Form::select('id_parentesco',$parentesco, $representantes->id_parentesco, ['class' => 'form-control',  'title' => 'Identifique el parentesco del representante con el estudiante']) !!}
</div>


<!-- -->


<div class="form-group">
	{!! Form::label('vive_estu','¿Vive con el estudiante?') !!}
	{!! Form::select('vive_estu',['Si','No'],$representantes->vive_estu,['class' => 'form-control', 'title' => 'Seleccione deacuerdo a la convivencia con el estudiante']) !!}
</div>
<div class="form-group">
	{!! Form::label('ingreso_apx','Ingresos Aproximados') !!}
	{!! Form::number('ingreso_apx',$representantes->ingreso_apx, ['class' => 'form-control','placeholder' => '200000', 'title' => 'Ingrese el ingreso del representante','min' => '0', 'maxlength' => '10','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('n_familia','Número de miembros en el hogar') !!}
	{!! Form::number('n_familia',$representantes->n_familia, ['class' => 'form-control','placeholder' => '3', 'title' => 'Cuantos familiares habitan en su grupo hogar?','min' => '1', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección del representante') !!}
	{!! Form::textarea('direccion', $representantes->direccion, ['class' => 'form-control', 'placeholder' => 'Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_habitacion','Teléfono del hogar') !!}
	{!! Form::select('codigo_hab', ['0244','0412','0414','0424','0416','0426'],$representantes->codigo_hab,['class' => 'form-control','title' => 'Seleccione el código del teléfono del hogar']) !!}

	{!! Form::text('telf_hab', $representantes->telf_hab, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>

<!-- -->


<div class="form-group">
	{!! Form::label('lugar_tra','Lugar de trabajo del representante') !!}
	{!! Form::text('lugar_tra',$representantes->lugar_tra, ['class' => 'form-control', 'placeholder' => 'Vencerámica c.a.', 'title' => 'lugar de trabajo del representante']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_tra','Teléfono de trabajo') !!}
	{!! Form::select('codigo_tra',['0244','0412','0414','0424','0416','0426'],$representantes->codigo_tra, ['class' => 'form-control','title' => 'Seleccione el código del teleéfono']) !!}
	
	{!! Form::text('telf_tra', $representantes->telf_tra, ['class' => 'form-control', 'maxlength' => '7']) !!}


</div>
<div class="form-group">
	{!! Form::label('responsable_m','Responsable de pagar las mensualidades') !!}
	{!! Form::text('responsable_m',$representantes->responsable_m, ['class' => 'form-control',  'placeholder' => 'Maria Ruiz']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_responsable','Teléfono de responsable') !!}
	{!! Form::select('codigo_responsable',['0244','0412','0414','0424','0416','0426'],$representantes->codigo_responsable, ['class' => 'form-control','title' => 'Seleccione el código del teleéfono del responsable']) !!}
	
	{!! Form::text('telf_responsable', $representantes->telf_responsable, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>
<div class="form-group">
	{!! Form::label('codigo_opcional','Teléfono opcional') !!}
	{!! Form::select('codigo_opcional',['0244','0412','0414','0424','0416','0426'],$representantes->codigo_opcional, ['class' => 'form-control','title' => 'Seleccione el código del teleéfono']) !!}
	
	{!! Form::text('telf_opcional', $representantes->telf_opcional, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre_opcional','En caso de no poseer teléfono, indicar el nombre de algún contacto') !!}
	{!! Form::text('nombre_opcional',$representantes->nombre_opcional, ['class' => 'form-control',  'placeholder' => 'Alberto delgado']) !!}
</div>
<div class="form-group">
	{!! Form::label('telf_emergencia','En caso de EMERGENCIA, llamar a') !!}
	{!! Form::select('codigo_emergencia',['0244','0412','0414','0424','0416','0426'],$representantes->codigo_emergencia, ['class' => 'form-control','title' => 'Seleccione el código del teléfono']) !!}

	{!! Form::text('telf_emergencia', $representantes->telf_emergencia, ['class' => 'form-control', 'maxlength' => '7']) !!}
</div>