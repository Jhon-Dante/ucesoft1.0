<div class="form-group">
		{!! Form::label('docente','Docente: ') !!}

		<strong>{{$guia->personal->apellidos}}, {{$guia->personal->nombres}}</strong>
        
</div>

<div class="form-group">
	{!! Form::label('cursos','Cursos')  !!}
	{!! Form::select('id_curso',$cursos,$guia->secciones->id_curso,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Curso','id' => 'id_curso']) !!}
</div>
<div class="form-group">
	{!! Form::label('secciones','Secciones')  !!}
	{!! Form::select('id_seccion',$secciones,$guia->id_seccion,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione la Sección','id' => 'id_seccion']) !!}
</div>