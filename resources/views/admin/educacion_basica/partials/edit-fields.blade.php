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
						@if($periodo->id==$key2[$i]->id_periodo)	
							<th colspan="{{$lapsos[$t2]*2}}" align="center" style="font-size: 10px;"><center>{{$key->codigo}}</center></th>
							
						<?php $i++;$t2++; ?>
						@endif
					@endforeach
				@endforeach
				
				</tr>
				<tr>
					<td colspan="4" rowspan="2"></td>
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
							@if($periodo->id==$key2->id_periodo and $key2->id_datosBasicos==$key->id_datosBasicos)	
								<th  style="font-size: 10px;">
									<input type="hidden" name="id_asignatura[]" value="{{$key2->id_asignatura}}">
									{{$key2->calificacion}}{!! Form::select('calificacion[]',['A', 'B', 'C', 'D', 'E'], $key2->calificacion,[]) !!}
									
									<input type="hidden" name="id_periodo" value="{{$key2->id_periodo}}">
									<input type="hidden" name="id_datosBasicos" value="{{$key2->id_datosBasicos}}">
								</th>
								<th  style="font-size: 12px;">{!! Form::number('inasistencias[]',$key2->inasistencias) !!}</th>
							
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



