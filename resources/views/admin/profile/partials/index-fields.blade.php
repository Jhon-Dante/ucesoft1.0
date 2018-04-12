  <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" 
                  @if($usuario->foto==null)
                    src="{{asset('/img/escudo.png')}}" class="img-circle img-responsive">
                  @else
                    src="{{asset(Auth::user()->photo_route)}}" class="img-circle img-responsive">
                  @endif

                  <!-- {!! Form::open(['route' => ['admin.profile.store'], 'method' => 'post', 'enctype' =>'multipart/form-data']) !!}
                  {{ csrf_field() }}
                    <input type="file" name="foto" class="form-control">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  {!! Form::close() !!} -->
                </div>

                @if($user==2)
                  <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                    <dl>
                      <dt>DEPARTMENT:</dt>
                      <dd>Administrator</dd>
                      <dt>HIRE DATE</dt>
                      <dd>11/12/2013</dd>
                      <dt>DATE OF BIRTH</dt>
                         <dd>11/12/2013</dd>
                      <dt>GENDER</dt>
                      <dd>Male</dd>
                    </dl>
                  </div>-->
                  <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Nombre y apellido:</td>
                          <td>{{$personal->nombres}} {{$personal->apellidos}}</td>
                        </tr>
                        <tr>
                          <td>Cédula</td>
                          <td>{{$personal->nacionalidad}}.-{{$personal->cedula}}</td>
                        </tr>
                        <tr>
                          <td>Fecha de nacimiento</td>
                          <td>{{$personal->fecha_nacimiento}}</td>
                        </tr>
                     
                           <tr>
                              <!--  <tr>
                          <td>Genero</td>
                          <td>{{$personal->genero}}</td>
                        </tr> -->
                          <tr>
                          <td>Dirección</td>
                          <td>{{$personal->direccion}}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><a href="mailto:info@support.com">{{$personal->correo}}</a></td>
                        </tr>
                          <td>Números de Teléfono</td>
                          <td>{{$personal->codigo_hab}}-{{$personal->telf_hab}}(Casa)<br><br>
                              {{$personal->codigo_cel}}-{{$personal->celular}}(Celular)
                          </td>
                        </tr>
                        <tr>
                          <td>Estado Civil:</td>
                          <td>{{$personal->edo_civil}}</td>
                        </tr>
                        <tr>
                          <td>Cargo:</td>
                          <td>{{$personal->cargo->cargo}}</td>
                        </tr>
                       
                      </tbody>
                    </table>
                    
                    <button data-toggle="modal" data-target="#myModal" onclick="contraseña('{{$user}}')" class="btn btn-primary btn-flat">Editar perfil</button>
                    
                  </div>
                @else

                @endif
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingrese la contraseña</h4>
        </div>
        <div class="modal-body">
          <p>Ingrese su contraseña de usuario</p>
        
        {!! Form::open(['route' => ['admin.profile.editar'], 'method' => 'POST']) !!}
          <div class="form-group has-feedback">
            <input type="password" required="required" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          </div>
        </div>
                    <input type="hidden" name="user" id="user">
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
          {!! Form::close() !!}
        </div>
         </div>
       </div>
     </div>
   </div>

</div><!-- /.content-wrapper -->

<script type="text/javascript">

        function contraseña(user){

            $('#user').val(user);
        }
      </script>