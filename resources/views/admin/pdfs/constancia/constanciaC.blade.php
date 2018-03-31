<?php set_time_limit(10);?>
	<style type="text/css">
		html {
		margin: 20;
		}
		body {
		font-family: "Times New Roman", serif;
		}
		.normal{

  			border-size: 1px solid #000;
  			border-collapse: collapse;
		}
		.normal th, .normal td {
  		border: 1px solid #000;
  		}
  		.IV{
  			align-content: right;
  			border-style: solid;
  			border-top-width: 1px;
  			border-right-width: 1px;
  			border-bottom-width: 1px;
  			border-left-width: 1px
  		}
	</style>
	<p>
<table>
	<tr>
		<td><img src="..\public\img\logoE.png">
		</td>
		<td>
			<strong>Certificado de Calificaciones<strong>
			<strong>Código de Formato:
			Plan de Estudio:</strong> Educación Media General
			<strong>COD:</strong>
			<strong>Mención:</strong> ********
			<strong>Lugar y Fecha de Expedición:</strong> La Victoria. <?php echo date("d/m/y") ?>
		</td>
	</tr>
</table>

	<strong>II. Datos del Plantel o Z.E. que emite la certificación:</strong><br><strong>Cód. Plantel:</strong> <u>PD09110505</u> <strong>Nombre:</strong> <u>Unidad Educativa Privada Colegio "URDANETA CAMPO ELÍAS"</u> <strong>Dtto. Escolar: <u>05</u> Dirección:</strong> <u>Urbanización Bolívar Norte Calle Juan Vicente Bolívar y Ponte. nro. 31 La Victoria-Estado Aragua</u> <strong>Telf:</strong> <u>0244-8080090</u> <strong>Municipio:</strong> <u>JOSÉ FELIX RIBAS</u> <strong>Entidad Federal:</strong> <u>Aragua</u> <strong>ZONA EDUCATIVA:</strong> <u>ARAGUA</u><br>
	<strong>III. Datos de Identificación del Alumno:<br>
	Cédulad de Identidad: <u>{{$inscripcion->DatosBasicos->nacionalidad}}-{{$inscripcion->DatosBasicos->cedula}}</u> Fecha de Nacimiento: <u>{{$inscripcion->DatosBasicos->fecha_nac}}</u> Apellidos: <u>{{$inscripcion->DatosBasicos->apellidos}}</u> Nombres: <u>{{$inscripcion->DatosBasicos->nombres}}</u> Lugar de Nacimiento: <u>{{$inscripcion->DatosBasicos->lugar_nac}}</u> Entidad Federal o País: <u>{{$inscripcion->DatosBasicos->estado}}</u>
	</strong>
	<table width="100%">
		<tr>
			<td>
				<strong>V. PENSUM DE ESTUDIOS</strong>
			</td>
			<td align="right">
				<strong>IV. Director(a) del Plantel</strong>
			</td>
		</tr>
	</table>
	<table>

	<tr> 
		<?php $n=0; ?>
		<table align="left" class="normal" cellpadding="3">
		@foreach($cursos as $curso)
		
		<tr>
			<td>Año o Grado: <strong>
				@if($n==0)
					Primero
				@elseif ($n==1)
					Segundo
				@elseif ($n==2)
					Tercero
				@elseif ($n==3)
					Cuarto
				@else
					Quinto
				@endif
			</strong></td>
			<td colspan="2"><strong>CALIFICACIONES</strong></td>
			<td></td>
			<td colspan="2"><strong>FECHA</strong></td>
			<td><strong>PLANTEL</strong></td>
		</tr>
		<tr>
			<td><strong>Asignaturas</strong></td>
			<td><strong>En Nro.</strong></td>
			<td><strong>En Letras</strong></td>
			<td><strong>T-E</strong></td>
			<td><strong>Mes</strong></td>
			<td><strong>Año</strong></td>
			<td><strong>Nro.</strong></td>
		</tr>
			@foreach($asignaturas as $asig)
				@if($asig->id_curso == $curso->id)
					<tr>
						<td>{{$asig->asignatura}}</td>
							@foreach($q as $q1)
								@foreach($w as $w1)
									@foreach($e as $e1)
										@if($q1->id_asignatura == $asig->id && $w1->id_asignatura == $asig->id && $e1->id_asignatura == $asig->id)

												
													{{$resul=$q1->calificacion+$w1->calificacion+$e1->calificacion/3}}
												
												<td align="center">{{round($resul)}}</td>
												<td align="center">
													@if(round($resul)==1)UNO
													@elseif(round($resul)==2)DOS
													@elseif(round($resul)==3)TRES
													@elseif(round($resul)==4)CUATRO
													@elseif(round($resul)==5)CINCO
													@elseif(round($resul)==6)SEIS
													@elseif(round($resul)==7)SIETE
													@elseif(round($resul)==8)OCHO
													@elseif(round($resul)==9)NUEVE
													@elseif(round($resul)==10)DIEZ
													@elseif(round($resul)==11)ONCE
													@elseif(round($resul)==12)DOCE
													@elseif(round($resul)==13)TRECE
													@elseif(round($resul)==14)CATORCE
													@elseif(round($resul)==15)QUINCE
													@elseif(round($resul)==16)DIECISÉIS
													@elseif(round($resul)==17)DIECISIETE
													@elseif(round($resul)==18)DIECIOCHO
													@elseif(round($resul)==19)DIECINUEVE
													@else VEINTE
													@endif
													

												</td>
												<td align="center">F</td>
												<td align="center">Julio</td>
												<td align="center">2018</td>
												<td align="center">1</td>
										
										@endif
									@endforeach
								@endforeach
							@endforeach
					</tr>
				
				@endif
			@endforeach
		<?php $n++; ?>
		@endforeach
		</table>
		<table align="right" width="136" height="40">
			<tr>
				<td align="left"><strong>Apellidos y Nombres</strong></td>
			</tr>
			<tr>
				<td align="center">Longoria Blanco Juan</td>
			</tr>
			<tr>
				<td align="left"><strong>Número de C.I.</strong></td>
			</tr>
			<tr>
				<td align="center">V.-4.367.685</td>
			</tr>
			<tr>
				<td align="left"><strong><br><br>Firma.</strong></td>
			</tr>
			<tr>
				<td align="center"><strong><br><br><br>Sello del Plantel</strong></td>
			</tr>
			<tr>
				<td align="center"><br><br><br><br><br>Para efectos de su validez a nivel nacional</td>
			</tr>
			<tr>
				<td align="center">
					<strong>VII. DIRECTOR(A) DE LA ZONA EDUCATIVA</strong>
				</td>
			</tr>
			<tr>
				<td align="left"><strong>Apellidos y Nombres:</strong></td>
			</tr>
			<tr>
				<td align="center">Longoria Blanco Juan Enrique</td>
			</tr>
			<tr>
				<td align="left"><strong>Número de Cédula:</strong></td>
			</tr>
			<tr>
				<td align="center">V.- 8367685</td>
			</tr>
			<tr>
				<td align="center"><br><br><br><br><strong>Sello de la Zona Educativa</strong></td>
			</tr>
			<tr>
				<td align="justify"><br><br><br><br>Para efectos de su valideza nivel Nacional e internacional y cuando  se trate de estudios libres equivalentes sin escolaridad.</td>
			</tr>
			<tr>
				<td align="justify">TIMBRE FISCAL: Este documento no tiene validez si no se coloca en la parte posterior timbres fiscales por Bs. 30% de la Unidad Tributaria</td>
			</tr>
		</table>
		

		
	</tr>
</table>

 	
 <p>

<div style="page-break-after:always;">
			<table align="right" width="136">
			<tr>
				<td align="left"><strong>Apellidos y Nombres</strong></td>
			</tr>
			<tr>
				<td align="center">Longoria Blanco Juan</td>
			</tr>
			<tr>
				<td align="left"><strong>Número de C.I.</strong></td>
			</tr>
			<tr>
				<td align="center">V.-4.367.685</td>
			</tr>
			<tr>
				<td align="left"><strong><br><br>Firma.</strong></td>
			</tr>
			<tr>
				<td align="center"><strong><br><br><br>Sello del Plantel</strong></td>
			</tr>
			<tr>
				<td align="center"><br><br><br><br><br>Para efectos de su validez a nivel nacional</td>
			</tr>
			<tr>
				<td align="center">
					<strong>VII. DIRECTOR(A) DE LA ZONA EDUCATIVA</strong>
				</td>
			</tr>
			<tr>
				<td align="left"><strong>Apellidos y Nombres:</strong></td>
			</tr>
			<tr>
				<td align="center">Longoria Blanco Juan Enrique</td>
			</tr>
			<tr>
				<td align="left"><strong>Número de Cédula:</strong></td>
			</tr>
			<tr>
				<td align="center">V.- 8367685</td>
			</tr>
			<tr>
				<td align="center"><br><br><br><br><strong>Sello de la Zona Educativa</strong></td>
			</tr>
			<tr>
				<td align="justify"><br><br><br><br>Para efectos de su valideza nivel Nacional e internacional y cuando  se trate de estudios libres equivalentes sin escolaridad.</td>
			</tr>
			<tr>
				<td align="justify">TIMBRE FISCAL: Este documento no tiene validez si no se coloca en la parte posterior timbres fiscales por Bs. 30% de la Unidad Tributaria</td>
			</tr>
		</table>
		</div>

		<div style="page-break-after:always;">
			<table class="IV" height="100%" cellpadding="10">
 		<tr>
 			<td align="center">REVISADO POR COORDINADOR</td>
 		</tr>
 		<tr>
 		   	<td align="center">DEL</td>
 		<tr>
			<td align="center">DEL DEPARTAMENTO  DE  CONTROL</td>
		</tr>
		<tr>
			<td align="center">DE ESTUDIOS</td>
		</tr>
		<tr>
			<td align="center">NOMBRES Y APELLIDOS</td>
		</tr>
		<tr>
			<td align="center">MARÍA  SOJO  M</td>
		</tr>
		<tr>
			<td align="center">C.I:V- 3.934.133</td>
		</tr>
		<tr>
			<td align="center">FIRMA_______________</td>
		</tr>
		<tr>
			<td align="center">VERIFICADO  POR</td>
		</tr>
		<tr>
			<td align="center">NOMBRES Y APELLIDOS</td>
		</tr>
		<tr>
			<td align="center">IRIS  CASENAVE  SOSA</td>
		</tr>
		<tr>
			<td align="center">C.I: V- 4.368.337</td>
		</tr>
		<tr>
			<td align="center">FIRMA_______________</td>
 		</tr>
 	</table>
		</div>