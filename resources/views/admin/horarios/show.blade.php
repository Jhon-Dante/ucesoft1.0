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
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen ">
      <div class="row">
        <div class="col-md-12">@include('flash::message')
        </div>
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
              {!! Form::open(['route' => ['admin.horarios.store'], 'method' => 'post']) !!}
                <table class="table">
                  <tr>
                    @if($secciones->curso->id < 7)
                      <td>Turno: <strong>Mañana</strong></td>
                    @else
                      <td>Turno: <strong>Tarde</strong></td>
                    @endif
                    <td>Curso: <strong>{{$secciones->curso->curso}}</strong></td>
                    <td>Sección: <strong>{{$secciones->seccion}}</strong>
                    <input type="hidden" name="id_seccion" value="{{$secciones->id}}">
                    <input type="hidden" name="id_periodo" value="{{$periodos->id}}">
                    </td>
                    <td><strong>Número de bloques: </strong>
                    {!! Form::select('bloque',['1' => '1','2' =>'2','3' => '3','4' => '4'],null,['class' => 'form-control']) !!}</td>
                    <td><strong>Bloque: </strong>
                    <?php 
                    switch($secciones->curso->id){
                      
                      case ($secciones->curso->id <= 4):
                        ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php } ?> 
                          </select>
                      <?php
                      break;

                      case ($secciones->curso->id >= 5 && $secciones->curso->id <=7):
                        ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ 
                              if(($b->id >=1 && $b->id <=7) || ($b->id >=17 && $b->id <=23) || ($b->id >=33 && $b->id <=39) || ($b->id >=49 && $b->id <=55) || ($b->id >=65 && $b->id <=71)){
                            ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php }//fin del if
                           }//fin del for ?> 
                          </select>
                      <?php
                      break;

                      case ($secciones->curso->id > 7):
                          ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ 
                              if(($b->id >=8 && $b->id <=16) || ($b->id >=24 && $b->id <=32) || ($b->id >=40 && $b->id <=48) || ($b->id >=56 && $b->id <=64) || ($b->id >=72 && $b->id <=80)){
                            ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php }//fin del if
                           }//fin del for ?> 
                          </select>
                      <?php
                      break;
                    
                    }
                      ?>
                    </td>
                    <td><strong>Asignatura: </strong>
                  <select name="id_asignatura" class="form-control" >
                    @foreach($asignaturas as $asig)
                       @if ($asig->id_curso==$secciones->id)
                          <option value="{{$asig->id}}">{{$asig->asignatura}}</option>
                      @endif
                    @endforeach
                    </select>
                    </td>
                    <td><strong>Aula: </strong>
                      <select name="id_aula" class="form-control">
                        @foreach($aulas as $aula)
                          <option value="{{$aula->id}}">{{$aula->nombre}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td><input type="submit" class="btn btn-primary" name="agregar" value="Agregar"></td>
                  </tr>
                </table>
              {!! Form::close() !!} 
              </div>
              



<section class="content spark-screen ">
      <div class="row">
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <table class="table table-striped">
                <thead>
                <tr align="center">
                  <th>Hora</th>
                  @foreach($dias as $dia)
                  <th>{{$dia->dia}}</th>
                  @endforeach
                </tr>
                 @foreach($horarios as $horario)

                    <tr align="center">
                   
                    	<td>{{$horario->bloque->bloque}}</td> 

                        @if($horario->bloque->dia->id == 1)
                          @if($horario->id_asignatura>0)
                            <td style="background-color:#61FF69; border-radius: 30px">{{$horario->asignatura->asignatura}} - {{$horario->aula->nombre}}<a href="{{ route('admin.horarios.destroy', [$horario->id]) }}"><button class="btn btn-danger btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-times"></i></button></a></td>
                          @endif
                        @endif

                        @if($horario->bloque->dia->id == 2)
                          @if($horario->id_asignatura>0)
                            <td style="background-color:#61FF69; border-radius: 30px">{{$horario->asignatura->asignatura}} - {{$horario->aula->nombre}}<a href="{{ route('admin.horarios.destroy', [$horario->id]) }}"><button class="btn btn-danger btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-times"></i></button></a></td>
                          @endif
                        @endif

                        @if($horario->bloque->dia->id == 3)
                          @if($horario->id_asignatura>0)
                            <td style="background-color:#61FF69; border-radius: 30px">{{$horario->asignatura->asignatura}} - {{$horario->aula->nombre}}<a href="{{ route('admin.horarios.destroy', [$horario->id]) }}"><button class="btn btn-danger btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-times"></i></button></a></td>
                          @endif
                        @endif

                        @if($horario->bloque->dia->id == 4)
                          @if($horario->id_asignatura>0)
                            <td style="background-color:#61FF69; border-radius: 30px">{{$horario->asignatura->asignatura}} - {{$horario->aula->nombre}}<a href="{{ route('admin.horarios.destroy', [$horario->id]) }}"><button class="btn btn-danger btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-times"></i></button></a></td>
                          @endif
                        @endif

                        @if($horario->bloque->dia->id == 5)
                          @if($horario->id_asignatura>0)
                            <td style="background-color:#61FF69; border-radius: 30px">{{$horario->asignatura->asignatura}} - {{$horario->aula->nombre}}<a href="{{ route('admin.horarios.destroy', [$horario->id]) }}"><button class="btn btn-danger btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-times"></i></button></a></td>
                          @endif
                      @endif
                    </tr> 
                @endforeach
                </thead>
                <tbody>
                </tbody>
                
              </table>
               <div class="box-footer">
               
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/horarios')}}"><i class="fa fa-times"></i> Cancelar</a>
					              
            </div>
          </div>
        </div>
      
    </section>
  </section>
</div><!-- /.content-wrapper -->
@endsection
