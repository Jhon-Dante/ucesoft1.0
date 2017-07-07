@extends('layouts.app')

@section('htmlheader_title')
  Materias
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Materias')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Materias</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Materias Asignadas

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/personal_asignatura/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Asignar materias  
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
                    <th>Especialidad</th>
                    <th>Asignatura</th>
                    <th>Sección</th>
                    <th>Período</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($personal_asignatura as $pasignatura)
                  <tr>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}">{{$num=$num+1}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->personal->nombres}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->personal->apellidos}}</a></td>
                    <td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->personal->titulo}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->asignaturas->asignatura}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->secciones->seccion}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"> {{$pasigna->periodos->periodo}}</a></td>
                   
                   <!-- <div class="btn-group">
                        <a href="{{ route('admin.personal_asignatura.edit', [$pasigna->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a> -->

                        <a href="#" ><button onclick="personal_asignatura({{ $pasigna->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
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
                    <h4 class="modal-title">Eliminar Curso</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este pasigna en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal_asignatura.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="pasigna" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function personal_asignatura(pasigna){

            $('#pasigna').val(pasigna);
        }

    </script>
@endsection
