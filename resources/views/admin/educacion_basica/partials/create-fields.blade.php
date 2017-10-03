
@foreach($inscripcion as $ins)
		
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$ins->datosBasicos->nombres}} - {{$ins->datosBasicos->apellidos}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                	<th>Nro.</th>
					<th>Asignaturas</th>
					<th>Primer Lapso</th>
					<th>Inasistencias</th>
					<th>Segundo Lapso</th>
					<th>Inasistencias</th>
					<th>Tercer Lapso</th>
					<th>Inasistencias</th>
					<th>Inasistencias totales</th>
					<th>Total por lapso</th>
					<th>Ponderación Total</th>

				</tr>
				@foreach($asignaturas as $asig)
	               	<tr>
	               		<td>{{$num=$num+1}}</td>
	               		<td>{{$asig->asignatura}}</td>
	               		<td><select name="calificacion[]" class="form-control">
	               			<option value=""></option>
	               			<option value="A">A</option>
	               			<option value="B">B</option>
	               			<option value="C">C</option>
	               			<option value="D">D</option>
	               			<option value="E">E</option>
	               		</select></td>
	               		<td>{!! Form::number('inasistencias[]','null',['class' => 'form-control','min' => '0']) !!}</td>
	               		<td></td>
	               		<td></td>
	               		<td></td>
	               		<td></td>
	               		<td></td>
	               		<td></td>
	               		<td></td>
	               	</tr>
	            @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
	@endforeach


