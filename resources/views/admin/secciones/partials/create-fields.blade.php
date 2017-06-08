

<div class="form-group">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" />
        <div class="text-danger" id='error_nombre'>{{$errors->formulario->first('nombre')}}</div>
    </div>
    
<div class="form-group">
        <label for="email">Email: </label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}" />
        <div class="text-danger" id='error_email'>{{$errors->formulario->first('email')}}</div>
</div>
 {{csrf_field()}}

