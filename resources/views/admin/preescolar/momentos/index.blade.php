@extends('layouts.app')

@section('htmlheader_title')
  Preescolar
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Preescolar')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Preescolar</a></li>
        <li class="active">Momentos</li>
        <li class="active">Lista</li>

    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de momentos de estudiantes de preescolar registrado

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="#" class="btn btn-danger btn-flat" style="padding: 4px 10px;">
                <i class="fa"></i>CC   
                </a>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="#" class="btn btn-warning btn-flat" style="padding: 4px 10px;">
                <i class="fa"></i> Momento 3
                </a>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="#" class="btn btn-success btn-flat" style="padding: 4px 10px;">
                <i class="fa"></i> Momento 2
                </a>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="#" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa"></i> Momento 1   
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
                <th>Período</th>
                <th>Número de Estudiantes</th>
                <th>Curso</th>
                <th>Sección</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#">1</a></td>
                <td><a href="#">2017-2018</a></td>
                <td><a href="#">5</a></td>
                <td><a href="#">Preescolar</a></td>
                <td><a href="#">U</a></td>

               <td>
                <div class="btn-group">
                    <a href=" {{ url('admin/docente_preescolar/momentos/create') }}"><button class="btn btn-primary btn-flat" title="Presionando este botón, puede registrar un nuevo momento al estudiante"><i class="glyphicon glyphicon-record"></i></button></a>

                    <a href="{{ url('admin/docente_preescolar/momentos/create') }}"><button class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede visualizar los momentos registrados del estudiante" ><i class="fa fa-eye"></i></button></a>

                    <a href="#"><button class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede visualizar el registro en PDF" ><i class="fa fa-file-pdf-o"></i></button></a>

                    <br><br>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div><!-- /.content-wrapper -->
@endsection
