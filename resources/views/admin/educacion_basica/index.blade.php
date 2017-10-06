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
            @foreach($personal as $perso)
                  <?php $cont=0; ?>
                  @foreach($perso->asignacion_a as $key)
                  
                    @if($perso->id_cargo==4)
                    @if($cont==0)
                    <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$key->cursos->curso}}</td>
                    <td>
                    @foreach($key->cursos->seccion as $key2)

                        @if($key2->id==$key->pivot->id_seccion)
                        {{$key2->seccion}}
                        @endif
                        
                    
                    

                    @endforeach
                    </td>

                    <td>{{$periodo->periodo}}</td>
                    @foreach($key->cursos->seccion as $key2)
                    
                        @if($key2->id==$key->pivot->id_seccion)
                            <td><a href="{{url('admin/crearlapso',['id_seccion' => $key->pivot->id_seccion,  'id_periodo' => $periodo->id ])}}"> <button class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i></button></a>
                             </td>  
                  @endif
                    @endforeach
                  </tr>
                  @endif
                  <?php $cont++; ?>
                  @endif

                 @endforeach 
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
