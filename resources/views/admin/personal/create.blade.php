@extends('layouts.app')

@section('htmlheader_title')
	Personal
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
@include('alerts.requests')
<!-- Main content -->
    <section class="content spark-screen">
			<div class="row">
			<div class="col-md-12">
	         @include('flash::message')
	    </div>
					<div class="col-xs-12">
					@include('flash::message')
						<div class="panel panel-default">
							<div class="panel-heading">Registro del personal  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.
 				
							</div>

							<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.personal.store'], 'method' => 'post', 'name' => 'personal', 'id' => 'personal' ]) !!}
    
					                 @include('admin.personal.partials.create-fields')
					                
					            <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/personal')}}"><i class="fa fa-times"></i> Cancelar</a>
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
