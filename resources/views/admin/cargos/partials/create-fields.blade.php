<div class="control-group">
    {!! Form::label('Cargo', 'Cargo', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('cargo', null, ['class'=>'input-xlarge', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('cargo') ? 'border-color: red; border: 1px solid red;': '']) !!}
    </div>
</div>

<div class="control-group">
    {!! Form::label('Tipo de Personal', 'Tipo de Personal', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::select('id_tipo_personal', $tipo, null, ['class'=>'input-xlarge']) !!}
    </div>
</div>