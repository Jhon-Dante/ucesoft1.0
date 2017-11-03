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

				</tr>
			</thead>
            <tbody>
              	
					<tr>
						<td>{{$num=$num+1}}</td>
						<td>{{$inscripcion->datosBasicos->nombres}}</td>
						<td>{{$inscripcion->datosBasicos->apellidos}}</td>
						<td>{{$inscripcion->datosBasicos->cedula}}</td>
					@foreach($asignaturas as $key3)
						
						@foreach($key3->boletin as $key2)
							@foreach($personal->asignacion_a as $key4)
								@if($key2->id_periodo==$periodo->id and $key2->id_datosBasicos==$inscripcion->id_datosBasicos and $key4->pivot->id_asignatura==$key3->id )	
									<td  style="font-size: 10px;">{!! Form::number('calificacion[]',$key2->calificacion,['class' => 'form-control','max' => '20']) !!}</td>
									<input type="hidden" name="id[]" value="{{$key2->id}}">
									<input type="hidden" name="id_asignatura[]" value="{{$key2->id_asignatura}}">
									<input type="hidden" name="id_datosBasicos" value="{{$key2->id_datosBasicos}}">

									<td  style="font-size: 12px;">{!! Form::number('inasistencias[]',$key2->inasistencias,['class' => 'form-control']) !!}</td>
								
								@endif
							@endforeach
						@endforeach
					@endforeach
					
					
					</tr>

					
            </tbody>
        </table>
    </div>
            <!-- /.box-body -->
</div>



