<div class="form-group">
	{!! Form::label('curso','Curso/Grado/Nivel') !!}
	{!! Form::text('curso',$curso->curso,['class' => 'form-control','placeholder' => '5to. Año.','required' => 'required', 'title' => 'Ingrese el año, nivel o grado que desea registrar']) !!}
</div>