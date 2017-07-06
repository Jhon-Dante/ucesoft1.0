@extends('layouts.app')

@section('htmlheader_title')
	Asignar Materias
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Asignar Materias')
        <small>Asignar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Asignar Materias</a></li>
        <li class="active">Asignar</li>
    </ol>
</section>
<!-- Main content -->
    <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Asignar materias al personal docente
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.personal_asignatura.store'], 'method' => 'post', 'name' => 'personal_asignatura', 'id' => 'personal_asignatura' ]) !!}
    
					                 @include('admin.personal_asignatura.partials.create-fields')
					                
					            <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/personal_asignatura')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          		{!! Form::close() !!} 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
