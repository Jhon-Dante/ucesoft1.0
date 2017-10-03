@extends('layouts.app')

@section('htmlheader_title')
  Básica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Básica')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Básica</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista del estudiante de Básica registrados

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-success" >Lapso 3</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-primary" >Lapso 2</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-warning" >Lapso 1</p>
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
                
                <th>Curso</th>
                <th>Sección</th>
                <th>Período</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach($secciones as $s)
              @if($s->curso->id >= 2 AND $s->curso->id <= 7)

                  <tr>
                    
                     <td><a href="#">{{$num=$num+1}}</a></td>
                    
                     <td><a href="#">{{$s->curso->curso}}</a></td>
                     <td><a href="#">{{$s->seccion}}</a></td>
                     <td><a href="#">{{$periodo->periodo}}</a></td>
                     <td>
                      <div class="btn-group">
                        
                                <a href="{{url('admin/crearlapso',['id_seccion' => $s->id, 'id_periodo' => $periodo->id])}}"> <button class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i></button></a>
                              
                            
                       
                            
                          <br><br>
                      </div>
                     </td>
                      
                    </tr>
                  @endif
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
