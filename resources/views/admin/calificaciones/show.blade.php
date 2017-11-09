@extends('layouts.app')

@section('htmlheader_title')
	Secciones
@endsection


@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Secciones')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Secciones</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->

       <section class="content">
			<div class="container spark-screen">
				<div class="row">
					
					<div class="text-success" id='result'>
					    @if(Session::has('message'))
					        {{Session::get('message')}}
					    @endif
					</div>
		            
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro de Sección
 				
							</div>

							

							<div class="panel-body">
								{!! Form::open(['route' => ['admin.calificaciones.store'], 'method' => 'post','id' => 'form']) !!}
                
					                 @include('admin.calificaciones.partials.show-fields')
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/secciones')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
					            {!! Form::close() !!} 
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection

