@extends('layouts.app')

@section('htmlheader_title')
	Inicio
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Escritorio')
        <small></small>
    </h1>
    <ol class="breadcrumb">
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Inicio</div>

							<div class="panel-body">
								{{ trans('adminlte_lang::message.logged') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection
