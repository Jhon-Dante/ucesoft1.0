@extends('layouts.app')

@section('htmlheader_title')
	Cursos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Cursos')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cursos</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro de Curso</div>

							<div class="panel-body">
								
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection
