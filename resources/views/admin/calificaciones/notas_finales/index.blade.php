@extends('layouts.app')

@section('htmlheader_title')
  Notas Finales
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Notas Finales')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Notas Finales</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading"><div>Lista de  estudiantes con Notas Finales 
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
                  <th>Estudiante</th>
                  <th>Curso</th>
                  <th>Sección</th>
                  <th>Periodo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
        
              @foreach($BoletinFinal as $bf)
                @foreach($inscripcion as $inscri)
                  @if($inscri->id_datosBasicos == $bf->id_datosBasicos)
                    <tr>
                      <td>{{$num=$num+1}}</td>
                      <td>{{$bf->datosBasicos->apellidos}}-{{$bf->datosBasicos->nombres}}</td>
                      <td>{{$inscri->seccion->curso->curso}}</td>
                      <td>{{$inscri->seccion->seccion}}</td>
                      <td>{{$inscri->periodo->periodo}}</td>
                      <td></td>
                    </tr>
                  @endif
                @endforeach
              @endforeach
        <!-- @foreach($secciones as $key)
          @foreach($inscripciones as $key2)
            @if($key2->id_seccion == $key->id)
              <tr>
                <td>{{$num=$num+1}}</td>
                <td>{{$key->curso->curso}}</td>
                <td>{{$key->seccion}}</td>
                <td>{{$key2->periodo->periodo}}</td>
                <td>
                  @if($key2->seccion->curso->id ==1)
                  
                    <a href="{{url('admin/mostrarmomento2',['id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                                  <button class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>

                  @elseif($key2->seccion->curso->id >=2 AND $key2->seccion->curso->id <=7)

                  @else


                  @endif


                </td>
              </tr>
            @endif
          @endforeach
        @endforeach -->
              
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
