<div class="form-group{{ $errors->has('curso') ? ' has-error' : '' }}">
	{!! Form::label('curso','Curso/Grado/Nivel') !!}
	{!! Form::text('curso',null,['class' => 'form-control','placeholder' => '5to. Año.','required' => 'required', 'title' => 'Ingrese el año, nivel o grado que desea registrar', 'id' => 'phone']) !!}
</div>