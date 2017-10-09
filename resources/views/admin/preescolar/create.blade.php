@extends('layouts.app')

@section('htmlheader_title')
	Preescolar
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Preescolar')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Preescolar</a></li>
        <li class="active">Juicios y sugerencias</li>
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
							<div class="panel-heading">Sección: <strong>{{$seccion->seccion}}</strong> - Periodo: <strong>{{$periodo->periodo}}</strong>
 				
							</div>

							<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.preescolar.store'], 'method' => 'post' ]) !!}
    							
					                 @include('admin.preescolar.partials.create-fields')
					                <input type="hidden" name="reporte" value="{{$reporte}}">
					                
					            <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/preescolar')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          						
          		{!! Form::close() !!} 
							</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
