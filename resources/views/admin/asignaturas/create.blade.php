@extends('layouts.app')

@section('htmlheader_title')
	Asignaturas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Asignaturas')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Asignaturas</a></li>
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
								<div class="panel-heading">Registro de asignatura</div>

								<div class="panel-body">
									{!! Form::open(['route' => ['admin.asignaturas.store'], 'method' => 'post']) !!}
	                
						                 @include('admin.asignaturas.partials.create-fields')
						                <div class="box-footer">
						                <button type="submit" class="btn btn-primary">Enviar</button>
						                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/asignaturas')}}"><i class="fa fa-times"></i> Cancelar</a>
						              </div>
						            {!! Form::close() !!} 
	          							<!-- /.form-group -->
								</div>
						</div>
				</div>
	</div>
			
</section>
</div><!-- /.content-wrapper -->
@endsection
