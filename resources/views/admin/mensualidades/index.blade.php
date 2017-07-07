@extends('layouts.app')

@section('htmlheader_title')
  Mensualidades
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Mensualidades')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mensualidades</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Mensualidades registrados
            </div>

            <div class="col-xs-12">
            @include('flash::message')
            </div>
            <div class="panel-body">
              <div class="box-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nro</th>
                      <th>Representante</th>
                      <th>Enero</th>
                      <th>Febrero</th>
                      <th>Marzo</th>
                      <th>Abril</th>
                      <th>Mayo</th>
                      <th>Junio</th>
                      <th>Julio</th>
                      <th>Agosto</th>
                      <th>Septiembre</th>
                      <th>Octubre</th>
                      <th>Noviembre</th>
                      <th>Diciembre</th>
                    </tr>
                    <tr>
                      <th>1</th>
                      <th>Carlos José</th>
                      <th><img src="/img/iconos/bien.png" width="50" height="50" /></th>
                      <th><img src="/img/iconos/bien.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/bien.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/bien.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/bien.png"  width="50" height="50" /></th>
                      <th><a href="{{ url('admin/mensualidades/create') }}"><img src="/img/iconos/mal.png"  width="50" height="50" /></a></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
                      <th><img src="/img/iconos/mal.png"  width="50" height="50" /></th>
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
</section>
</div><!-- /.content-wrapper -->
@endsection
