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
                
                  <?php $cont=0; ?>
                  @foreach($personal->asignacion_a as $key)
                    @if($personal->id_cargo==4)
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
                          @foreach($key->cursos->seccion as  $key2)
                            @if($key2->id == $key->pivot->id_seccion)

                            <td>
                              @if($lapso1==0)


                                  <button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$key->pivot->id_seccion}}','{{$periodo->id}}' )" class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i></button>

                              @elseif($lapso1==1 and $lapso2==0)

                                  <button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$key->pivot->id_seccion}}','{{$periodo->id}}' )" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></button>

                                  <a href="{{route ('admin.mostrarlapso_basica',['id_seccion' => $key->pivot->id_seccion, 'id_periodo' => $periodo->id ])}}"><button class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></button></a>

                              @elseif($lapso2==1 and $lapso3==0)

                                  <button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$key->pivot->id_seccion}}','{{$periodo->id}}' )" class="btn btn-success btn-flat"><i class="fa fa-pencil"></i></button>

                                  <a href="{{route ('admin.mostrarlapso_basica',['id_seccion' => $key->pivot->id_seccion, 'id_periodo' => $periodo->id ])}}"><button class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>

                              @else

                                  <a href="{{route ('admin.mostrarlapso_basica',['id_seccion' => $key->pivot->id_seccion, 'id_periodo' => $periodo->id ])}}"><button class="btn btn-info btn-flat"><i class="fa fa-eye"></i></button></a>
                                  
                              @endif
                            </td>

                            @endif

                        @endforeach
                      @endif
                      <?php $cont++; ?>
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingrese la contraseña</h4>
        </div>
        <div class="modal-body">
          <p>Ingrese la contraseña del profesor asignado a la sección</p>
        
        {!! Form::open(['route' => ['admin.crearlapso_basica'], 'method' => 'POST']) !!}
          <div class="form-group has-feedback">
            <input type="password" required="required" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <input type="hidden" name="id_seccion" id="id_seccion">
            <input type="hidden" name="id_periodo" id="id_periodo">
          {!! Form::close() !!}
        </div>
         </div>
       </div>
     </div>
   </div>

</div><!-- /.content-wrapper -->




@endsection
<script type="text/javascript">

        function contraseña(id_seccion,id_periodo){

            $('#id_seccion').val(id_seccion);
            $('#id_periodo').val(id_periodo);
        }
      </script>