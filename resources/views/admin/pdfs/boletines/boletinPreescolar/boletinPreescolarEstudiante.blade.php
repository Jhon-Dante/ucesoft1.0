<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		table{
			border:1px solid #;
		}
		tr{
			border:1px solid #;
		}
		td{
			text-align: center;
		}

	</style>
</head>
<body>
	<div style="overflow: scroll;">
	<div class="form-group">
		<table>
			<thead>
				<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Cédula</th>
						<th>Curso</th>
						<th>Sección</th>
						<th>Periodo</th>
				</tr>
			</thead>
			<br>
			<tbody>
				<tr align="center">
					@foreach($inscritos as $inscri)
						@if($inscri->datosBasicos->id == $id_datosBasicos)
							<td>{{$inscri->datosBasicos->nombres}}</td>
							<td>{{$inscri->datosBasicos->apellidos}}</td>
							<td>{{$inscri->datosBasicos->nacionalidad}}.-{{$inscri->datosBasicos->cedula}}</td>
							<td>{{$inscri->seccion->curso->curso}}</td>
							<td>{{$inscri->seccion->seccion}}</td>
							<td>{{$periodos->periodo}}</td>
						@endif
					@endforeach

				</tr>
			</tbody>
		</table>

		<div class="row">

				<table id="example1" class="table table-bordered table-striped" align="center" width="100%">
					<thead>
						<tr>

							@foreach($reportes2->groupBy('nro_reportes') as $key)

								<td colspan="2" align="center"><strong>Momento {{$n=$n+1}} </strong></td>

							@endforeach
						</tr>
						<tr>
								@foreach($reportes2 as $key)
											<th>Juicio</th>
											<th>Sugerencias</th>
								@endforeach
							
						</tr>
					</thead>
					<tbody>
						@foreach($inscritos as $inscri)
							@if($inscri->datosBasicos->id == $id_datosBasicos)
								<tr>
									

									@foreach($reportes as $c)
										@if($c->id_periodo == $periodos->id and $c->id_datosBasicos == $inscri->datosBasicos->id)
											<td align="center">{{$c->juicios}}</td>
											<td align="center">{{$c->sugerencia}}</td>
										@endif
									@endforeach
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>

		</div>


	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<footer>
		<table align="center" width="100%">
			<thead>
				<tr>
					<th>_________________________________</th>
					<th>_________________________________</th>
					<th>_________________________________</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Firma del profesor encargado</td>
					<td>Sello de la institución</td>
					<td>Firma del director</td>
				</tr>
			</tbody>
		</table>
</body>
</html>