
@if(count($cali) == 0)
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
			@if($asig->id_curso == 8)
				<tr>
					
					<td><strong>{{$asig->asignatura}}</strong></td>
					<input type="hidden" name="id_asignatura[]" value="{{$asig->id}}">
					<input type="hidden" name="lapso" value="1">
					<div style="background-color:yellow;">
						<td>{!! Form::number('calificacion[]',null,['class' => 'form-control','max' => '20','min' => '1']) !!}</td>
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
@elseif(count($cali) >= 1)

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
			
			@foreach($cali as $c)
				
					<tr>
						
						<td><strong>{{$c->asignatura->asignatura}}</strong></td>
						<td>{{$c->calificacion}}</td>
						<td>{{$c->inasistencias}}</td>
						<input type="hidden" name="id_asignatura[]" value="{{$c->asignatura->id}}">
						<input type="hidden" name="lapso" value="2">
						<div style="background-color:yellow;">
							<td>{!! Form::number('calificacion[]',null,['class' => 'form-control','max' => '20','min' => '1']) !!}</td>
							<td>{!! Form::number('inasistencias[]','null',['class' => 'form-control','min' => '0']) !!}</td>
							
							
						</div>
						
						
						<td></td>
						<td></td>
						<td>{{$c->inasistencias}}</td>
						<td></td>	
						
					</tr>

			@endforeach
			
</table>
	
@elseif(count($cali) >= 2)

	
@endif