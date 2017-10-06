

		
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
							@foreach($asignaturas as $asig)
							
								<th style="font-size: 8px;">{{$asig->codigo}}</th>
								<th style="font-size: 12px;">Inasis</th>
								
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
							{!! Form::hidden('id_datosBasicos[]',$key->datosBasicos->id) !!}
							
							@foreach($asignaturas as $key2)
							
								<td style="font-size: 12px;">
									<div class="form-group">
										<input type="text" name="id_asignatura[]" value="{{$key2->id}}">
										<select name="calificacion[]" title="Seleccione la calificación del estudiante" class="form-control" style="width: 5em;">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
										</select>
									</div>
								</td>

								<td style="font-size: 12px;">
									<div class="form-group">
										{!! Form::number('inasistencia[]','0',['class' => 'form-control', 'style' => 'width:5em', 'placeholder' => '1','title' => 'Ingrese las inasistencias que tiene el estudiante en las asignaturas', 'min' => '0', 'maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
									</div>
								</td>
								

							@endforeach


						</tr>
              	@endforeach

              </tbody>
          </table>
            </div>
            <!-- /.box-body -->
          </div>



