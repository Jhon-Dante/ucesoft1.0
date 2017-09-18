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
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios - Mañana</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Horarios registrados en el período: <strong>{{$periodos->periodo}}</strong>
              
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
        
                   @foreach($secciones as $seccion)
                    
                       <tr>
                        <td>{{$num=$num+1}}</td>
                        <td>{{$seccion->curso->curso}}</td>
                        <td>{{$seccion->seccion}}</td>
                        <td>{{$periodos->periodo}}</td>
                        <td>

                          
                            <a href="{{ url('admin/crearhorario',['id_seccion' => $seccion->id,'id_periodo' => $periodos->id]) }}"><button  class="btn btn-primary btn-flat" ><i class="fa fa-pencil"></i> Crear</button></a>
                            
                            <div class="btn-group">
                              <button type="submit" class="btn btn-danger btn-flat" >
                              <i class="fa fa-file-pdf-o"></i> PDF   
                              </button> 
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






<script type="text/javascript">
  
  function crear(id_seccion,id_periodo)
  {
    var inputElement = document.createElement('input');
    $('#id_seccion').val(id_seccion);
    $('#id_periodo').val(id_periodo);
  }
</script>

@endsection
