<div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('representante','Representante') !!}
	{!! Form::select('representante',$representante,null,['class' => 'form-control', 'title' => 'Identifique el parentesco del representante con el estudiante']) !!}
</div>