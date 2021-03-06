  <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" 
                  @if($usuario->foto==null)
                    src="{{asset('/img/escudo.png')}}" class="img-circle img-responsive">
                  @else
                    src="{{asset(Auth::user()->photo_route)}}" class="img-circle img-responsive">
                  @endif

                  {!! Form::open(['route' => ['admin.profile.store'], 'method' => 'post', 'enctype' =>'multipart/form-data']) !!}
                  {{ csrf_field() }}
                    <input type="file" name="foto" class="form-control">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  {!! Form::close() !!}
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
                          <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">


(<span style="color: red;">*</span>)
  {!! Form::label('nombres','Nombres') !!}
  {!! Form::text('nombres',$personal->nombres,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
</div>
<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('apellidos','Apellidos') !!}
  {!! Form::text('apellidos',$personal->apellidos,['class' => 'form-control','placeholder' => 'Ej: Ramírez Zerpa', 'title' => 'Ingrese el primer y segundo apellido del personal']) !!}
</div>
<div class="form-group{{ $errors->has('nacio') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('nacio','Nacionalidad') !!}
  {!! Form::select('nacio', ['V', 'E'], $personal->nacio,['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('cedula','Cédula') !!}
  {!! Form::number('cedula',$personal->cedula,['class' => 'form-control','placeholder' => 'Ej: 24999000', 'title' => 'Ingrese la cedula del personal','min' => '6','maxLength' => '8','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
  {!! Form::date('fecha_nacimiento',$personal->fecha_nacimiento,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación', 'title' => 'Ingrese la fecha de nacimiento del personal']) !!}
</div>
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('edad','Edad') !!}
  {!! Form::number('edad',$personal->edad,['class' => 'form-control','placeholder' => 'Ej: 8', 'title' => 'Ingrese la edad del personal','min' => '18','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group{{ $errors->has('edo_civil') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('edo_cvil','Estado Civil') !!}
  {!! Form::select('edo_civil', ['Soltero(a)', 'Casado(a)','Concuvino(a)','Viudo(a)'],$personal->edo_civil, ['class' => 'form-control', 'title' => 'Seleccione el estado civil del personal']) !!}
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('direccion','Dirección') !!}
  {!! Form::textarea('direccion',$personal->direccion,['class' => 'form-control','placeholder' => 'Ingrese aquí la Dirección de Habitación', 'title' => 'Ingrese la dirección del personal']) !!}
</div>
<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('genero','Sexo') !!}
  {!! Form::select('genero', ['M', 'F'], $personal->genero,['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal']) !!}
</div>
<div class="form-group{{ $errors->has('codigo_hab') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('codigo_hab','codigo de habitación') !!}
  {!! Form::select('codigo_hab',['0244','0412','0414','0424','0416','0426'] ,$personal->codigp_hab, ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
</div>
<div class="form-group{{ $errors->has('telf_hab') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('telf_hab','Teléfono de habitación') !!}
  {!! Form::number('telf_hab',$personal->telf_hab,['class' => 'form-control','placeholder' => 'Ej: 04162455643', 'title' => 'Ingrese el teléfono móvil del personal', 'maxLength' => '7']) !!}
</div>
<div class="form-group{{ $errors->has('codigo_cel') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('codigo_cel','Codigo de celular') !!}
  {!! Form::select('codigo_cel',['0244','0412','0414','0424','0416','0426'] ,$personal->codigo_cel, ['class' => 'form-control', 'title' => 'Seleccione la nacionalidad del personal', 'maxlength','7']) !!}
</div>
<div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('celular','Teléfono Celular') !!}
  {!! Form::number('celular',$personal->celular,['class' => 'form-control','placeholder' => 'Ej: 6675544', 'title' => 'Ingrese el teléfono de habitación del personal', 'maxLength' => '7']) !!}
</div>
<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
(<span style="color: red;">*</span>)
  {!! Form::label('correo','Correo Electrónico') !!}
  {!! Form::email('correo',$personal->correo,['class' => 'form-control','placeholder' => 'Ej: jose_sosa@live.com', 'title' => 'Ingrese el correo del personal','maxLength' => '30']) !!}
</div>
</tbody>
</table>  
</div>
{!! Form::hidden('id',$personal->id,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
                @else

                @endif
                {!! Form::hidden('user',$user,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}
                {!! Form::hidden('usuario',$usuario->id,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','required' => 'required']) !!}

      <input type="submit" name="submit" class="btn btn-primary">
                            <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/profile')}}"><i class="fa fa-times"></i> Cancelar</a>
</div>
