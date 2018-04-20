<div class="row">
	<div class="col-md-6">
		<strong>Cambiar valores de número de bloques?</strong>
	</div>
	<div class="col-md-6">
		<input type="checkbox" name="edita" id="edita" value="Si">
	</div>
</div>
<hr>
@foreach($asignaturas as $asigna)
	@if ($asigna->id_curso==$secciones->id_curso)
		<div class="row">
			<div class="col-md-6">{{$asigna->asignatura}}</div>
			@foreach($nbloques as $nb)
				@if($nb->id_asignatura == $asigna->id)
					<div class="col-md-6">{!! Form::text('nb',$nb->n_bloques,['id' => 'nb','class' => 'form-control','disabled' => 'disabled'])!!}
					</div>
				@endif
			@endforeach
		</div>
	@endif
@endforeach