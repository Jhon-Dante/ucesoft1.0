<div class="row">
<div class="col-xs-6">
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)

	{!! Form::label('cedula','Cédula') !!}<br>

	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
		
	{!! Form::number('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del estudiante','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
	
</div>

<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Ingrese los Nombres del estudiante', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del estudiante', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('lugar_nac') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('lugar_nac','Lugar de nacimiento') !!}
	{!! Form::text('lugar_nac',null,['class' => 'form-control','placeholder' => 'Ej: Hospital de clínicas Aragua', 'title' => 'Ingrese el lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('estado','Estado') !!}
	<select class="form-control select2" title="Ingrese el estado del lugar de nacimiento del estudiante" name="estado">
		@for($i=0;$i<count($estados);$i++)
			<option value="{{$estados[$i]}}">{{$estados[$i]}}</option>
		@endfor
	</select>
</div>
<div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('fecha_nac',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
</div>

<div class="col-xs-6">
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('edad','Edad') !!}
	{!! Form::text('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad actual del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('sexo','Género:') !!}
	{!! Form::label('sexo','M') !!}
	{!! Form::radio('sexo','M',['title' => 'Seleccione si es de Género Masculino']) !!}
	{!! Form::label('sexo','F') !!}
	{!! Form::radio('sexo','F',['title' => 'Seleccione si es de Género Femenino']) !!}
</div>
<div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('peso','Peso') !!}
	{!! Form::text('peso',null,['class' => 'form-control','placeholder' => 'Ej: 23', 'title' => 'Ingrese el peso del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('talla') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('talla','Talla') !!}
	{!! Form::text('talla',null,['class' => 'form-control','placeholder' => 'Ej: 4 - L', 'title' => 'Ingrese la talla del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('salud') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('salud','Salud') !!}
	{!! Form::text('salud',null,['class' => 'form-control','placeholder' => 'Ej: Autismo, ceguera...', 'title' => 'Ingrese las enfermedades o discapacidades que padece el estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::textarea('direccion',null,['class' => 'form-control','placeholder' => 'Dirección', 'title' => 'Ingrese la dirección del estudiante','rows' => '3']) !!}
</div>
</div>
</div>


<div class="form-group">
	<button type="button" id="ocultar" style="display:block; width: 200px;" class="btn btn-block btn-info" >Mostrar Padres Registrados</button>
	<button type="button" id="mostrar" style="display:none; width: 200px;" class="btn btn-block btn-info" >Registrar Padres</button>
	
	<!-- <input type="checkbox" name="ocultar" id="ocultar"  > -->
</div>
<div class="row">

<div id="padres" style="display: block;">
	<div class="col-xs-6">
		<!-- CAMPOS DEL PADRE -->
		<div class="form-group">
			{!! Form::label('datos_padre','Datos del Padre') !!}
		</div>
		
		<div class="form-group{{ $errors->has('nacionalidad_p') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('cedula_padre','Cédula') !!}
			{!! Form::select('nacionalidad_p',['V','E'],['class' => 'form-control','title' => 'Seleccione la nacionalidad del padre']) !!}
			{!! Form::number('cedula_p',null,['class' => 'form-control','title' => 'Ingrese la cédula del Padre','id' => 'cedula_p', 'placeholder' => 'Ej: 1234567','maxlength' => '8', 'style'=>$errors->has('cedula_p') ? 'border-color: red; border: 1px solid red;': '','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
		</div>
		

		<div class="form-group{{ $errors->has('nombres_p') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('nombres_p','Nombres') !!}
			{!! Form::text('nombres_p',null,['class' => 'form-control','placeholder' => 'Ej: Carlos Enrique', 'title' => 'Ingrese los Nombres del Padre', 'style'=>$errors->has('nombres_p') ? 'border-color: red; border: 1px solid red;': '']) !!}
		</div>

		<div class="form-group{{ $errors->has('apellidos_p') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('apellidos_p','Apellidos') !!}
			{!! Form::text('apellidos_p',null,['class' => 'form-control','placeholder' => 'Ej: Marquez Morgado', 'title' => 'Ingrese los Apellidos del Padre', 'style'=>$errors->has('apellidos_p') ? 'border-color: red; border: 1px solid red;': '']) !!}
		</div>

		<div class="form-group{{ $errors->has('padre_vive') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('padre_vive','¿Vive con el estudiante?') !!}
			<input type="checkbox" name="vive_p" value="Si" title="Seleccione si el Padre vive con el Estudiante">
		</div>
			
	</div>

	<div class="col-xs-6">
		<!-- CAMPOS DE LA MADRE -->
		<div class="form-group">
			{!! Form::label('datos_madre','Datos de la Madre') !!}
		</div>

		<div class="form-group{{ $errors->has('cedula_m') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('nacionalidad_m','Cédula') !!}
			{!! Form::select('nacionalidad_m',['V','E'],['class' => 'form-control','title' => 'Seleccione la Nacionalidad de la Madre']) !!}
			{!! Form::number('cedula_m',null,['class' => 'form-control','title' => 'Ingrese la cédula de la Madre','id' => 'cedula_m', 'placeholder' => 'Ej: 1234567','maxlength' => '8', 'style'=>$errors->has('cedula_m') ? 'border-color: red; border: 1px solid red;': '','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
		</div>
		
		<div class="form-group{{ $errors->has('nombres_m') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('nombres_m','Nombres') !!}
			{!! Form::text('nombres_m',null,['class' => 'form-control','placeholder' => 'Ej: Diana María', 'title' => 'Ingrese los Nombres de la Madre']) !!}
		</div>

		<div class="form-group{{ $errors->has('apellidos_m') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('apellidos_m','Apellidos') !!}
			{!! Form::text('apellidos_m',null,['class' => 'form-control','placeholder' => 'Ej: López Sevilla', 'title' => 'Ingrese los Apellidos de la Madre']) !!}
		</div>

		<div class="form-group{{ $errors->has('madre_vive') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
			{!! Form::label('vive_con','¿Vive con el estudiante?') !!}
			<input type="checkbox" name="vive_m" value="Si" title="Seleccione si la Madre vive con el Estudiante">
		</div>
			

	</div>
</div>



<div id="seleccionarpadres" style="display: none; margin-left: 15px;">
	<div class="row">
			<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">

				<div class="col-xs-6">
				(<span style="color: red;">*</span>)
				{!! Form::label('padre','Padre') !!}

						<select name="id_padre" style="width: 100%;" id="padre" class="form-control select2">
							@foreach($padres as $padre)
								@if($padre->id_parentesco==2)
								<option value="{{ $padre->id }}">{{ $padre->apellidos }},{{ $padre->nombres }} {{ $padre->nacionalidad }}-{{ $padre->cedula }}</option>
								@endif
							@endforeach
							
						</select>
				</div>

					<div class="col-xs-6">
						<div class="form-group">
						<br>
						(<span style="color: red;">*</span>)
							{!! Form::label('padre_vive','¿vive con el estudiante?') !!}
							{!! Form::checkbox('padre_vive','Si',false,['title' => 'Seleccione si la madre vive con el estudiante','id' => 'vive_p']) !!}
						</div>
					</div>
				
			</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
			
				(<span style="color: red;">*</span>)
				{!! Form::label('padre','Madre') !!}
				<select name="id_madre" id="madre" style="width: 100%;" class="form-control select2">
				@foreach($padres as $padre)
					@if($padre->id_parentesco==1)
					<option value="{{ $padre->id }}">{{ $padre->apellidos }},{{ $padre->nombres }} {{ $padre->nacionalidad }}-{{ $padre->cedula }}</option>
					@endif
				@endforeach
				
			</select>
			</div>
		</div>

		<div class="col-xs-6">
			<div class="form-group">
				<br>
				(<span style="color: red;">*</span>)
				{!! Form::label('madre_vive','¿vive con el estudiante?') !!}
				{!! Form::checkbox('madre_vive','Si',false,['title' => 'Seleccione si la madre vive con el estudiante','id' => 'vive_m']) !!}
			</div>
		</div>
	</div>
</div>
</div>




