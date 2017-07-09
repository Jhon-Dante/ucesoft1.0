@extends('layouts.app')

@section('htmlheader_title')
	Calificaciones
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Calificaciones')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Calificaciones</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
	<div class="row">
    <div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Calificaciones registradas

					<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/calificaciones/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar sección  
            </a>
			    </div>

					</div>

          <div class="col-xs-12">
            @include('flash::message')
          </div>
					<div class="panel-body">
						<div class="box-body">
						  <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sección</th>
                    <th>Curso</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($calificaciones as $calificacion)
                <tr>
                  <td><a href="{{ route('admin.calificaciones.edit', [$calificacion->id]) }}">{{$num=$num+1}}</a></td>
                  <td><a href="{{ route('admin.Calificaciones.edit', [$calificacion->id]) }}">{{$calificacion->datosBasicos->nombres}}</a></td>
                  <td><a href="{{ route('admin.Calificaciones.edit', [$calificacion->id]) }}">{{$calificacion>datosBasicos->apellidos}}</a></td>
                  <td><a href="{{ route('admin.calificaciones.edit', [$calificacion->id]) }}"> {{$calificacion->seccion->seccion}}</a></td>
                  <td><a href="{{ route('admin.calificaciones.edit', [$calificacion->id]) }}"> {{$calificacion->curso->curso}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.calificaciones.edit', [$calificacion->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="#" ><button onclick="calificaciones({{ $calificacion->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
                      </div>
                  </td>
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

<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Sección</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta sección en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.calificaciones.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="calificacion" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function calificaciones(calificacion){

            $('#calificacion').val(calificacion);
        }

    </script>
@endsection
