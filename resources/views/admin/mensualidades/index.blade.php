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
                      <th>Estudiante</th>
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
                      <th>Período</th>
                    </tr>
                    @foreach($mensualidades as $mensu)
                      <tr>
                        <td>{{ $num=$num+1 }}</td>
                        <td>{{$mensu->datoBasico->nombres}}</td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->id_datosBasicos]) }}"> {{$mensu->Enero}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Febrero]) }}"> {{$mensu->Febrero}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Marzo]) }}"> {{$mensu->Marzo}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Abril]) }}"> {{$mensu->Abril}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Mayo]) }}"> {{$mensu->Mayo}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Junio]) }}"> {{$mensu->Junio}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Julio]) }}"> {{$mensu->Julio}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Agosto]) }}"> {{$mensu->Agosto}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Septiembre]) }}"> {{$mensu->Septiembre}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Octubre]) }}"> {{$mensu->Octubre}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Noviembre]) }}"> {{$mensu->Noviembre}}</a></td>
                        <td><a href="{{ route('admin.mensualidades.edit', [$mensu->Diciembre]) }}"> {{$mensu->Diciembre}}</a></td>
                        <td>{{$mensu->periodo->periodo}}</td>
                        
                      </tr>
                    @endforeach
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
