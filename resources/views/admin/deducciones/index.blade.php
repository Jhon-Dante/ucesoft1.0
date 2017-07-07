@extends('layouts.app')

@section('htmlheader_title')
  Deducciones
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Deducciones')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Deducciones</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content  spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de las Deducciones registradas

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="{{ url('admin/deducciones/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
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
                    <th>Deducción</th>
                    <th>Monto</th>
                  </tr>
                </thead>
               <tbody>
            @foreach($deducciones as $deduccion)
                <tr>
                    <td><a href="{{ route('admin.deducciones.edit', [$deduccion->id]) }}">{{$num=$num+1}}</a></td>
                    <td><a href="{{ route('admin.deducciones.edit', [$deduccion->id]) }}"> {{$deduccion->deduccion}}</a></td>
                    <td><a href="{{ route('admin.deducciones.edit', [$deduccion->id]) }}"> {{$deduccion->monto}}</a></td>
                    
                    <td>
                    <div class="btn-group">
                        <a href="{{ route('admin.deducciones.edit', [$deduccion->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                        <a href="{{ route('admin.deducciones.destroy', [$deduccion->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                        <br><br>
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
@endsection
