@extends('layouts.app')

@section('htmlheader_title')
	Montos de pagos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		@yield('contentheader_title', 'Montos de pagos')
		<small></small>
	</h1>
	<div class="col-md-12">
			<!-- mensaje flash -->
	</div>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Montos de pagos</a></li>
		<li class="active">Lista</li>
	</ol>
</section>
<!-- Main content -->

<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Montos de pagos registrados

					<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
						<a href="{{ url('admin/pagos_monto/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
							<i class="fa fa-pencil"></i> Registrar monto de pago  
						</a>
					</div>

				</div>
			  
			    <div class="col-xs-12">
					@include('flash::message')
			    </div>

				<div class="panel-body">
					<div class="box-body">
						
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								  
								  	@foreach($meses as $mes)
				                        @if($mes->id>=9 and $mes->id<=12)
				                          <th>{{str_limit($mes->mes,3)}}</th>
				                        @endif
				                      @endforeach
				                      @foreach($meses as $mes)
				                        @if($mes->id>=1 and $mes->id<=8)
				                          <th>{{str_limit($mes->mes,3)}}</th>
				                        @endif
                      				@endforeach

								</tr>
							</thead>
							<tbody>

								<tr>

									<td>
									@if($inicio==$anio_actual and $mes_actual<10)
									<a href="#"><button onclick="cambiar({{$septiembre->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$septiembre->monto}}</button></a>
									@else
										{{$septiembre->monto}}
									@endif
									</td>
									<td>
									@if($inicio==$anio_actual and $mes_actual<10)
									<a href="#"><button onclick="cambiar({{$octubre->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$octubre->monto}}</button></a>
									@else

										{{$octubre->monto}}
									@endif

									</td>
									<td>
									@if($inicio==$anio_actual and $mes_actual<11)
									<a href="#"><button onclick="cambiar({{$noviembre->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$noviembre->monto}}</button></a>
									@else
										{{$noviembre->monto}}
									@endif</td>
									<td>
									@if($inicio==$anio_actual and $mes_actual<12)
									<a href="#"><button onclick="cambiar({{$diciembre->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$diciembre->monto}}</button></a>
									@else
										{{$diciembre->monto}}
									@endif
									</td>
									<td>
									@if($inicio==$anio_actual and $mes_actual>1)
									<a href="#"><button onclick="cambiar({{$enero->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$enero->monto}}</button></a>
									@else
										{{$enero->monto}}
									@endif
									</td>
									<td>@if($inicio==$anio_actual and $mes_actual>2)
									<a href="#"><button onclick="cambiar({{$febrero->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$febrero->monto}}</button></a>
									@else
										{{$febrero->monto}}
									@endif</td>
									<td>@if($inicio==$anio_actual and $mes_actual>3)
									<a href="#"><button onclick="cambiar({{$marzo->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$marzo->monto}}</button></a>
									@else
										{{$marzo->monto}}
									@endif</td>
									<td>@if($inicio==$anio_actual and $mes_actual>4)
									<a href="#"><button onclick="cambiar({{$abril->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$abril->monto}}</button></a>
									@else
										{{$abril->monto}}
									@endif</td>
									<td>@if($inicio==$anio_actual and $mes_actual>5)
									<a href="#"><button onclick="cambiar({{$mayo->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$mayo->monto}}</button></a>
									@else
										{{$mayo->monto}}
									@endif</td>
									<td>@if($inicio==$anio_actual and $mes_actual>6)
									<a href="#"><button onclick="cambiar({{$junio->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$junio->monto}}</button></a>
									@else
										{{$junio->monto}}
									@endif</td>
									<td>@if($inicio==$anio_actual and $mes_actual>7)
									<a href="#"><button onclick="cambiar({{$julio->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$julio->monto}}</button></a>
									@else
										{{$julio->monto}}
									@endif</td>
									<td>

									@if($inicio==$anio_actual and $mes_actual>8)
									<a href="#"><button onclick="cambiar({{$agosto->id}},'Enero')"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede cambiar el monto de este Mes" >{{$agosto->monto}}</button></a>
									@else
										{{$agosto->monto}}
									@endif</td>
									
								</tr>
							</tbody>
			  			</table>
			  		</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cambiar el Monto desde el mes de <strong><p id="mes"></p></strong></h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea cambiar este monto en específico?...<br>
                    {!! Form::open(['route' => ['admin.pagos_monto.edit',0], 'method' => 'GET']) !!}
                    <div class="form-group">
                    	<label>Monto Nuevo</label>
                    	<input type="number" min="1" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required="required" name="monto_nuevo" title="Ingrese el Nuevo Monto para la matrícula en el mes seleccionado">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>


                        <input type="hidden" id="key" name="key">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  
  function cambiar(id,mes) 
  {
    $("#key").val(id);
    $("#mes").text(mes);
  }
</script>

@endsection
