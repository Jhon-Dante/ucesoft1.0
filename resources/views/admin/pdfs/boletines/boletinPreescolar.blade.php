<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div style="overflow: scroll;">
	<div class="form-group">
		<table>
			<thead>
				
			</thead>
			<tbody>
				@foreach($inscritos as $inscri)
						<tr>
							<td>{{$num=$num+1}}</td>
							<td>{{$inscri->datosBasicos->nombres}}</td>
							<td>{{$inscri->datosBasicos->apellidos}}</td>
							<td>{{$inscri->datosBasicos->nacionalidad}}.-{{$inscri->datosBasicos->cedula}}</td>
						</tr>
				@endforeach
			</tbody>
		</table>
		<table id="example1" class="table table-bordered table-striped" align="center" width="100%">
			<thead>
				<tr>
					<td colspan="4"></td>
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
				
							@foreach($reportes as $c)
								@if($c->id_periodo == $periodos->id and $c->id_datosBasicos == $inscri->datosBasicos->id)
									<td>{{$c->juicios}}</td>
									<td>{{$c->sugerencia}}</td>
								@endif
							@endforeach
			</tbody>
		</table>


	</div>
</div>
</body>
</html>