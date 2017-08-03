<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacionalidad','Nacionalidad') !!}
	{!! Form::select('nacionalidad', ['V', 'E'], ['class' => 'form-control','placeholder' => 'Nacionalidad del estudiante', 'title' => 'Ingrese la nacionalidad del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('cedula','Cédula') !!}
	{!! Form::text('cedula',null,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nombre','Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
</div>
<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('apellido','Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('lugar_nac') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('lugar_nac','Lugar de nacimiento') !!}
	{!! Form::text('lugar_nac',null,['class' => 'form-control','placeholder' => 'Ej: Hospital de clínicas Aragua', 'title' => 'Ingrese el lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('estado','Estado') !!}
	{!! Form::text('estado',null,['class' => 'form-control','placeholder' => 'Ej: Caracas', 'title' => 'Ingrese el estado del lugar de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('nacimiento','Fecha de nacimiento') !!}
	{!! Form::date('fecha_nac',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento', 'title' => 'Ingrese la fecha de nacimiento del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('edad','Edad') !!}
	{!! Form::text('edad',null,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad actual del estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('sexo','Sexo:') !!}
	{!! Form::label('sexo','M') !!}
	{!! Form::radio('sexo','M',['class' => 'form-control']) !!}
	{!! Form::label('sexo','F') !!}
	{!! Form::radio('sexo','F',['class' => 'form-control']) !!}
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
	{!! Form::text('salud',null,['class' => 'form-control','placeholder' => 'Ej: Autismo, ceguera...', 'title' => 'Ingrese las enfermedades o discapacidades que padece el estudiante estudiante']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class' => 'form-control','placeholder' => 'Dirección', 'title' => 'Ingrese la dirección del estudiante']) !!}
</div>
<div class="form-group">
	<button type="button" id="ocultar" style="display:block; width: 200px;" class="btn btn-block btn-info" >Mostrar Padres Registrados</button>
	<button type="button" id="mostrar" style="display:none; width: 200px;" class="btn btn-block btn-info" >Registrar Padres</button>
	
	<!-- <input type="checkbox" name="ocultar" id="ocultar"  > -->
</div>

<div id="padres" style="display: block;">
	
	<!-- CAMPOS DEL PADRE -->
	
	<div class="form-group{{ $errors->has('nacionalidad_p') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('nacionalidad_p','Nacionalidad del Padre') !!}
		{!! Form::select('nacionalidad_p',['V','E'],['class' => 'form-control']) !!}
	</div>

	{!! Form::hidden('cedula_p','11') !!}

	<div class="form-group{{ $errors->has('nombres_p') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('nombres_p','Nombres del Padre') !!}
		{!! Form::text('nombres_p',null,['class' => 'form-control','placeholder' => 'Ej: Carlos Marquez', 'title' => 'Ingrese la talla del estudiante']) !!}
	</div>

	<div class="form-group{{ $errors->has('apellidos_p') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('apellidos_p','apellidos del Padre') !!}
		{!! Form::text('apellidos_p',null,['class' => 'form-control','placeholder' => 'Ej: Carlos Marquez', 'title' => 'Ingrese la talla del estudiante']) !!}
	</div>

	<div class="form-group{{ $errors->has('padre_vive') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('padre_vive','¿vive?') !!}
		{!! Form::label('padre_vive','Si') !!}
		{!! Form::radio('padre_vive','Si',['class' => 'form-control']) !!}
		{!! Form::label('padre_vive','No') !!}
		{!! Form::radio('padre_vive','No',['class' => 'form-control']) !!}
	</div>
		<input type="hidden" name="parentesco_p" value="2">


	<!-- CAMPOS DE LA MADRE -->

	<div class="form-group{{ $errors->has('nacionalidad_m') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('nacionalidad_m','Nacionalidad de la madre') !!}
		{!! Form::select('nacionalidad_m',['V','E'],['class' => 'form-control']) !!}
	</div>
	
	{!! Form::hidden('cedula_m','12') !!}
	<div class="form-group{{ $errors->has('nombres_m') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('nombres_m','Nombres de la madre') !!}
		{!! Form::text('nombres_m',null,['class' => 'form-control','placeholder' => 'Ej: Diana López', 'title' => 'Ingrese la talla del estudiante']) !!}
	</div>

	<div class="form-group{{ $errors->has('apellidos_m') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('apellidos_m','Apellidos de la madre') !!}
		{!! Form::text('apellidos_m',null,['class' => 'form-control','placeholder' => 'Ej: Diana López', 'title' => 'Ingrese la talla del estudiante']) !!}
	</div>

	<div class="form-group{{ $errors->has('madre_vive') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
		{!! Form::label('madre_vive','¿vive?') !!}
		{!! Form::label('madre_vive','Si') !!}
		{!! Form::radio('madre_vive','Si',['class' => 'form-control']) !!}
		{!! Form::label('madre_vive','No') !!}
		{!! Form::radio('madre_vive','No',['class' => 'form-control']) !!}
</div>
		<input type="hidden" name="parentesco_m" value="1">


</div>



<div id="seleccionarpadres" style="display: none">
<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)

	{!! Form::label('padre','Padre') !!}

	<div class="row">
		<div class="col-xs-8">
			<select name="id_padre" style="width: 100%;" id="padre" class="form-control select2">
				@foreach($padres as $padre)
					@if($padre->id_parentesco==2)
					<option value="{{ $padre->id }}">{{ $padre->apellidos }},{{ $padre->nombres }} {{ $padre->nacionalidad }}-{{ $padre->cedula }}</option>
					@endif
				@endforeach
				
			</select>
		</div>

		<div class="col-xs-4">
			{!! Form::label('padre_vive','¿vive con?') !!}
			{!! Form::checkbox('padre_vive','Si',false,['title' => 'Seleccione si la madre vive con el estudiante']) !!}
		</div>
	</div>
</div>


<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)

	{!! Form::label('padre','Madre') !!}

	<div class="row">
		<div class="col-xs-8">
			<select name="id_madre" id="padre" style="width: 100%;" class="form-control select2">
				@foreach($padres as $padre)
					@if($padre->id_parentesco==1)
					<option value="{{ $padre->id }}">{{ $padre->apellidos }},{{ $padre->nombres }} {{ $padre->nacionalidad }}-{{ $padre->cedula }}</option>
					@endif
				@endforeach
				
			</select>
		</div>

		<div class="col-xs-4">
			{!! Form::label('madre_vive','¿vive con?') !!}
			{!! Form::checkbox('madre_vive','Si',false,['title' => 'Seleccione si la madre vive con el estudiante']) !!}
		</div>
	</div>
</div>
</div>




