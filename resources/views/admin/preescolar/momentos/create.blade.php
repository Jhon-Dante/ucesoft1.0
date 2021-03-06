@extends('layouts.app')

@section('htmlheader_title')
	Momentos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Momentos')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Momentos</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
    <section class="content spark-screen">
			<div class="row">
			<div class="col-md-12">
	         @include('flash::message')
	    </div>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">Registro del momento <br><strong>Período: 2017-2018</strong>
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                
					                 @include('admin.docente_preescolar.momentos.partials.create-fields')
					                
					            <div class="box-footer">
					                <a class="btn btn-primary" href="{{ url('admin/docente_preescolar/momentos')}}">  Enviar</a>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/docente_preescolar/momentos')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->

							</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
