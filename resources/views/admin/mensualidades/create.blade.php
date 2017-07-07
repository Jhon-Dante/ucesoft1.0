@extends('layouts.app')

@section('htmlheader_title')
	Mensualidades
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Mensualidades')
        <small>Pago</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mensualidades</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
{!! Form::open(['route' => ['admin.mensualidades.index'], 'method' => 'post', 'name' => 'inscripcion', 'id' => 'inscripcion' ]) !!}
        <section class="content spark-screen">
			<div class="row">
			<div class="col-md-12">
	         @include('flash::message')
	    </div>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">Pagar mes:Junio
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                
					                 @include('admin.mensualidades.partials.create-fields')
					            
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/mensualidades')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
					          
          							<!-- /.form-group -->
							</div>
					                
					            
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			
		</section>

		{!! Form::close() !!} 
</div><!-- /.content-wrapper -->
@endsection
