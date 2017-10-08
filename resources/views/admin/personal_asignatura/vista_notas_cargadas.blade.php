@extends('layouts.app')

@section('htmlheader_title')
    Vista de Calificaciones Cargadas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Calificaciones Cargadas')
        <small>Vista</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Calificaciones</a></li>
        <li class="active">Vista</li>
    </ol>
</section>
<!-- Main content -->
    <section class="content spark-screen">
            <div class="row">
            <div class="col-md-12">
             @include('flash::message')
        </div>
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">Curso: <strong>{{$seccion->curso->curso}}</strong> - Sección: <strong>{{$seccion->seccion}}</strong></div>                       

                            <div class="panel-body">
                                
                                
                        @include('admin.personal_asignatura.partials.vista-fields')
                        
                        <div class="box-footer">
                            
                          </div>
                                    <!-- /.form-group -->
               
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>



        
</div><!-- /.content-wrapper -->
@endsection
