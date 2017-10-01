@extends('layouts.app')

@section('htmlheader_title', 'Horarios')

@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Horarios')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios</a></li>
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
							<div class="panel-heading">Registro de Horario
 				@include('flash::message')
							</div>

								
							<div class="panel-body">
					              
					            
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/horarios')}}"><i class="fa fa-times"></i> Cancelar</a>
							</div>
						</div>
					</div>
				</div>
			
		</section>
</div><!-- /.content-wrapper -->
@endsection
