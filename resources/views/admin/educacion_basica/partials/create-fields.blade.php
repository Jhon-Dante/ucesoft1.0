
@if($cali == 0)
	<table id="example1" class="table table-bordered table-striped">
		<tr>
			<th>Asignaturas</th>
			<th>Primer Lapso</th>
			<th>Inasistencias</th>
			<th>Primer Segundo</th>
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
					<div style="background-color:yellow;">
						<td><select name="calificacion[]">
							<option value=""></option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
						</select></td>
						<td>{!! Form::number('inasistencias[]','null') !!}</td>
						
						
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
@elseif($cali >= 1)

<table id="example1" class="table table-bordered table-striped">
		<tr>
			<th>Asignaturas</th>
			<th>Primer Lapso</th>
			<th>Inasistencias</th>
			<th>Primer Segundo</th>
			<th>Inasistencias</th>
			<th>Primer Tercer</th>
			<th>Inasistencias</th>
			<th>Inasistencias totales</th>
			<th>Total por lapso</th>
			<th>Ponderación Total</th>

		</tr>
		@foreach($asignaturas as $asig)
			@if($asig->id_curso == 2)
				@foreach($boleta as $b)
					<tr>
						
						<td><strong>{{$asig->asignatura}}</strong></td>
						<td>{{$b->asignatura->asignatura}}</td>
						<td></td>
						<input type="hidden" name="id_asignatura[]" value="{{$asig->id}}">
						<div style="background-color:yellow;">
							<td><select name="calificacion[]">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
							</select></td>
							<td>{!! Form::number('inasistencias[]','null') !!}</td>
							
							
						</div>
						
						
						<td></td>
						<td></td>
						<td></td>	
						
					</tr>
				@endforeach
			@endif
		@endforeach
</table>
	
@elseif($cali >= 2)

	
@endif