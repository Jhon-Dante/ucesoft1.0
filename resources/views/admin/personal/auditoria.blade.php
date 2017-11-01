@extends('layouts.app')

@section('htmlheader_title')
	Auditorías
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Auditorías')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Auditorías</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de movimientos de cada uno de los usuarios

					

				</div>
        <div class="col-xs-12">
          @include('flash::message')
        </div>
				<div class="panel-body">
					<div class="box-body">
    				<table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Tipo de usuario
                  <th>Acción</th>
                  <th>Fecha - Hora</th>
                </tr>
              </thead>
              <tbody>
            	@foreach($auditoria as $key)
            		<tr>
            			<td>{{$key->user->name}}</td>
            			<td>{{$key->user->tipo_user}}</td>
            			<td>{{$key->accion}}</td>
            			<td>{{$key->created_at}}</td>
            		</tr>
            	@endforeach
              </tbody>
            </table>
          </div>
				</div>
			</div>
		</div>
	</div>
</section>

</div><!-- /.content-wrapper -->



   <script type="text/javascript">

        function cursos(curso){

            $('#curso').val(curso);
        }

    </script>
@endsection
