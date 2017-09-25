<div class="form-group">

	
		{!! Form::hidden('id_datosBasicos',$datosBasicos2->id) !!}
		{!! Form::label('dato_basico','Estudiante:') !!}
		{{$datosBasicos2->nombres}} {{$datosBasicos2->apellidos}}
		</div>
		<div class="form-group">
		{!! Form::label('','Cédula:')!!}
		{{$datosBasicos2->nacionalidad}}-{{$datosBasicos2->cedula}}
</div>	
@if(count($inscripciones) <=	0)
<div class="form-group">
	{!! Form::label('seccion','Curso y sección')!!}
	<select name="id_seccion" class="form-control select2">
		@foreach($secciones as $seccion)
		<option value="{{$seccion->id}}">Curso: {{$seccion->curso->curso}}, Sección: {{$seccion->seccion}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	{!! Form::label('materiap','Materia a repetir') !!}
	<select class="form-control select2" multiple="multiple" name="repite[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) ">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('materiap','Materia Pendiente') !!}
	<select class="form-control select2" multiple="multiple" name="pendiente[]" id="id_asignatura" title="Seleccione la(s) asignatura(s) pendiente(s) ">
		@foreach($asignaturas as $asig)
			<option value="{{$asig->id}}">{{$asig->asignatura}} - Curso: {{$asig->cursos->curso}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	{!! Form::label('periodo','Período')!!}
	{{$periodos->periodo}}
	{!! Form::hidden('id_periodo',$periodos->id)!!}

</div>

@else
		<div class="form-group">
			{!! Form::label('seccion','Curso anterior:')!!}

				{{$inscripciones->seccion->curso->curso}},
			{!! Form::label('seccion','Sección:')!!}
				{{$inscripciones->seccion->seccion}}

		</div>
		<div class="form-group">
			{!! Form::label('seccion','Curso siguiente:')!!}
			{!! Form::hidden('id_seccion',$curso_s->id) !!}
			{{$curso_s->curso->curso}} 
		</div>
		<div class="form-group">
			{!! Form::label('seccion','Sección:')!!}
			<select name="id_seccion" class="form-group">
				@foreach($secciones as $seccion)
					@if($curso_s->id==$seccion->id)
						<option value="{{$seccion->id}}">{{$seccion->seccion}}</option>
					@endif
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('id_periodo','Período a registrar: ') !!}

			@if($periodos->status == 'Activo')
				{{$periodos->periodo}}
				{!! Form::hidden('id_periodo',$periodos->id) !!}
			@endif
		</div>


@endif