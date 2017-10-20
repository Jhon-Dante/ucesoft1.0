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
						<a href="#" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
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
									<td>{{$octubre->monto}}</td>
									<td>{{$noviembre->monto}}</td>
									<td>{{$diciembre->monto}}</td>
									<td>{{$enero->monto}}</td>
									<td>{{$febrero->monto}}</td>
									<td>{{$marzo->monto}}</td>
									<td>{{$abril->monto}}</td>
									<td>{{$mayo->monto}}</td>
									<td>{{$junio->monto}}</td>
									<td>{{$julio->monto}}</td>
									<td>{{$agosto->monto}}</td>
									<td>{{$septiembre->monto}}</td>
									
								</tr>
							</tbody>
			  			</table>
			  		</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div><!-- /.content-wrapper -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Eliminar Cargo</h4>
				</div>
				<div class="modal-body">
					¿Esta seguro que desea eliminar este cargo en especifico?...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

					{!! Form::open(['route' => ['admin.cargos.destroy',1033], 'method' => 'DELETE']) !!}
						<input type="hidden" id="cargo" name="id">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

   <script type="text/javascript">

		function cargos(cargo){

			$('#cargo').val(cargo);
		}

	</script>

@endsection
