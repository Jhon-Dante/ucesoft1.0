
	<table id="example1" class="table table-bordered table-striped">
		<tr>
			<th>Asignaturas</th>
			<th>Primer Lapso</th>
			<th>Inasistencias</th>
			<th>Segundo Lapso</th>
			<th>Inasistencias</th>
			<th>Primer Tercer</th>
			<th>Inasistencias</th>
			<th>Inasistencias totales</th>
			<th>Total por lapso</th>
			<th>Ponderación Total</th>

		</tr>
		@foreach($asignaturas as $asig)
			@if($asig->id_curso == 2)
			
				<tr>
					
					<td><strong>{{$asig->asignatura}}</strong></td>
					<input type="hidden" name="id_asignatura[]" value="{{$asig->id}}">
					<input type="hidden" name="lapso" value="1">
					<div style="background-color:yellow;">
						<td><select name="calificacion[]">
							<option value=""></option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
						</select></td>
						<td>{!! Form::number('inasistencias[]','null',['class' => 'form-control','min' => '0']) !!}</td>
						
						
					</div>
					
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>	
					
				</tr>
			@endif
		@endforeach

		</table>
