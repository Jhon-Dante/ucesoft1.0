@extends('layouts.app')

@section('htmlheader_title')
	Horarios
@endsection
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
{!! Form::open(['route' => ['admin.horarios.store'], 'method' => 'post', 'name' => 'horarios', 'id' => 'horarios' ]) !!}
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro del Estudiante
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                
					                 @include('admin.horarios.partials.create-fields')
					                
					            
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		

		{!! Form::close() !!} 
</div><!-- /.content-wrapper -->
@endsection