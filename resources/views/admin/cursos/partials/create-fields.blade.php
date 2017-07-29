<div class="form-group{{ $errors->has('curso') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
	{!! Form::label('curso','Curso/Grado/Nivel') !!}
	{!! Form::text('curso',null,['class' => 'form-control','placeholder' => '5to. Año.', 'title' => 'Ingrese el año, nivel o grado que desea registrar', 'id' => 'phone']) !!}
</div>