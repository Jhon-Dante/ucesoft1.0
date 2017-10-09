<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div style="overflow: scroll;">
	<div class="form-group">
		<table id="example1" class="table table-bordered table-striped" align="center" width="100%">
			<thead>
				<tr>
					<td colspan="4"></td>
					@foreach($reportes2->groupBy('nro_reportes') as $key)

						<td colspan="2" align="center"><strong>Momento {{$n=$n+1}} </strong></td>

					@endforeach
				</tr>
				<tr>
					<td>Nro.</td>
					<td>Nombres</td>
					<td>Apellidos</td>
					<td>Cédula</td>
						@foreach($reportes2 as $key)
									<th>Juicio</th>
									<th>Sugerencias</th>
						@endforeach
					
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
									<td align="center">{{$c->juicios}}</td>
									<td align="center">{{$c->sugerencia}}</td>
								@endif
							@endforeach
						</tr>
				@endforeach
			</tbody>
		</table>


	</div>
</div>
</body>
</html>