
<table align="center">
	<tr>
		<td>
			<img src="..\public\img\escudo.png">
		</td>
		<td>
			<center>República Bolivariana de Venezuela</center>
			<center>Ministerio del Poder Popular para la Educación</center>
			<center>Unidad Educativa Colegio "Urdaneta y Campo Elías"</center>
			<center>COD. DEA. PD09110505- COD. ADMIN.. 51660- RIF V-03376811-3</center>
			<center>LA VICTORIA- ESTADO ARAGUA TELF. 02448080090-9712341</center>
		</td>
		<td>
			<img src="..\public\img\escudo.png">
		</td>
	</tr>
</table>

<section>
<br>
<table>
@foreach($inscripcion as $key)
						<tr>
							<td>{{$key->datosBasicos->nombres}}</td>
							<td>{{$key->datosBasicos->apellidos}}</td>
							<td>{{$key->datosBasicos->nacionalidad}}.-</td>
							<td>{{$key->datosBasicos->cedula}}</td>
							<td><strong>{{$key->seccion->curso->curso}}</strong></td>
							<td>{{$key->seccion->seccion}}</td>
							<td>{{$key->periodo->periodo}}</td>
						</tr>
	              	@endforeach
	 
<section>
	<table
		<table align="center" width="100%" border="1">
			<tr>
				<th>Áreas de Formación</th>
				<th>1er Lapso</th>
				<th>2do Lapso</th>
				<th>3er Lapso</th>
				<th>Promedio</th>
				<th colspan="3">Inasistencias</th>
			</tr>
			<tr>
				<td colspan="5"></td>
				<th align="center">lapso1</th>
				<th align="center">lapso2</th>
				<th align="center">lapso3</th>
			</tr>
			<?php $t2=0; ?>	
						@foreach($asignaturas as $asig)
							@if(count($l1)>0 AND count($l2)==0 AND count($l3) == 0)
								<tr>
									<td align="left">{{$asig->asignatura}}</td>
										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->calificacion}}</td>
											@endif
										@endforeach
									<td></td>
									<td></td>
									<td></td>

										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->inasistencias}}</td>
											@endif
										@endforeach
										<td></td>
										<td></td>
								</tr>
							@elseif(count($l1)>0 AND count($l2)>0 AND count($l3) == 0)
								<tr>
									<td align="left">{{$asig->asignatura}}</td>
										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->calificacion}}</td>
											@endif
										@endforeach
										@foreach($l2 as $key2)
											@if($key2->id_asignatura == $asig->id)
											<td align="center">{{$key2->calificacion}}</td>
											@endif
										@endforeach
										<td></td>
										<td></td>
										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->inasistencias}}</td>
											@endif
										@endforeach
										@foreach($l2 as $key2)
											@if($key2->id_asignatura == $asig->id)
											<td align="center">{{$key2->inasistencias}}</td>
											@endif
										@endforeach
										<td></td>
								</tr>
							@else
								<tr>
									<td align="left">{{$asig->asignatura}}</td>
										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->calificacion}}</td>
											@endif
										@endforeach
										@foreach($l2 as $key2)
											@if($key2->id_asignatura == $asig->id)
											<td align="center">{{$key2->calificacion}}</td>
											@endif
										@endforeach
										@foreach($l3 as $key3)
											@if($key3->id_asignatura == $asig->id)
											<td align="center">{{$key3->calificacion}}</td>
											@endif
										@endforeach
										<td></td>
										@foreach($l1 as $key)
											@if($key->id_asignatura == $asig->id)
											<td align="center">{{$key->inasistencias}}</td>
											@endif
										@endforeach
										@foreach($l2 as $key2)
											@if($key2->id_asignatura == $asig->id)
											<td align="center">{{$key2->inasistencias}}</td>
											@endif
										@endforeach
										@foreach($l3 as $key3)
											@if($key3->id_asignatura == $asig->id)
											<td align="center">{{$key3->inasistencias}}</td>
											@endif
										@endforeach
								</tr>
							@endif




						@endforeach


							
								
								

			<tr>
				
			</tr>
		</table>
	<br>
	<table width="100%" align="center" border="1">
		<tr>
			<td>
				<h4>Primer Lapso</h4>
				<p>Firma del representante:    Firma del Prof. Guía</p>
				<p>__________________    _______________________</p>
				<p>Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
			<td>
				<h4>Segundo Lapso</h4>

				<p>Firma del representante:    Firma del Prof. Guía</p>
				<p>__________________    _______________________</p>
				<p>Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
			<td>
				<h4>Tercer Lapso</h4>
				<p>Firma del representante:    Firma del Prof. Guía</p>
				<p>__________________    _______________________</p>
				<p>Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
		</tr>
	</table>
</section>
</section>