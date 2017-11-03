<div style="overflow: scroll;">
	<div class="form-group">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<td colspan="3"></td>
					@foreach($reportes2->groupBy('nro_reportes') as $key)

						<td colspan="2"><strong>Momento {{$n=$n+1}} </strong></td>

					@endforeach
				</tr>
				<tr>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
						@foreach($reportes2 as $key)
									<th>Juicio</th>
									<th>Sugerencias</th>
						@endforeach
					
				</tr>
			</thead>
			<tbody>
					
						<tr>
							
							<td>{{$inscrito->datosBasicos->nombres}}</td>
							<td>{{$inscrito->datosBasicos->apellidos}}</td>
							<td>{{$inscrito->datosBasicos->nacionalidad}}.-{{$inscrito->datosBasicos->cedula}}</td>


							@foreach($reportes as $c)
								@if($c->id_periodo == $periodo->id and $c->id_datosBasicos == $inscrito->datosBasicos->id)

										<td>{!! Form::textarea('juicios[]',$c->juicios,['class' => 'form-control']) !!}</td>
										<td>{!! Form::textarea('sugerencia[]',$c->sugerencia,['class' => 'form-control']) !!}</td>
										<input type="hidden" name="id[]" value="{{$c->id}}">
									
								@endif
							@endforeach

							
						</tr>

			</tbody>
		</table>


	</div>
</div>