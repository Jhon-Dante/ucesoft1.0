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
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
      <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
            </div>
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Horarios registrados

                <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                              <a href="{{ url('admin/horarios/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                              <i class="fa fa-pencil"></i> Crear   
                              </a>
                      </div>

              </div>
             
              <div class="panel-body">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Código</th>
                  <th>Turno</th>
                  <th>Curso</th>
                  <th>Sección</th>
                  <th>Período</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                
              </table>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div><!-- /.content-wrapper -->
@endsection
