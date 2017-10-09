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
						@if($id_periodo==$key2[$i]->id_periodo)	
							<th colspan="{{$lapsos[$t2]*2}}" align="center" style="font-size: 10px;"><center>{{$key->codigo}}</center></th>
							
						<?php $i++;$t2++; ?>
						@endif
					@endforeach
				@endforeach
				<th colspan="3"><center>Descargar Boletín</center></th>
				</tr>
				<tr >
					<td colspan="4" rowspan="2"></td>
					<?php $t=0; ?>
					@foreach($asignaturas as $key)
					<?php $k=0; ?>
					@foreach($key->boletin->groupBy($key->id) as $key2)
						@if($id_periodo==$key2[$k]->id_periodo and $key->id==$key2[$k]->id_asignatura)	
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
						<td>{{$num=$num+1}}</td>
						<td>{{$key->datosBasicos->nombres}}</td>
						<td>{{$key->datosBasicos->apellidos}}</td>
						<td>{{$key->datosBasicos->cedula}}</td>
					@foreach($asignaturas as $key3)
						
						@foreach($key3->boletin as $key2)
							@if($id_periodo==$key2->id_periodo and $key2->id_datosBasicos==$key->id_datosBasicos)	
								<th  style="font-size: 10px;">{{$key2->calificacion}}</th>
								<th  style="font-size: 12px;">{{$key2->inasistencias}}</th>
							
							@endif
						@endforeach
					@endforeach
					<td>
					@if($lapso1==1)

						<a href="{{ route('admin.educacion_media.pdf', [1,$key->id_datosBasicos,$id_periodo]) }}"><button class="btn btn-info btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-file-pdf-o"></i></button></a> 
					@endif</td>
					<td>@if($lapso1==2) PDF @endif</td>
					<td>@if($lapso1==3) PDF @endif</td>
					</tr>
              	@endforeach
					
            </tbody>
        </table>
    </div>
            <!-- /.box-body -->
</div>



