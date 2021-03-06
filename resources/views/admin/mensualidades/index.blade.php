@extends('layouts.app')

@section('htmlheader_title')
  Mensualidades
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Mensualidades')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mensualidades</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
@if(Auth::user()->tipo_user == 'Administrador(a)')
<section class="content">
    <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{count($mensualidades2)}}</h3>

                <p>Mensualidades sin pagar</p>
              </div>
              <div class="icon">
                <i class="fa fa-link"></i>
              </div>
              <a href=" {{ url('admin/mensualidades')         }} " class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($inscripcion)}}</h3>

              <p>Lista de estudiantes inscritos en el período</p>
            </div>
            <div class="icon">
                <i class="fa fa-link"></i>
              </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$monto}} Bs.F.</h3>

              <p>Total ganado en Bolívares</p>
            </div>
            <div class="icon">
                <i class="fa fa-link"></i>
              </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

  <hr><div class="col-xs-12">
            @include('flash::message')
            </div>
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            
            <div class="panel-heading">Lista de Mensualidades registrados <img src="../img/iconos/cancelar.png" style="border-radius: 50px; width: 26px; height: 26px"> Volver a colocar como Sin Pagar <img src="../img/iconos/editar.png" style="border-radius: 50px; width: 26px; height: 26px">Editar la Forma de Pago <img src="../img/iconos/mal.png" style="border-radius: 50px; width: 26px; height: 26px"> Pagar <img src="../img/iconos/advertencia.png" style="border-radius: 50px; width: 26px; height: 26px"> No se puede Pagar
            </div>

            
            <div class="panel-body">
              <div class="box-body">
                <div style="overflow: scroll;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>

                      <th>Nro</th>
                      <th>Estudiante</th>
                      @foreach($meses as $mes)
                        @if($mes->id>=9 && $mes->id<=12)
                          <th>{{str_limit($mes->mes,3)}}</th>
                        @endif
                      @endforeach
                      @foreach($meses as $mes)
                        @if($mes->id>=1 && $mes->id<=8)
                          <th>{{str_limit($mes->mes,3)}}</th>
                        @endif
                      @endforeach
                      
                      <th>Período</th>
                      <th>Mora</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($inscripcion as $key)
                      <tr>
                        <td>{{ $num=$num+1 }}</td>
                        <td>{{$key->datosbasicos->nombres}}</td>
                        <?php $cont=0; ?>
                        @foreach($mensualidades as $key2)
                          @if($key2->id_inscripcion==$key->id && $key->id_periodo==$id_periodo)
                            @if($key2->estado=="Cancelado")
                              <td align="center">
                                
                              <a href="#" id="cancelar" data-toggle="modal" onclick="cancelar('{{$key2->id}}','{{$key->datosbasicos->nombres}}','{{$key2->pagos->meses->mes}}','{{$key2->pagos->monto}}')" data-target="#myModal3"><img src="../img/iconos/cancelar.png" style="border-radius: 50px; width: 26px; height: 26px"></a>
                                <a href="#" id="editar" data-toggle="modal" onclick="editar('{{$key2->id}}','{{$key->datosbasicos->nombres}}','{{$key->periodo->periodo}}','{{$key2->pagos->meses->mes}}','{{$key2->pagos->id_mes}}','{{$key2->forma_pago}}','{{$key2->pagos->monto}}')" data-target="#myModal"><img src="../img/iconos/editar.png" style="border-radius: 50px; width: 26px; height: 26px"></a>
                              </td>

                            @else
                            <td align="center">
                            {{$key2->pagos->monto}}
                            @if($anio_actual==$inicio)

                                  @if($key2->pagos->id_mes>=9 && $key2->pagos->id_mes<=$id_mes)
                                  <?php $cont+=$key2->pagos->monto; ?>
                                    <a href="#" id="pagar" data-toggle="modal" onclick="pagar('{{$key2->id}}','{{$key->datosbasicos->nombres}}','{{$key->periodo->periodo}}','{{$key2->pagos->meses->mes}}','{{$key2->pagos->id_mes}}','{{$key2->pagos->monto}}')" data-target="#myModal2"><img src="../img/iconos/mal.png" style="border-radius: 50px; width: 30px; height: 30px"></a>
                                  @elseif($key2->pagos->id_mes>$id_mes && $key2->pagos->id_mes<=12)
                                    <img title="No se pueder realizar el pago de este mes por que aún no se consume" src="../img/iconos/advertencia.png" style="border-radius: 50px; width: 30px; height: 30px">{{$key2->pagos->monto}}
                                    @elseif($key2->pagos->id_mes>=1 && $key2->pagos->id_mes<=8)
                                    <img title="No se pueder realizar el pago de este mes por que aún no se consume" src="../img/iconos/advertencia.png" style="border-radius: 50px; width: 30px; height: 30px">{{$key2->pagos->monto}}
                                  @endif
                            @elseif($anio_actual==$fin)
                                  @if($key2->pagos->id_mes>=9 && $key2->pagos->id_mes<=12 && $key2->pagos->id_mes>$id_mes)
                                  <?php $cont+=$key2->pagos->monto; ?>
                                      <a href="#" id="pagar" data-toggle="modal" onclick="pagar('{{$key2->id}}','{{$key->datosbasicos->nombres}}','{{$key->periodo->periodo}}','{{$key2->pagos->meses->mes}}','{{$key2->pagos->id_mes}}','{{$key2->pagos->monto}}')" data-target="#myModal2"><img src="../img/iconos/mal.png" style="border-radius: 50px; width: 30px; height: 30px"></a>
                                  @elseif($key2->pagos->id_mes>=1 && $key2->pagos->id_mes<=$id_mes )
                                  <?php $cont+=$key2->pagos->monto; ?>
                                      <a href="#" id="pagar" data-toggle="modal" onclick="pagar('{{$key2->id}}','{{$key->datosbasicos->nombres}}','{{$key->periodo->periodo}}','{{$key2->pagos->meses->mes}}','{{$key2->pagos->id_mes}}','{{$key2->pagos->monto}}')" data-target="#myModal2"><img src="../img/iconos/mal.png" style="border-radius: 50px; width: 30px; height: 30px"></a>
                                      @elseif($key2->pagos->id_mes>$id_mes && $key2->pagos->id_mes<9)
                                            <img title="No se pueder realizar el pago de este mes por que aún no se consume" src="../img/iconos/advertencia.png" style="border-radius: 50px; width: 30px; height: 30px">
                                    
                                  @endif
                            @endif
                            </td>
                            @endif
                          @endif
                        @endforeach
                        <td>{{$key->periodo->periodo}}</td>
                        <td>{{$cont}} Bs.</td>
                     </tr>
                    @endforeach
                    
              </tbody> 
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
          <div id="myModal2"  class="modal fade" role="dialog">
            <div class="modal-dialog">
                      <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Pagar Mensualidad del mes de: <strong><p id="mes"><span></span></p></strong></h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(['route' => ['admin.mensualidades.store'], 'method' => 'POST']) !!}
                    <h4>Nombre del estudiante: </h4><strong><p id="nombre"><span></span></p></strong>
                    <h4>Periodo a pagar</h4><strong><p id="periodo"><span></span></p></strong>
                    <h4>Forma de Pago</h4>
                    <div class="form-group">
                        {!! Form::select('forma_pago',['1' => 'Efectivo','2' => 'Transferencia', '3' => 'Depósito'],null,['class' => 'form-control','required' => 'required','title' => 'Seleccione la forma de pago','id' => 'forma_pago'])  !!}
                    </div>
                    <h4>Nro Transferencia/Nro de Vaucher</h4>
                    <div class="form-group">
                        {!! Form::text('codigo_operacion',null,['class' => 'form-control', 'disabled' => 'disabled','id' => 'codigo_operacion']) !!}
                    </div>
                    <p>¿Cancelar mes del estudiante?</p>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_mes" id="id_mes">
                    <input type="hidden" name="monto" id="monto">
                    
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>

<div id="myModal"  class="modal fade" role="dialog">
            <div class="modal-dialog">
                      <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Editar Pago de Mensualidad del mes: <strong><p id="mes2"><span></span></p></strong></h4>
                  <h4>Pagó en </h4><strong><p id="forma_pago2"><span></span></p></strong>
                </div>
                <div class="modal-body">
                  {!! Form::open(['route' => ['admin.mensualidades.update', 0], 'method' => 'put']) !!}
                  <h4>Nombre del estudiante: </h4><strong><p id="nombre2"><span></span></p></strong>
                    <h4>Periodo a pagar</h4><strong><p id="periodo2"><span></span></p></strong>
                    <h4>Forma de Pago</h4>
                    <div class="form-group">
                        {!! Form::select('forma_pago',['1' => 'Efectivo','2' => 'Transferencia', '3' => 'Depósito'],null,['class' => 'form-control','required' => 'required','title' => 'Seleccione la forma de pago','id' => 'forma_pago3'])  !!}
                    </div>
                    <h4>Nro Transferencia/Nro de Vaucher</h4>
                    <div class="form-group">
                        {!! Form::text('codigo_operacion',null,['class' => 'form-control', 'disabled' => 'disabled','id' => 'codigo_operacion3']) !!}
                    </div>
                    <p>¿Editar mes del estudiante?</p>
                    <input type="hidden" name="id_mensualidad" id="id_mensualidad3">
                    
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
<div id="myModal3"  class="modal fade" role="dialog">
            <div class="modal-dialog">
                      <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Está seguro que desea Borrar el Pago de Mensualidad del mes: <strong><p id="mes3"><span></span></p></strong></h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(['route' => ['admin.mensualidades.destroy',0133], 'method' => 'DELETE']) !!}
                  <h4>Nombre del estudiante: </h4><strong><p id="nombre3"><span></span></p></strong>
                    
                    <input type="hidden" name="id_mensualidad2" id="id_mensualidad2">
                    
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
@elseif(Auth::user()->tipo_user == 'Representante')

<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            
            <div class="panel-heading">Lista de Mensualidades registrados <img src="../img/iconos/mal.png" style="border-radius: 50px; width: 26px; height: 26px"> Sin Pagar <img src="../img/iconos/bien.png" style="border-radius: 50px; width: 26px; height: 26px"> Mensualidad Cancelada
            </div>

            
            <div class="panel-body">
              <div class="box-body">
                <div style="overflow: scroll;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>

                      <th>Nro</th>
                      <th>Estudiante</th>
                      @foreach($meses as $mes)
                        @if($mes->id>=9 && $mes->id<=12)
                          <th>{{str_limit($mes->mes,3)}}</th>
                        @endif
                      @endforeach
                      @foreach($meses as $mes)
                        @if($mes->id>=1 && $mes->id<=8)
                          <th>{{str_limit($mes->mes,3)}}</th>
                        @endif
                      @endforeach
                      
                      <th>Período</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($inscripcion as $key)
                      @foreach($datosBasicos as $db)
                      
                        @if($db->id == $key->id_datosBasicos)
                          <tr>

                            <td>{{ $num=$num+1 }}</td>
                            <td>{{$key->datosBasicos->nombres}}</td>

                            @foreach($mensualidades as $key2)
                              @if($key2->id_inscripcion==$key->id && $key->id_periodo==$id_periodo )
                                @if($key2->estado=="Cancelado")
                                  <td align="center">  
                                  <img title="Mes Cancelado" src="../img/iconos/bien.png" style="border-radius: 50px; width: 30px; height: 30px">
                                  </td>
                                @else
                                <td align="center">
                                  <img title="Mes no cancelado" src="../img/iconos/mal.png" style="border-radius: 50px; width: 30px; height: 30px">
                                </td>
                                @endif
                              @endif
                            @endforeach
                            <td>{{$key->periodo->periodo}}</td>
                         </tr>
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
  </div>
</section>
@endif
</div><!-- /.content-wrapper -->

@endsection
@section('scripts')

<script type="text/javascript">
  
  function pagar(id,nombre,periodo,mes,id_mes,monto)
  {
    console.log(nombre);
    var inputElement = document.createElement('input');
    $('#id').val(id);
    $('#nombre').text(nombre);
    $('#periodo').text(periodo);
    $('#mes').text(mes+": "+monto+" Bs.");
    $('#id_mes').val(id_mes);
    $('#monto').val(monto);
  }

  function editar(id,nombre,periodo,mes,id_mes,forma_pago,monto2) {
    var inputElement = document.createElement('input');
    $('#id_mensualidad3').val(id);
    $('#nombre2').text(nombre);
    $('#periodo2').text(periodo);
    $('#mes2').text(mes+": "+monto2+" Bs.");
    $('#id_mes2').val(id_mes);

    if (forma_pago==1) {

    $('#forma_pago2').text('Efectivo');
    } else {
      if (forma_pago==2) {

    $('#forma_pago2').text('Transferencia');
      } else {

    $('#forma_pago2').text('Depósito');
      }
    }
  }

  function cancelar(id_mensualidad,nombre,mes,monto) {
    $('#id_mensualidad2').val(id_mensualidad);
    $('#mes3').text(mes);
    $('#nombre3').text(nombre);
    $('#monto').text(monto+" Bs.");

  }
</script>


<script type="text/javascript">
  $("#forma_pago").on("change", function (event) {
    var id = event.target.value;

    if (id==1) {
      $("#codigo_operacion").attr('disabled', true);
    } else {
      $("#codigo_operacion").removeAttr('disabled');
    }
});

  $("#forma_pago3").on("change", function (event) {
    var id = event.target.value;

    if (id==1) {
      $("#codigo_operacion3").attr('disabled', true);
    } else {
      $("#codigo_operacion3").removeAttr('disabled');
    }
});

  $("#editar").on("click", function(event){
      var id=event.target.value;


    $('#id_mensualidad').val(id);
    $.get("/admin/mensualidad/"+id+"/buscar",function (data) {
       
      
       $("#id_asignatura").empty();
      
        
        if(data.length > 0){

        $('#nombre2').text(data[0].nombres);
        $('#periodo2').text(data[0].periodo);
        $('#mes2').text(data[0].mes);
        if (data[0].forma_pago==1) {
          $('#forma_pago2').text('Efectivo');  
        } else {
          if (data[0].forma_pago==2) {
            $('#forma_pago2').text('Transferencia, Código de Operación: '+data[0].codigo_operacion);  
          } else {
            $('#forma_pago2').text('Depósito, Código de Operación: '+data[0].codigo_operacion);  
          }
        }
        
               
        }
    });
  });
</script>

@endsection