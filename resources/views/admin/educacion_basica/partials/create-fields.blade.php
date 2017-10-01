
{{count($cali)}}

		
		<table id="example1" class="table table-bordered table-striped">
				<tr>
					<th>Asignaturas</th>
					<th>Primer Lapso</th>
					<th>Inasistencias</th>
					<th>Segundo Lapso</th>
					<th>Inasistencias</th>
					<th>Tercer Lapso</th>
					<th>Inasistencias</th>
					<th>Inasistencias totales</th>
					<th>Total por lapso</th>
					<th>Ponderación Total</th>

				</tr>
				

				
				
				@foreach($cali as $c)
				
					

					
						@if($c->lapso == 1 )
						<tr>
							<td><strong>{{$c->asignatura->asignatura}}</strong></td>
							<td>{{$c->calificacion}}</td>
							<td>{{$c->inasistencias}}</td>

						@elseif($c->lapso == 2 )

							<td><strong>{{$c->asignatura->asignatura}}</strong></td>
							<td>{{$c->calificacion}}</td>
							<td>{{$c->inasistencias}}</td>
						</tr>
						@endif
						
					
				

						
						
						

				@endforeach
				


				


		</table>



