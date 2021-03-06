@extends('layouts.app')

@section('htmlheader_title')
  Usuarios
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Horarios')
        <small>Crear</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios </a></li>
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
                    <td><strong>Asignatura: </strong>
                  <select name="id_asignatura" class="form-control" id="id_asignatura">
                    @foreach($asignaturas as $asig)
                       @if ($asig->id_curso==$secciones->id_curso)
                          <option value="{{$asig->id}}">{{$asig->asignatura}}</option>
                      @endif
                    @endforeach
                    </select></td>
                    <td><strong>Bloque: </strong>
                    <?php 
                    switch($secciones->curso->id){
                      
                      case ($secciones->curso->id <= 4):
                        ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ 

                            if ($b->id != 2 && $b->id != 9 && $b->id != 16 && $b->id != 23 && $b->id != 30) {
                              
                                                        ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php } 
                      }

                      ?> 
                          </select>
                      <?php
                      break;

                      case ($secciones->curso->id >= 5 && $secciones->curso->id <=7):
                        ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ 
                              if(($b->id >=1 && $b->id <=7) || ($b->id >=17 && $b->id <=23) || ($b->id >=33 && $b->id <=39) || ($b->id >=49 && $b->id <=55) || ($b->id >=65 && $b->id <=71)){

                                if ($b->id != 3 && $b->id != 19 && $b->id != 35 && $b->id != 51 && $b->id != 67) {
                            ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php }//fin del if
                           }}//fin del for ?> 
                          </select>
                      <?php
                      break;

                      case ($secciones->curso->id > 7):
                          ?>
                          <select name="id_bloque" class="form-control"><?php
                          foreach($bloques3 as $b){ 
                              if(($b->id >=8 && $b->id <=16) || ($b->id >=24 && $b->id <=32) || ($b->id >=40 && $b->id <=48) || ($b->id >=56 && $b->id <=64) || ($b->id >=72 && $b->id <=80)){

                                if ($b->id != 12 && $b->id != 28 && $b->id != 44 && $b->id != 60 && $b->id != 76) {

                            ?>
                              <option value="<?php echo $b->id; ?>"><?php echo $b->bloque." - ".$b->dia->dia; ?></option>
                      <?php } }//fin del if
                           }//fin del for ?> 
                          </select>
                      <?php
                      break;
                    
                    }
                      ?>
                    </td>
                    <td><strong>Nro. Bloques: </strong>
                      <div class="form-group">
                        {!! Form::select('n_bloques',['1' => '1','2' => '2', '3' => '3', '4' => '4'],['placeholder' => 'Seleccione el múmero de bloques'],['class' => 'form-control','required' => 'required', 'title' => 'Seleccione el Curso','id' => 'n_bloques']) !!}
                      </div>
                    </td>
                    <td><strong>Aula: </strong>
                      <select name="id_aula" class="form-control">
                        @foreach($aulas as $key)
                          <option value="{{$key->id}}">{{$key->nombre}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col-md-5">
                          <input type="submit" class="btn btn-primary" name="agregar" value="Agregar">
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              {!! Form::close() !!} 
              </div>
              
<section class="content spark-screen ">
<div class="box box-warning direct-chat direct-chat-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Número de bloques asignados</h3>

        <div class="box-tools pull-right">
                    
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
        </div>
    </div>
                <!-- /.box-header -->
    <div class="box-body">
      <!-- Conversations are loaded here -->
      
        <div class="col-xs-8">
          <div class="form-group">
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Asignatura</th>
                  <th>Bloques permitidos</th>
                </tr>
              </thead>
              <tbody>
                @foreach($asignaturas as $asigna_b)
                  @if ($asigna_b->id_curso==$secciones->id_curso)
                    <tr>
                      
                        <td>{{$asigna_b->asignatura}}</td>
                        <td>{{$asigna_b->n_bloques}}</td>
                       
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        <div class="form-group">
            
            
        </div>
      </div>
    
    </div>
    <!-- /.box-body -->
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
                @if($secciones->curso->id<=7)
                  <?php $fin=7; ?>
                @else
                  <?php $fin=9; ?>
                @endif
                 @for ($i=0; $i < $fin; $i++) 
                 <tr>
                    @for ($j=0; $j < 6; $j++)  
                      @if($j==0)
                        <td align="center" style="border-radius: 8px; background-color: {{$colores[$i][$j]}}"><strong>{{$bloquesx[$i][$j]}}</strong></td>
                      @else
                        <td align="center" style="border-radius: 8px; background-color: {{$colores[$i][$j]}}">
                        <strong>
                      @if($bloquesx[$i][$j]!="LIBRE" && $bloquesx[$i][$j]!="RECESO")
                        <div style="width: 100%; height: 5px; padding-left: 0px; padding-top: 0px;">{{$bloquesx[$i][$j]}}-A:{{$aula[$i][$j]}}</div>
                        <div style="padding-right: 0px; padding-left: 150px; padding-top: 0px;">
                        <a href="#"><button style="width: 5em important!;height: 5em important!; border-radius: 6px; size: 5px;" data-toggle="modal" data-target="#myModal" onclick="destruir('{{$id_horarios[$i][$j]}}','{{$secciones->id}}')" class="close"><i class="fa fa-times"></i></button></a></div>
                      @else
                        {{$bloquesx[$i][$j]}}
                      @endif</strong></td>
                      @endif
                    @endfor
                  </tr> 
                @endfor
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
</section>



  <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Bloque</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este bloque en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.horarios.destruir'], 'method' => 'POST']) !!}
                        <input type="hidden" id="id_horario" name="id_horario">
                        <input type="hidden" id="id_seccion" name="id_seccion">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div><!-- /.content-wrapper -->
@endsection

@section('scripts')

<script type="text/javascript">
  function destruir(id_horario, id_seccion) {
    $('#id_horario').val(id_horario);
    $('#id_seccion').val(id_seccion);
  }
</script>


<script type="text/javascript">
  $("#id_asignatura").on("change", function (event) {
    var id = event.target.value;

    $.get("/admin/horarios/"+id+"/buscar",function (data) {
       
        $("#n_bloques").empty();
        $("#n_bloques").append('<option value="" selected disabled> Seleccione el número de bloques</option>');
        $("#n_bloques").append('<option value="1">1</option>');
        // $("#n_bloques").append('<option value="2">2</option>');
        // $("#n_bloques").append('<option value="3">3</option>');
        // $("#n_bloques").append('<option value="4">4</option>');

        if(data.length > 0){

            for (var i = 0; i < data.length ; i++)
            {

                $("#n_bloques").removeAttr('disabled');
                $("#n_bloques").append('<option value="'+ data.n_bloques + '">' + data.n_bloques +'</option>');
                if (data.n_bloques == 1) {

                // }elseif (data.n_bloques == 2) {

                // }elseif (data.n_bloques == 3){

                // }else{

                // }
            }
            
        }else{
            // alert('Sin resultados');
            $("#n_bloques").attr('disabled', false);

        }
    });
});
//   $("#id_personal").on("change", function (event) {
//     var id = event.target.value;

//     $.get("/admin/personales/"+id+"/buscar",function (data) {
       
      
//        $("#id_curso").empty();
//        $("#id_curso").append('<option value="" selected disabled> Seleccione el Curso</option>');
//         var contar=0;
//         if(data.length > 0){

//             for (var i = 0; i < data.length ; i++) 
//             {  
//                 $("#id_curso").removeAttr('disabled');
//                 $("#id_curso").append('<option value="'+ data[i].id + '">' + data[i].curso +'</option>');
//                 if(data[i].id==8){
//                   contar++;
//                 }
//             }
            
//             if (contar>0) { 
//               $("#asignaturas").show(); 
//             }else{
//               $("#asignaturas").hide();
//             }
//         }else{
            
//             $("#id_curso").attr('disabled', false);

//         }
//     });
// });
</script>


@endsection
