@extends('layouts.app')

@section('htmlheader_title')
  Personal
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
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
              <div class="panel-heading">Lista del Personal registrado

                <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                              <a href="{{ url('admin/personal/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                              <i class="fa fa-pencil"></i> Inscribir   
                              </a>
                      </div>

              </div>
             
              <div class="panel-body">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                @foreach($personal as $perso)
                <tr>
                  <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}">{{$i}}</a></td>
                  <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso-nombre}}</a></td>
                  <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso-apellido}}</a></td>
                  <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso-cedula}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.personal.edit', [$perso->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('admin.personal.destroy', [$perso->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
                      </div>
                  </td>
                  
                </tr>
               <?php $i++; ?>
                @endforeach
                </tbody>
                
              </table></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div><!-- /.content-wrapper -->
@endsection
