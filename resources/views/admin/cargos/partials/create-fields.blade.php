<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
    {!! Form::label('Cargo', 'Cargo', ['class'=>'form-label']) !!}
    {!! Form::text('cargo', null, ['class'=>'form-control', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('cargo') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('id_tipo_personal') ? ' has-error' : '' }}">
    {!! Form::label('Tipo de Personal', 'Tipo de Personal', ['class' => 'form-label']) !!}
    {!! Form::select('id_tipo_personal', $tipo, null, ['class' => 'form-control']) !!}
</div>