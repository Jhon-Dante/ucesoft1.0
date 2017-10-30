<div class="panel-body">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Materia Repitiente</th>
                  <th>Curso</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($pendientes as $p)
                @foreach($inscripcion as $key)
                  @if($p->id_datosBasicos == $key->id_datosBasicos)
                    <tr>
                      <td>{{$p->datosBasicos->nombres}}</td>
                      <td>{{$p->datosBasicos->apellidos}}</td>
                      <td>{{$p->datosBasicos->cedula}}</td>
                      <td>{{$p->asignatura->asignatura}}</td>
                      <td>{{$p->datosBasicos->nombres}}</td>
                      <td>{{$p->datosBasicos->lapsos}}</td>
                      <td>{{$p->datosBasicos->inasistencias}}</td>
                      <td>{{$p->datosBasicos->calificacion}}</td>

                      
                    </tr>
                    @endif
                @endforeach
              @endforeach
              
              </tbody>    
            </table>
          </div>
        </div>