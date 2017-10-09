<div style="overflow: scroll;">
	<div class="form-group">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<td colspan="4"></td>
					@foreach($reportes2->groupBy('nro_reportes') as $key)

						<td colspan="2"><strong>Momento {{$n=$n+1}} </strong></td>

					@endforeach
					<td></td>
				</tr>
				<tr>
					<th>Nro.-</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
						@foreach($reportes2 as $key)
									<th>Juicio</th>
									<th>Sugerencias</th>
						@endforeach
					<th>Descargar Boleta</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($inscritos as $inscri)
					
						<tr>
							
							<td>{{$num=$num+1}}</td>
							<td>{{$inscri->datosBasicos->nombres}}</td>
							<td>{{$inscri->datosBasicos->apellidos}}</td>
							<td>{{$inscri->datosBasicos->nacionalidad}}.-{{$inscri->datosBasicos->cedula}}</td>


							@foreach($reportes as $c)
								@if($c->id_periodo == $periodos->id and $c->id_datosBasicos == $inscri->datosBasicos->id)

										<td>{{$c->juicios}}</td>
										<td>{{$c->sugerencia}}</td>
									
								@endif
							@endforeach

							<td>
								
										
								<a href="{{route ('admin.calificaciones.pdf2',['id_datosBasicos' => $inscri->datosBasicos->id,'id_seccion' => $inscri->id_seccion, 'id_periodo' => $key->id_periodo])}}">
				                <button class="btn btn-info btn-flat"><i class="fa fa-file-pdf-o"></i></button>
				                </a>

							</td>
						</tr>
				@endforeach
			</tbody>
		</table>


	</div>
</div>