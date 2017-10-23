

<div class="form-group{{ $errors->has('id_representante') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('representante','Representante') !!}
	<select name="id_representante" id="id_representante" title="Identifique  representante del estudiante" class="form-control select2">
		@foreach($representantes as $key)
			<option value="{{$key->id}}">{{$key->apellidos}},{{$key->nombres}} {{$key->nacionalidad}}-{{$key->cedula}}</option>
		@endforeach
	</select>
</div>

<div class="form-group{{ $errors->has('id_parentesco') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
	{!! Form::label('parentesco','Parentesco') !!}
	{!! Form::select('id_parentesco',$parentesco,null,['class' => 'form-control',  'title' => 'Identifique el parentesco del representante con el estudiante']) !!}
</div>