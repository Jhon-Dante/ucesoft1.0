<!DOCTYPE html>
<html>
<head>
	<title>Boleta de Calificaciones de {{$inscripcion[0]->datosBasicos->nombres}} en el perído: {{$inscripcion[0]->periodo->periodo}}</title>

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
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title"></h3>
	    </div>
	            <!-- /.box-header -->
	    <div class="box-body no-padding" style="overflow: scroll;">


	    	<table>
	    		<thead>
	    			<tr>
						<th style="font-size: 10px;">Nombre</th>
						<th style="font-size: 10px;">Apellido</th>
						<th style="font-size: 10px;">Cédula</th>
						<th style="font-size: 10px;">Curso</th>
						<th style="font-size: 10px;">Sección</th>
						<th style="font-size: 10px;">Período</th>
					</tr>
	    		</thead>
	    		<tbody>
	    			@foreach($inscripcion as $key)
						<tr>
							<td>{{$key->datosBasicos->nombres}}</td>
							<td>{{$key->datosBasicos->apellidos}}</td>
							<td>{{$key->datosBasicos->cedula}}</td>
							<td>{{$key->seccion->curso->curso}}</td>
							<td>{{$key->seccion->seccion}}</td>
							<td>{{$key->periodo->periodo}}</td>
						</tr>
	              	@endforeach
	    		</tbody>
	    	</table>
	    	<br><br>	
	        <table id="example1" class="table table-bordered table-striped">
	            <thead>
	            	<tr>

					<?php $t2=0; ?>	
					@foreach($asignaturas as $key)
						<?php $i=0; ?>
						@foreach($key->boletin->groupBy($key->id) as $key2)
							@if($periodo->id==$key2[$i]->id_periodo)	
								<th colspan="{{$lapsos[$t2]*2}}" align="center" style="font-size: 10px;"><center>{{$key->codigo}}</center></th>
								
							<?php $i++;$t2++; ?>
							@endif
						@endforeach
					@endforeach

					</tr>
					<tr >

						<?php $t=0; ?>
						@foreach($asignaturas as $key)
						<?php $k=0; ?>
						@foreach($key->boletin->groupBy($key->id) as $key2)
							@if($periodo->id==$key2[$k]->id_periodo and $key->id==$key2[$k]->id_asignatura)	
								@for($m=0;$m<$lapsos[$t];$m++)
									<td>L{{$m+1}}</td>
									<td>I</td>
								@endfor
								
							<?php $k++;$t++; ?>
							@endif
						@endforeach
					@endforeach
					<td>L1</td>
					<td>L2</td>
					<td>L3</td>
					</tr>
				</thead>
	            <tbody>
	              	@foreach($inscripcion as $key)
						<tr>

						@foreach($asignaturas as $key3)
							
							@foreach($key3->boletin as $key2)
								@if($periodo->id==$key2->id_periodo and $key2->id_datosBasicos==$key->id_datosBasicos)	
									<th  style="font-size: 10px;">{{$key2->calificacion}}</th>
									<th  style="font-size: 12px;">{{$key2->inasistencias}}</th>
								
								@endif
							@endforeach
						@endforeach
						
						</tr>
	              	@endforeach
						
	            </tbody>
	        </table>
	    </div>
	            <!-- /.box-body -->
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
	</footer>
</body>
</html>





