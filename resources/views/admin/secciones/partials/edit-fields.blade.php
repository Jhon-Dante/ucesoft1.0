<div class="form-group">
	(<span style="color: red;">*</span>)
	{!! Form::label('seccion','Sección') !!}
	{!! Form::text('seccion', $seccion->seccion, ['class' => 'form-control', 'placeholder' => '5to. Año','required' => 'required', 'title' => 'Ingrese el año, nivel o grado que desea actualizar']) !!}
</div>
<div class="form-group">
	(<span style="color: red;">*</span>)
	{!! Form::label('curso','Curso/Grado/Nivel') !!}
	{!! Form::select('id_curso',$cursos,$seccion->id_curso,['class' => 'form-control','title' => 'Ingrese el curso a actualizar']) !!}
</div>