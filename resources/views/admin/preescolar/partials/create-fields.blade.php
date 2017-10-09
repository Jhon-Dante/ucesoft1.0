<div style="overflow: scroll;">
	<div class="form-group">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nro.-</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
					<th>Juicio</th>
					<th>Sugerencias</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($inscritos as $inscri)
					<tr>
						<td>{{$num=$num+1}}</td>
						<td>{{$inscri->datosBasicos->nombres}}</td>
						<input type="hidden" name="id_datosBasicos[]" value="{{$inscri->datosBasicos->id}}">
						<input type="hidden" name="id_periodo" value="{{$periodos->id}}">
						<td>{{$inscri->datosBasicos->apellidos}}</td>
						<td>{{$inscri->datosBasicos->nacionalidad}}.-{{$inscri->datosBasicos->cedula}}</td>
						<td>{!! Form::textarea('juicios[]',null,['class' => 'form-control']) !!}</td>
						<td>{!! Form::textarea('sugerencia[]',null,['class' => 'form-control']) !!}</td>
					</tr>
				@endforeach
			</tbody>
		</table>


	</div>
</div>