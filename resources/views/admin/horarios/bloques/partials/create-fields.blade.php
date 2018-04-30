<hr>
@foreach($asignaturas as $asigna)
	@if ($asigna->id_curso==$secciones->id_curso)
		<div class="row">
			<div class="col-md-6">{{$asigna->asignatura}}<input type="hidden" name="id_asignatura[]" value="{{$asigna->id}}"></div>
			@foreach($nbloques as $nb)
				@if($nb->id_asignatura == $asigna->id)
					<div class="col-md-6">{!! Form::number('nb[]',$nb->n_bloques,['id' => 'nb','class' => 'form-control', 'min' => '1','maxLength' => '1'])!!}
					</div>
				@endif
			@endforeach
		</div>
	@endif
@endforeach