@extends('layouts.app')

@section('htmlheader_title')
  Docentes Guías
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Docentes Guías')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Docentes Guías</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Docentes Guías

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/guias') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Asignar Docente Guía  
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
                    <th>Curso</th>
                    <th>Sección</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($guias as $guia)
                  
                  <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$guia->personal->nombres}}</td>
                    <td>{{$guia->personal->apellidos}}</td>
                    <td>{{$guia->secciones->curso->curso}}</td>
                    <td>{{$guia->secciones->seccion}}</td>
                    <td> <a href="{{ route('admin.personal_asignatura.editar_guia', [$guia->id]) }}"><button class="btn btn-info btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

					<button onclick="eliminar({{ $guia->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button>
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
                    <h4 class="modal-title">Eliminar Curso</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este perso en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal_asignatura.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="perso" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function personal_asignatura(perso){

            $('#perso').val(perso);
        }

    </script>
@endsection
