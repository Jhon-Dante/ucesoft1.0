@extends('layouts.app')

@section('htmlheader_title', 'Personal')

@section('content-wrapper')

<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small>Asignar tipo de personal</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal </a></li>
        <li class="active">Asignar tipo de personal</li>
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
						<div class="panel-heading">Asignar tipo de personal</div>

						<div class="panel-body">
							{!! Form::open(['route' => ['admin.tipo_personal.store'], 'method' => 'post']) !!}
						    
						    	@include('admin.tipo_personal.partials.create-fields')
						    
							    <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/tipo_personal')}}"><i class="fa fa-times"></i> Cancelar</a>
					           	</div>

				            {!! Form::close() !!} 
		      					
						</div>
					</div>
				</div>
		</div>
	</section>
</div>

@endsection
