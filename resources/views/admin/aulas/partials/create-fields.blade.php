<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
    {!! Form::label('nombre', 'Número', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('nombre', null, ['class'=>'input-xlarge', 'placeholder' => '001', 'title' => 'Ingrese el literal o el número del aula', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'maxlength' => '4']) !!}
    </div>
</div>