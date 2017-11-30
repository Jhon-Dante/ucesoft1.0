@extends('layouts.app')

@section('htmlheader_title')
	Montos de los Pagos de Matrícula Escolar
@endsection
@section('content-wrapper')

<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Cursos')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Pagos</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
	@include('alerts.requests')

	<section class="content spark-screen">
		<div class="row">
			<div class="col-md-12">
			    @include('flash::message')
			</div>
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Registro de Monto de Pago de Matrícula Escolar <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>


						<div class="panel-body">
							{!! Form::open(['route' => ['admin.pagos_monto.store'], 'method' => 'post']) !!}
						    
						    	@include('admin.pagos_monto.partials.create-fields')
						    
							    <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/pagos_monto')}}"><i class="fa fa-times"></i> Cancelar</a>
					           	</div>

				            {!! Form::close() !!} 
		      					
						</div>
					</div>
				</div>
		</div>
	</section>
</div>

@endsection
