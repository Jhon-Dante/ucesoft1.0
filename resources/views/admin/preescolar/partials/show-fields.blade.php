<div style="overflow: scroll;">
	<div class="form-group">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<td colspan="4"></td>
					@foreach($reportes2->groupBy('nro_reportes') as $key)

						<td colspan="2"><strong>Momento {{$n=$n+1}} </strong></td>

					@endforeach
					<td></td>
				</tr>
				<tr>
					<th>Nro.-</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
						@foreach($reportes2 as $key)
									<th>Juicio</th>
									<th>Sugerencias</th>
						@endforeach
					<th>Editar</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($inscritos as $inscri)
					
						<tr>
							
							<td>{{$num=$num+1}}</td>
							<td>{{$inscri->datosBasicos->nombres}}</td>
							<td>{{$inscri->datosBasicos->apellidos}}</td>
							<td>{{$inscri->datosBasicos->nacionalidad}}.-{{$inscri->datosBasicos->cedula}}</td>


							@foreach($reportes as $c)
								@if($c->id_periodo == $periodos->id and $c->id_datosBasicos == $inscri->datosBasicos->id)

										<td>{{$c->juicios}}</td>
										<td>{{$c->sugerencia}}</td>
									
								@endif
							@endforeach

							<td>
								@if(Auth::user()->tipo_user == 'Administrador(a)')

			                      {!! Form::open(['route' => ['admin.editarmomento'], 'method' => 'POST']) !!}

			                          <input type="hidden" name="id_datosBasicos" value="{{$inscri->datosBasicos->id}}">
            						  <input type="hidden" name="id_seccion" value="{{$inscri->seccion->id}}">
            						  <input type="hidden" name="id_periodo" value="{{$inscri->periodo->id}}">


			                          <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i></button>
			                          </a>

			                      {!! Form::close() !!}
                          
                      @else
                          <button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$inscri->id_datosBasicos}}','{{$inscri->id_seccion}}','{{$key->id_periodo}}' )" data-target="#myModal" class="btn btn-warning btn-flat" ><i class="fa fa-pencil"></i></button>

                      @endif
								
								<!--  -->



							</td>
						</tr>
				@endforeach
			</tbody>
		</table>


	</div>
</div>