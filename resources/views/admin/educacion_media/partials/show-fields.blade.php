<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body no-padding" style="overflow: scroll;">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
                	<th style="font-size: 10px;">Nro.</th>
					<th style="font-size: 10px;">Nombre</th>
					<th style="font-size: 10px;">Apellido</th>
					<th style="font-size: 10px;">Cédula</th>
				<?php $t2=0; ?>	
				@foreach($asignaturas as $key)
					<?php $i=0; ?>
					@foreach($key->boletin->groupBy($key->id) as $key2)
						@foreach($personal->asignacion_a as $key4)
						@if($periodo->id==$key2[$i]->id_periodo and $key4->pivot->id_asignatura==$key->id )	
							<th colspan="{{$lapsos[$t2]*2}}" align="center" style="font-size: 10px;"><center>{{$key->codigo}}</center></th>
							
						<?php $i++;$t2++; ?>
						@endif
						@endforeach
					@endforeach
				@endforeach
				<th colspan="3"><center>Opciones</center></th>
				</tr>
				<tr >
					<td colspan="4" rowspan="2"></td>
					<?php $t=0; ?>
					@foreach($asignaturas as $key)
					<?php $k=0; ?>
					@foreach($key->boletin->groupBy($key->id) as $key2)
					@foreach($personal->asignacion_a as $key4)
						@if($periodo->id==$key2[$k]->id_periodo and $key->id==$key2[$k]->id_asignatura and $key4->pivot->id_asignatura==$key->id )	
							@for($m=0;$m<$lapsos[$t];$m++)
								<td>L{{$m+1}}</td>
								<td>I</td>
							@endfor
							
						<?php $k++;$t++; ?>
						@endif
					@endforeach
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
						<td>{{$num=$num+1}}</td>
						<td>{{$key->datosBasicos->nombres}}</td>
						<td>{{$key->datosBasicos->apellidos}}</td>
						<td>{{$key->datosBasicos->cedula}}</td>
					@foreach($asignaturas as $key3)
						
						@foreach($key3->boletin as $key2)
							@foreach($personal->asignacion_a as $key4)
								@if($key2->id_periodo==$periodo->id and $key2->id_datosBasicos==$key->id_datosBasicos and $key4->pivot->id_asignatura==$key3->id )	
									<th  style="font-size: 10px;">{{$key2->calificacion}}</th>
									<th  style="font-size: 12px;">{{$key2->inasistencias}}</th>
								
								@endif
							@endforeach
						@endforeach
					@endforeach
					<td>

						@if($lapso1==1)
						<button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$key->datosBasicos->id}}','{{$key->seccion->id}}','{{$key->periodo->id}}' )" data-target="#myModal" class="btn btn-warning btn-flat" ><i class="fa fa-pencil"></i></button>
						@endif

					</td>
					<td>@if($lapso1==2) PDF @endif</td>
					<td>@if($lapso1==3) PDF @endif</td>
					</tr>
              	@endforeach
					
            </tbody>
        </table>
    </div>
            <!-- /.box-body -->
</div>



