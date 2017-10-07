<div class="form-group">
		{!! Form::label('docente','Docente') !!}

		<select id="id_personal" name="id_personal" class="form-control select2" required="required" title="Seleccione el docente" title="Identifique el docente a asignar la materia">
			@foreach($personal as $key)
				<option value="{{$key->id}}">{{$key->apellidos}}, {{$key->nombres}}</option>
			@endforeach
		</select>
        
</div>

<div class="form-group">
	{!! Form::label('cursos','Cursos')  !!}
	{!! Form::select('id_curso',['placeholder' => 'Seleccione el Curso'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Curso','id' => 'id_curso']) !!}
</div>

<div class="form-group">
	{!! Form::label('secciones','Secciones')  !!}
	{!! Form::select('id_seccion',['placeholder' => 'Seleccione la Seccion'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Sección','id' => 'id_seccion']) !!}
</div>

