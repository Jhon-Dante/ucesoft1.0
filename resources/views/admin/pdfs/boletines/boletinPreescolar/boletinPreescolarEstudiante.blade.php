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
	<table>
						<tr>
							<td>{{$inscripcion->datosBasicos->nombres}}</td>
							<td>{{$inscripcion->datosBasicos->apellidos}}</td>
							<td>{{$inscripcion->datosBasicos->nacionalidad}}.-</td>
							<td>{{$inscripcion->datosBasicos->cedula}}</td>
							<td><strong>{{$inscripcion->seccion->curso->curso}}</strong></td>
							<td>{{$inscripcion->seccion->seccion}}</td>
							<td>{{$inscripcion->periodo->periodo}}</td>
						</tr>
	</table>
	 <br>
<section>
	<table width="100%" border="1">
		<tr>
			<td>
				<h4>Primer Reporte Globalizado</h4>
					@foreach($l1 as $key)
						<p>{{$key->juicios}}</p>
					@endforeach
			</td>
			<td>
				<h4>Segundo Reporte Globalizado</h4>
					@foreach($l2 as $key2)
						<p>{{$key2->juicios}}</p>
					@endforeach
			</td>
			<td>
				<h4>Tercer Reporte Globalizado</h4>
					@foreach($l3 as $key3)
						<p>{{$key3->juicios}}</p>
					@endforeach
			</td>
		</tr>




	</table>
		
		<br>
	<table width="100%" align="center">
		<tr>
			<td>
				<b>Primer Lapso</b>
				<p>Firma del representante:    Firma del Prof. Guía
					<br>
				__________________    _______________________
				Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
			<td>
				<b>Segundo Lapso</b>

				<p>Firma del representante:    Firma del Prof. Guía
					<br>
				__________________    _______________________
				Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
			<td>
				<b>Tercer Lapso</b>
				<p>Firma del representante:    Firma del Prof. Guía
					<br>
				__________________    _______________________
				Cédula: <u>{{$representante->nacionalidad}}.-{{$representante->cedula}}</u> Fecha:_____________</p>
			</td>
		</tr>
	</table>
	</section>
</section>