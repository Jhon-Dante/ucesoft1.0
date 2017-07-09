<div class="control-group">
    {!! Form::label('Cargo', 'Cargo', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('cargo', $cargo->cargo, ['required', 'class'=>'input-xlarge', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>
