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
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Mensualidades registrados
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
                      @foreach($meses as $mes)
                        <th>{{$mes->mes}}</th>
                      @endforeach
                      <th>Período</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @for($i=0;$i<count($estudiantes);$i++)
                      <tr>

                        <td>{{ $num=$num+1 }}</td>
                        <td>{{$mensualidades[$i]->datoBasico->nombres}}</td>

                        @foreach($meses as $mes)
                        
                          @foreach($mensualidades as $mensu)
                          @if($mes->id == $mensu->id_mes)
                            @if($mensu->estado=="Cancelado")
                            <td align="center"><img src="../img/iconos/bien.png" style="border-radius: 50px; width: 30px; height: 30px"></td>

                            @else
                          <td align="center"><a href="#" id="Enero" data-toggle="modal" onclick="pagar('{{$mensu->id}}','{{$mensu->datoBasico->nombres}}','{{$mensu->periodo->periodo}}','{{$mensu->mes->mes}}','{{$mensu->id_mes}}')" data-target="#myModal2"><img src="../img/iconos/mal.png" style="border-radius: 50px; width: 30px; height: 30px"></a></td>
                          
                            @endif

                          @endif
                          
                          @endforeach
                        @endforeach
                       <td>{{$mensu->periodo->periodo}}</td>
                          
                       
                    
                      
                     </tr>
                    @endfor
                    
              </tbody> 
            </table>
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

                    <p>¿Cancelar mes del estudiante?</p>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_mes" id="id_mes">
                    
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
</div><!-- /.content-wrapper -->




<script type="text/javascript">
  
  function pagar(id,nombre,periodo,mes,id_mes)
  {
    var inputElement = document.createElement('input');
    $('#id').val(id);
    $('#nombre').text(nombre);
    $('#periodo').text(periodo);
    $('#mes').text(mes);
    $('#id_mes').val(id_mes);
  }
</script>
@endsection
