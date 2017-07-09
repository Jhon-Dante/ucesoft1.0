<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
    {!! Form::label('Cargo', 'Cargo', ['class'=>'form-label']) !!}
    {!! Form::text('cargo', null, ['class'=>'form-control', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('cargo') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
