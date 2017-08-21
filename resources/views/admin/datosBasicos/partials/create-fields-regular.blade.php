@foreach($datosBasicos as $db)
	@if($db->id == $id_estudiante)
		<div class="form-group">
		{!! Form::hidden('id',$db->id) !!}
		{!! Form::label('dato_basico','Estudiante:') !!}
		{{$db->nombres}} {{$db->apellidos}}
		</div>
		<div class="form-group">
		{!! Form::label('','Cédula')!!}
		{{$db->nacionalidad}}-{{$db->cedula}}
		</div>
	@endif
@endforeach

<div class="form-group">
	{!! Form::label('fecha_re','Fechad de reinscripción')!!}

	{{date('D'-'Y')}}
</div>
