@extends('layouts.app')

@section('htmlheader_title')
  Preescolar
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Preescolar')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Preescolar</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista del estudiante de preescolar registrado

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-success" >Momento 3</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-primary" >Momento 2</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-warning" >Momento 1</p>
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
            @foreach($personal->personapsecciones as $key)
                <td>{{$num=$num+1}}</td>
                <td>{{$key->secciones->curso->curso}}</td>
                <td>{{$key->secciones->seccion}}</td>
                <td>{{$key->periodos->periodo}}</td>
                <td>



                  @if($reporte1==0)
                    <a href="{{url('admin/crearmomento',['reporte' => 1,'id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                          <button data-toggle="modal" onclick="cursos({{ '{{$key->id_seccion}}','{{$key->id_periodo}}' }})" data-target="#myModal" class="btn btn-warning btn-flat" ><i class="fa fa-pencil"></i></button>
                    </a>
                  @endif
                  @if($reporte1==1 and $reporte2==0)
                    <a href="{{url('admin/crearmomento',['reporte' => 2,'id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                          <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></button>
                        </a>

                      <a href="{{url('admin/mostrarmomento',['reporte' => 1,'id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                          <button class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></button>
                      </a>
                  @endif
                  @if($reporte2==1 and $reporte3==0)
                    <a href="{{url('admin/crearmomento',['reporte' => 3,'id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                          <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>
                        </a>

                    <a href="{{url('admin/mostrarmomento',['reporte' => 2,'id_seccion' => $key->id_seccion, 'id_periodo' => $key->id_periodo])}}">
                          <button class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></button>
                      </a>
                  @endif

                  @if($reporte3==1)
                    <a href="#"><button class="btn btn-info btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-file-pdf-o"></i></button></a>


                  @endif
                  
                </td>
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
        {!! Form::open(['route' => ['admin.crearmomento']]) !!}
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          {!! Form::close() !!}

         </div>
       </div>
     </div>
   </div>
</div><!-- /.content-wrapper -->



   <script type="text/javascript">

        function cursos(curso){

            $('#curso').val(curso);
        }
@endsection
