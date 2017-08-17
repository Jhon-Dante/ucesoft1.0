@foreach($asignaturas as $asignatura)
	@if($asignatura->id == $asignatura->id)
		<div class="form-group">
			{!! Form::label('id','id') !!}
			{{$asignatura->id}}
		</div>
		<div class="form-group">
			{!! Form::label('asignatura','Asignatura') !!}
			{{$asignatura->asignatura}}
		</div>
		<div class="form-group">
			{!! Form::label('curso','Curso') !!}
			{{$asignatura->id_curso}}
		</div>
	@endif
@endforeach