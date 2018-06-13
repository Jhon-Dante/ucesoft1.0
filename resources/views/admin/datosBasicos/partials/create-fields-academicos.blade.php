<div class="form-group">
(<span style="color: red;">*</span>)
	{!! Form::label('plantel','Plantel de procedencia') !!}
	{!! Form::text('plantel',null,['class' => 'form-control','placeholder' => 'U.E.N "Simón Bolívar"' , 'title' => 'Ingrese los datos del plantel de procedencia', 'id' => 'plantel']) !!}
</div>

<div class="form-group">
	{!! Form::label('id_curso','Curso:') !!}
	
	<select name="id_curso" class="form-control" id="id_curso">
		<option value='0'>Selecciona curso</option>
			@foreach($cursos as $c)
				<option value="{{$c->id}}">{{$c->curso}}</option>
			@endforeach
	</select>
</div>



