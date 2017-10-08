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
				@foreach($asignaturas as $key)
					<?php $i=0; ?>
					@foreach($key->boletin->groupBy($key->id) as $key2)
						@if($id_periodo==$key2[$i]->id_periodo)	
							<th colspan="{{$lapsos[$i]*2}}" align="center" style="font-size: 10px;">{{$key->codigo}}</th>
							<!-- <th colspan="{{$lapsos[$i]*2}}" style="font-size: 12px;">Inasis</th> -->
						<?php $i++; ?>
						@endif
					@endforeach
				@endforeach
				</tr>
				<tr >
					<td colspan="4" rowspan="2"></td>
					@foreach($asignaturas as $key)
					<?php $k=0; ?>
					@foreach($key->boletin->groupBy($key->id) as $key2)
						@if($id_periodo==$key2[$k]->id_periodo and $key->id==$key2[$k]->id_asignatura)	
							@for($m=0;$m<$lapsos[$k];$m++)
								<td>L{{$m+1}}</td>
								<td>I</td>
							@endfor
							{{$k}}
						<?php $k++; ?>
						@endif
					@endforeach
				@endforeach
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
					</tr>
              	@endforeach
					
            </tbody>
        </table>
    </div>
            <!-- /.box-body -->
</div>



