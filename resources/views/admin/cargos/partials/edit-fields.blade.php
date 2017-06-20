<div class="control-group">
    {!! Form::label('Cargo', 'Cargo', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('cargo', $cargo->cargo, ['required', 'class'=>'input-xlarge', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>

<div class="control-group">
    {!! Form::label('Tipo de Personal', 'Tipo de Personal', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::select('id_tipo_personal', $tipo, $cargo->id_tipo_personal, ['class'=>'input-xlarge']) !!}
    </div>
</div>