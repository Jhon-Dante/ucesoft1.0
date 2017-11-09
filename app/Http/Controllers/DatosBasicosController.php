<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Http\Requests\DatosBasicosRequest;
use App\Padres;
use App\DatosBasicos;
use App\Representantes;
use App\Asignaturas;
use App\Recaudos;
use App\Parentesco;
use App\AsignaturasPreinscripcion;
use App\Preinscripcion;
use App\Periodos;
use App\Seccion;
use App\Cursos;
use App\Inscripcion;
use App\Mensualidades;
use App\AsignaturasPendientes;
use App\User;
use App\Calificaciones;
use App\Boletin;
use App\Pagos;
use Session;
use App\Auditoria;
class DatosBasicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $num=0;
        //$datosBasicos=DatosBasicos::all();
        $padres=Padres::all();
        $preinscripcion=Inscripcion::all();
        $pre=Preinscripcion::all();
        $datosbasicos=DatosBasicos::all();
        $periodo=Periodos::where('status','Activo')->first();
        $accion='Mostrando los datos de los estudiantes registrados';
        $this->auditoria($accion);
        return View('admin.DatosBasicos.index', compact('preinscripcion','pre','num','datosbasicos','periodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $representantes=Representantes::all();
        $padres=Padres::all();
        $datosBasicos=DatosBasicos::all();
        $id_estudiante=0;
        $periodos=Periodos::lists('periodo','id');
        $parentescos=Parentesco::where('parentesco','Padre')->where('parentesco','Madre')->get()->lists('parentesco','id');
        $parentesco=Parentesco::lists('parentesco','id');//para formulario de representante
        $asignaturas=Asignaturas::all();
        $estados=['Amazonas','Anzoátegui','Apure','Aragua','Barinas','Bolívar','Carabobo','Cojedes','Delta Amacuro','Distrito Capital','Falcón','Guárico','Lara','Mérida','Miranda','Monagas','Nueva Esparta','Portuguesa','Sucre','Táchira','Trujillo','Vargas','Yaracuy','Zulia'];
        $cursos=Cursos::lists('curso','id');
        $asignaturas2=Asignaturas::lists('asignatura','id');
                
        return View('admin.datosBasicos.create', compact('representantes','parentescos','padres','opcion','datosBasicos','id_estudiante','parentesco','asignaturas','estados','periodos','cursos','asignaturas'));
    }

    public function buscarcurso($id)
    {
        return $asignaturas3=Asignaturas::where('id_curso',$id)->get();
    }

    public function buscarEstudiante(Request $request)
    {
        //dd('asdasdasd');
            $inscripciones=Inscripcion::where('id_datosBasicos',$request->id_estudiante)->first();
            $datosBasicos2=DatosBasicos::find($request->id_estudiante);
            $asignaturas=Asignaturas::all();
            $secciones=Seccion::all();
            $periodos=Periodos::where('status','Activo')->first();
            if (count($inscripciones)!=0) {
                $inscripciones2=Inscripcion::where('id_datosBasicos',$request->id_estudiante)->where('id_periodo',$inscripciones->id_periodo-1)->get()->first();
            }
            
            //dd($inscripciones2);
            if (count($inscripciones)==0) {
                $buscamensu=0;
            } else {
                //dd($inscripciones2->id);
               //$buscamensu=Mensualidades::where('id_inscripcion',$inscripciones2->id)->where('estado','Sin pagar')->get();
                $buscamensu=0;
            }
            
            
            
            $buscaPendiente=0;
            $buscaRepite=Inscripcion::where('id_datosBasicos',$request->id_estudiante)->get()->first();
            if ($buscaRepite == null) {
                $buscaRepite == 0;
            }
            
            $buscaPendiente=Inscripcion::where('id_datosBasicos',$request->id_estudiante)->get()->first();
            if ($buscaPendiente == null) {
                $buscaPendiente == 0;
                
            }
            $buscaRepite=   Inscripcion::where('id_datosBasicos',$request->id_estudiante)->get()->first();
            $buscaPendiente=Inscripcion::where('id_datosBasicos',$request->id_estudiante)->get()->first();

            if (count($inscripciones)==0) {
                $encuentra=0;
            } else {
               $encuentra=0;
            }
            
            

            // $encuentra2=count($buscaRepite);
            // $encuentra3=count($buscaPendiente);
           
            if ($encuentra > 0) {
                flash('DISCULPE, EL ESTUDIANTE AÚN DEBE '.$encuentra.' MES(ES) DEL AÑO PASADO, DEBE ESTAR SOLVENTE PARA REGISTRAR EL ESTUDIANTE A UN NUEVO PERÍODO','danger');
                return redirect()->route('admin.DatosBasicos.create');
            }
            else
                    {

                    if (count($buscaRepite) == 0) {
                        $buscaRepite == 0;
                    }else{

                        if ($buscaRepite->repite == 'Si') {
                            flash('DISCULPE, EL ESTUDIANTE AÚN DEBE REPETIR MATERIAS DEL PERÍODO ANTERIOR, DEBE REMEDIAR LAS MATERIAS FALTANTES PARA PODER REINSCRIBIRSE EN UN NUEVO PERÍODO','danger');
                            return redirect()->route('admin.DatosBasicos.create');
                        }
                        else
                        {
                            if ($buscaPendiente->pendiente == 'Si') {
                                flash('DISCULPE, EL ESTUDIANTE AÚN DEBE MATERIAS PENDIENTES DEL PERÍODO ANTERIOR, DEBE REMEDIAR LAS MATERIAS FALTANTES PARA PODER REINSCRIBIRSE EN UN NUEVO PERÍODO','warning');
                            return redirect()->route('admin.DatosBasicos.create');
                            }
                            else
                            {                    
                                
                                 
                                    if (count($inscripciones)>0)
                                    {
                                           $id_curso_next=$inscripciones->seccion->curso->id;
                                           $curso_s=Seccion::where('id_curso', '>', $inscripciones->seccion->curso->id)->orderBy('id','asc')->get()->first();
                                        
                                    }
                                    else
                                    {
                                            $id_curso_next=0;
                                            $curso_s=0;
                                            $id_curso=0;
                                            $inscripciones=0;
                                            
                                }//Fin del else de        
                            }//Fin del else de inscripciones
                        }//Fin del else de materias 
                }//Fin del else de repite
            }//Fin del else de mensualidades
                    
                    //dd($inscripciones);
        return View('admin.DatosBasicos.reinscribir', compact('inscripciones','inscripciones2','datosBasicos2','curso_s','secciones','asignaturas','periodos'));
    }//Fin de la función buscarEstudiante

    public function reinscribir(Request $request)
    {

        $id_periodo=Session::get('periodo');
        $p=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$id_periodo)->get()->last();
        if(count($p)>0)
        {
            
            flash('ESTUDIANTE YA SE ENCUENTRA INSCRITO PARA ESTE PERIODO!', 'success');
            return redirect()->Route('admin.DatosBasicos.create')->withInput();

        }
        else
        {
            if (count($request->pendiente)>3) {
                flash('HA SELECCIONADO QUE EL ESTUDIENTE TIENE MAS DE 2 ASIGNATURAS PENDIENTES!','warning');
                return redirect()->route('admin.DatosBasicos.reinscribir')->withInput();
            }
            else
            {
                if (count($request->repite)>3) {
                   flash('HA SELECCIONADO QUE EL ESTUDIENTE TIENE MAS DE 2 ASIGNATURAS REPITIENTES!','warning');
                return redirect()->route('admin.DatosBasicos.reinscribir')->withInput();
                }else{
                    //verificando si existen montos para las mensualidades
                    $pagos=Pagos::all();
                    if (count($pagos)==0) {
                      flash('NO ES POSIBLE INSCRIBIR AL ESTUDIANTE HASTA NO ASIGNAR LOS MONTOS DE LOS PAGOS DE LAS MENSUALIDADES!','warning');
                        return redirect()->Route('admin.DatosBasicos.create')->withInput();  
                    } else {
                        

                    if(count($request->repite)>0){
                        $repite="Si";
                    }else{
                        $repite="No";
                    }
                    if (count($request->pendiente)>0) {
                        $pendiente="Si";
                    } else {
                        $pendiente="No";
                    }
                    
                        $reinscribir=Inscripcion::create([
                                                'id_datosBasicos' => $request->id_datosBasicos,
                                                'repite' => $repite,
                                                'pendiente' => $pendiente,
                                                'id_seccion' => $request->id_seccion,
                                                'id_periodo' => $id_periodo
                        ]);


                        $es=DatosBasicos::find($request->id_datosBasicos);
                        $s=Seccion::find($request->id_seccion);
                        $accion='Ha inscrito al estudiante '.$es->nombres.', '.$es->apellidos.' en la sección '.$s->seccion;
                        $this->auditoria($accion);


                    for($i=0;$i<count($request->repite);$i++){
                        $mensualidad=\DB::table('asignaturas_inscripcion')->insert(array(
                            'id_asignatura' => $request->repite[$i],
                            'id_inscripcion' => $reinscribir->id,
                            'pend_rep' => 'repite'));
                    }

                    for($i=0;$i<count($request->pendiente);$i++){
                        $mensualidad=\DB::table('asignaturas_inscripcion')->insert(array(
                            'id_asignatura' => $request->pendiente[$i],
                            'id_inscripcion' => $reinscribir->id,
                            'pend_rep' => 'pendiente'));
                    }
                                        
                    
                    $inscripcion=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$id_periodo)->get()->first();
                    //registrando mensualidades del año anterior
                    for ($i=9; $i<=12 ; $i++) { 
                         
                         $pagos=Pagos::where('id_mes',$i)->get()->last();
                        $mensualidades=Mensualidades::create([
                            'id_inscripcion' => $inscripcion->id,
                            'id_pago' => $pagos->id,
                            'estado' => 'Sin pagar',
                            'forma_pago' => 1,
                            'codigo_operacion' => '']);

                     }

                    for ($i=1; $i<=8 ; $i++) { 
                         
                         $pagos=Pagos::where('id_mes',$i)->get()->last();
                        $mensualidades=Mensualidades::create([
                            'id_inscripcion' => $inscripcion->id,
                            'id_pago' => $pagos->id,
                            'estado' => 'Sin pagar',
                            'forma_pago' => 1,
                            'codigo_operacion' => '']);

                     }


                    $eli_preinscripcion=Preinscripcion::where('id_datosBasicos',$request->id_datosBasicos)->get()->first();

                        if(count($eli_preinscripcion)>0)
                        {
                            $eli_preinscripcion->delete();


                            $seccion=Seccion::find($request->id_seccion);

                     if ($seccion->curso->id == 1) 
                     {
                       $buscaCalificaciones=Calificaciones::where('id_periodo',$request->id_periodo)->groupBy('nro_reportes')->get();
                       //dd('1',count($buscaCalificaciones));
                       if (count($buscaCalificaciones)==1){

                            $calificaciones=Calificaciones::create([
                                'nro_reportes' => 1,
                                'juicios' => 'Vacío',
                                'sugerencia' => 'Vacío',
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);
                       }elseif(count($buscaCalificaciones)==2){

                            $calificaciones=Calificaciones::create([
                                'nro_reportes' => 1,
                                'juicios' => 'Vacío',
                                'sugerencia' => 'Vacío',
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);

                            $calificaciones=Calificaciones::create([
                                'nro_reportes' => 2,
                                'juicios' => 'Vacío',
                                'sugerencia' => 'Vacío',
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);
                       }

                     }elseif($seccion->curso->id >= 1 AND $seccion->curso->id <= 7){
                        //dd('basica');
                        $inscripcion=Inscripcion::where('id_periodo',$request->id_periodo)->where('id_seccion',$request->id_seccion)->first();
                        $estu=$inscripcion->datosBasicos->id;
                        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
                        $buscaNotas=Boletin::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$estu)->groupBy('lapso')->get();

                        if (count($buscaNotas)==1){

                        for ($i=0; $i < count($asignaturas); $i++) { 
                            
                            $calificaciones=Boletin::create([
                                'id_asignatura' => $asignaturas[$i]->id,
                                'lapso' => 1,
                                'inasistencias' => 0,
                                'calificacion' => 'E',
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);  
                        }
                       }elseif(count($buscaNotas)==2){

                            for ($i=0; $i < count($asignaturas); $i++) { 
                            
                                $calificaciones=Boletin::create([
                                    'id_asignatura' => $asignaturas[$i]->id,
                                    'lapso' => 1,
                                    'inasistencias' => 0,
                                    'calificacion' => 'E',
                                    'id_datosBasicos' => $request->id_datosBasicos,
                                    'id_periodo' => $request->id_periodo
                                ]);
                           
                            }
                            for ($i=0; $i < count($asignaturas); $i++) { 
                            
                            $calificaciones=Boletin::create([
                                'id_asignatura' => $asignaturas[$i]->id,
                                'lapso' => 2,
                                'inasistencias' => 0,
                                'calificacion' => 'E',
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);
                           
                            }

                        }

                     }elseif($seccion->curso->id > 7){
                        //dd('media');
                        $inscripcion=Inscripcion::where('id_periodo',$request->id_periodo)->where('id_seccion',$request->id_seccion)->first();
                        $estu=$inscripcion->datosBasicos->id;
                        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
                        $buscaNotas=Boletin::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$estu)->groupBy('lapso')->get();

                        if (count($buscaNotas)==1){

                        for ($i=0; $i < count($asignaturas); $i++) { 
                            
                            $calificaciones=Boletin::create([
                                'id_asignatura' => $asignaturas[$i]->id,
                                'lapso' => 1,
                                'inasistencias' => 0,
                                'calificacion' => 1,
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);  
                        }
                       }elseif(count($buscaNotas)==2){

                            for ($i=0; $i < count($asignaturas); $i++) { 
                            
                                $calificaciones=Boletin::create([
                                    'id_asignatura' => $asignaturas[$i]->id,
                                    'lapso' => 1,
                                    'inasistencias' => 0,
                                    'calificacion' => 1,
                                    'id_datosBasicos' => $request->id_datosBasicos,
                                    'id_periodo' => $request->id_periodo
                                ]);
                           
                            }
                            for ($i=0; $i < count($asignaturas); $i++) { 
                            
                            $calificaciones=Boletin::create([
                                'id_asignatura' => $asignaturas[$i]->id,
                                'lapso' => 2,
                                'inasistencias' => 0,
                                'calificacion' => 1,
                                'id_datosBasicos' => $request->id_datosBasicos,
                                'id_periodo' => $request->id_periodo
                            ]);
                           
                            }



                     }else{
                        $accion='Error en el proceso de inscripcion';
                        $this->auditoria($accion);
                            flash('ERROR EN EL PROCESO, INTÉNTELO DENUEVO!','danger');
                            return redirect()->back();
                        }



                     }
                 





                            flash('SE HA REGISTRADO LA REINSCRIPCCIÓN DEL ESTUDIANTE CON ÉXITO!','success');
                        }
                        else
                        {
                            flash('REINSCRIPCCIÓN NO EXITOSA!','danger');
                        }


                    }
                    
                }
             }
        }
        return redirect()->route('admin.DatosBasicos.index');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosBasicosRequest $request)
    {
        //dd($request->all());
        //primero verificar los checkbox de Academicos
        if ($request->pendiente=="Si" and count($request->id_asignatura)==0) {
            flash('HA SELECCIONADO QUE EL ESTUDIANTE TIENE ASIGNATURA(S) PENDIENTE(S) Y NO A SELECCIONADO LA(S) ASIGNATURA(S) QUE TIENE PENDIENTE!','warning');
            return redirect()->route('admin.DatosBasicos.create')->withInput();
        } else {
            //primero y medio verificar que no escogió mas de dos asignaturas pendientes
            if ($request->pendiente=="Si" and count($request->id_asignatura)>2) {
                flash('HA SELECCIONADO QUE EL ESTUDIANTE TIENE ASIGNATURA(S) PENDIENTE(S) Y HA SELECCIONADO MAS DE 2 ASIGNATURAS PENDIENTES!','warning');
            return redirect()->route('admin.DatosBasicos.create')->withInput();
            }else{

                //segundo verificamos el chexbox de repite
               if ($request->repite=="Si" and count($request->id_asignaturarep)==0) {
                   flash('HA SELECCIONADO QUE EL ESTUDIANTE TIENE ASIGNATURA(S) PENDIENTE(S) Y NO A SELECCIONADO LA(S) ASIGNATURA(S) QUE TIENE PENDIENTE!','warning');
                return redirect()->route('admin.DatosBasicos.create')->withInput();
               } else {
                    $padre=Padres::where('cedula',$request->cedula_p)->get();
                    if(count($padre)>0 AND $request->cedula_p!=""){
                        flash('LA CÉDULA DEL PADRE YA EXISTE!','warning');
                            return redirect()->route('admin.DatosBasicos.create')->withInput();

                    }else{
                        $madre=Padres::where('cedula',$request->cedula_m)->get();
                        if (count($madre)>0 AND $request->cedula_m!="") {
                            flash('LA CÉDULA DE LA MADRE YA EXISTE!','warning');
                                return redirect()->route('admin.DatosBasicos.create')->withInput();
                        }else{
                            $busca=DatosBasicos::where('cedula',$request->cedula)->get();

                                if (count($busca)>0) {
                                    flash('DISCULPE, YA EXISTE UN ESTUDIANTE REGISTRADO CON ESTA CÉDULA!','warning');
                                    return redirect()->route('admin.DatosBasicos.create')->withInput();

                                }else{$busca=DatosBasicos::where('cedula',$request->cedula)->get();

                                    if (count($busca)>0) {
                                        flash('DISCULPE, YA EXISTE UN ESTUDIANTE REGISTRADO CON ESTA CÉDULA!','warning');
                                        return redirect()->route('admin.DatosBasicos.create')->withInput();

                                    }else{
                               
                                    //despues en caso de que el estudiante no posea cedula
                                    //generar la cedula escolar

                                    if ($request->cedula=="") {
                                            //buscando representante
                                        $representante=Representantes::find($request->id_representante);
                                        //obteniendo cédula
                                        $cedula_rep=$representante->cedula;
                                        //verificando cuantos representados tiene
                                        $representados=DatosBasicos::where('id_representante',$representante->id)->get();
                                        $cuantos=count($representados);
                                        $num_indv=$cuantos+1;
                                        //extrayendo solo los 2 ultimos digitos del año de nacimiento
                                        $anio=substr($request->fecha_nac,2,2);
                                        //calculando la edad correcta
                                        $fecha1 = new DateTime($request->fecha_nac);
                                        $fecha2 = new DateTime();
                                        $fecha = $fecha1->diff($fecha2);
                                        $edad_actual= $fecha->y;
                                        //-----------
                                        //generando cedula escolar
                                        $cedula_escolar=$num_indv."".$anio."".$cedula_rep;
                                            //registrando al estudiante
                                            $datoBasico=DatosBasicos::create([
                                            'nacionalidad' => $request->nacionalidad,
                                            'cedula' => $cedula_escolar,
                                            'nombres' => $request->nombres,
                                            'apellidos' => $request->apellidos,
                                            'lugar_nac' => $request->lugar_nac,
                                            'estado' => $request->estado,
                                            'fecha_nac' => $request->fecha_nac,
                                            'edad' => $edad_actual,
                                            'sexo' => $request->sexo,
                                            'peso' => $request->peso,
                                            'talla' => $request->talla,
                                            'salud' => $request->salud,
                                            'direccion' => $request->direccion,
                                            'id_representante' => $request->id_representante,
                                            'id_parentesco' => $request->id_parentesco
                                            ]);


                                    } else {

                                    //en caso de que la cedula del estudiante no venga vacía
                                        $this->validarCedulaEstudiante($request);

                                        //calculando la edad correcta
                                        $fecha1 = new DateTime($request->fecha_nac);
                                        $fecha2 = new DateTime();
                                        $fecha = $fecha1->diff($fecha2);
                                        $edad_actual= $fecha->y;
                                        $datoBasico=DatosBasicos::create([
                                            'nacionalidad' => $request->nacionalidad,
                                            'cedula' => $request->cedula,
                                            'nombres' => $request->nombres,
                                            'apellidos' => $request->apellidos,
                                            'lugar_nac' => $request->lugar_nac,
                                            'estado' => $request->estado,
                                            'fecha_nac' => $request->fecha_nac,
                                            'edad' => $edad_actual,
                                            'sexo' => $request->sexo,
                                            'peso' => $request->peso,
                                            'talla' => $request->talla,
                                            'salud' => $request->salud,
                                            'direccion' => $request->direccion,
                                            'id_representante' => $request->id_representante,
                                            'id_parentesco' => $request->id_parentesco
                                            ]);
                                    }

                                    if($datoBasico->id>0){

                                                //en caso de registro de padres validando los campos
                                                if ($request->cedula_p!="") {
                                                    $this->validarPadre($request);
                                                }

                                                if ($request->cedula_m!="") {
                                                    $this->validarMadre($request);
                                                }



                                            //verificando el registro del padre

                                            if ($request->cedula_p=="") {
                                                //seleccion del padre......
                                                $id_representante_p=$request->id_padre;
                                                //verificando el checkbox
                                                if ($request->padre_vive=="Si") {
                                                    $vive_p=$request->padre_vive;    
                                                } else {
                                                    $vive_p="No";
                                                }
                                                
                                                
                                            } else {
                                                //registrando Padre
                                                $padre=Padres::create(['nombres' => $request->nombres_p,
                                                                       'apellidos' => $request->apellidos_p,
                                                                       'nacionalidad' => $request->nacionalidad_p,
                                                                       'cedula' => $request->cedula_p,
                                                                       'id_parentesco' => 2]);
                                                $id_representante_p=$padre->id;

                                                //verificando el checkbox
                                                if ($request->vive_p=="Si") {
                                                    $vive_p=$request->vive_p;    
                                                } else {
                                                    $vive_p="No";
                                                }
                                            }

                                            //verificando el registro de la madre
                                            if ($request->cedula_m=="") {
                                                $id_representante_m=$request->id_madre;
                                                //verificando el checkbox
                                                if ($request->madre_vive=="Si") {
                                                    $vive_m=$request->madre_vive;    
                                                } else {
                                                    $vive_m="No";
                                                }
                                            } else {
                                                //registrando madre
                                                $madre=Padres::create(['nombres' => $request->nombres_m,
                                                                       'apellidos' => $request->nombres_m,
                                                                       'nacionalidad' => $request->nacionalidad_m,
                                                                       'cedula' => $request->cedula_m,
                                                                       'id_parentesco' => 1]);
                                                $id_representante_m=$madre->id;

                                                //verificando el checkbox
                                                if ($request->vive_m=="Si") {
                                                    $vive_m=$request->vive_m;    
                                                } else {
                                                    $vive_m="No";
                                                }
                                            }
                                            //verificando checkbox de los recaudos
                                                if ($request->part_nac=="Si") {$part_nac="Si";} else {$part_nac="No";}
                                                
                                                if ($request->boleta_v=="Si") {$boleta_v="Si";} else {$boleta_v="No";}
                                                
                                                if ($request->ci=="Si") {$ci="Si";} else {$ci="No";}

                                                if ($request->fotos=="Si") {$fotos="Si";} else {$fotos="No";}
                                                
                                                if ($request->ci_repre=="Si") {$ci_repre="Si";} else {$ci_repre="No";}

                                                if ($request->foto_repre=="Si") {$foto_repre="Si";} else {$foto_repre="No";}
                                                
                                                if ($request->cer_promo=="Si") {$cer_promo="Si";} else {$cer_promo="No";}

                                                if ($request->cer_calif=="Si") {$cer_calif="Si";} else {$cer_calif="No";}
                                                
                                                if ($request->solv_a=="Si") {$solv_a="Si";} else {$solv_a="No";}
                                                
                                                if ($request->tim_fis=="Si") {$tim_fis="Si";} else {$tim_fis="No";}

                                                if ($request->const_tra=="Si") {$const_tra="Si";} else {$const_tra="No";}

                                                if ($request->carpeta_m=="Si") {$carpeta_m="Si";} else {$carpeta_m="No";}
                                                
                                        
                                        //registrando recaudos
                                            $recaudo=Recaudos::create(['part_nac' => $part_nac,
                                                                       'boleta_v' => $boleta_v,
                                                                       'ci' => $ci,
                                                                       'fotos' => $fotos,
                                                                       'ci_repre' => $ci_repre,
                                                                       'foto_repre' => $foto_repre,
                                                                       'cer_promo' => $cer_promo,
                                                                       'cer_calif' => $cer_calif,
                                                                       'solv_a' => $solv_a,
                                                                       'tim_fis' => $tim_fis,
                                                                       'const_tra' => $const_tra,
                                                                       'carpeta_m' => $carpeta_m,
                                                                       'id_datosBasicos' => $datoBasico->id]);
                                        //registrando a la madre con relacion al estudiante

                                            $padre=\DB::table('datos_basicos_has_padres')->insert(array(
                                            'id_datosBasicos' => $datoBasico->id,
                                            'id_padre' => $id_representante_m,
                                            'vive_con' => $vive_m));
                                        //registrando al padre con relacion al estudiante
                                            $padre=\DB::table('datos_basicos_has_padres')->insert(array(
                                            'id_datosBasicos' => $datoBasico->id,
                                            'id_padre' => $id_representante_p,
                                            'vive_con' => $vive_p));
                                        //datos Académicos
                                            //verificando los checkbox
                                            if ($request->repite=="Si") {
                                                $repite="Si";
                                            } else {
                                                $repite="No";
                                            }
                                            
                                            if ($request->pendiente) {
                                                $pendiente="Si";
                                            } else {
                                                $pendiente="No";
                                            }
                                            //registrando preinscripcion
                                            $preinscripcion=Preinscripcion::create(['id_datosBasicos' => $datoBasico->id,
                                                                                    'repite' => $repite,
                                                                                    'pendiente' => $pendiente,
                                                                                    'id_periodo' => $request->id_periodo]);

                                            $es=DatosBasicos::find($datoBasico->id);
                                            $accion='Ha preinscrito al estudiante '.$es->nombres.', '.$es->apellidos;
                                            $this->auditoria($accion);
                                            if($repite=="Si"){

                                                //registrando asignaturas en caso de que repita
                                                for($i=0;$i<count($request->id_asignaturarep);$i++) {
                                                    $repitiente=AsignaturasPreinscripcion::create(['id_asignatura' => $request->id_asignaturarep[$i],'id_preinscripcion' => $preinscripcion->id,'pend_rep' => 'repite']);
                                                }
                                                
                                            }
                                            if ($pendiente=="Si") {
                                                //registrando asignaturas en caso de que tenga asignaturas pendiente
                                                for($i=0;$i<count($request->id_asignatura);$i++) {
                                                    $repitiente=AsignaturasPreinscripcion::create(['id_asignatura' => $request->id_asignatura[$i],'id_preinscripcion' => $preinscripcion->id,'pend_rep' => 'pendiente']);
                                                }
                                            }
                                            flash('PREINSCRIPCION REALIZADA CON ÉXITO!', 'success');
                                            return redirect()->route('admin.DatosBasicos.index');
                                    }else{
                                        flash('DISCULPE, NO SE PUDO REALIZAR EL REGISTRO DE LA PREINSCRIPCION!', 'error');
                                        return redirect()->back()->withInput();
                                    }
                            }//Fin del condicional Estudiante
                        }//Fin del condicional Madre
                    }//Fin del condicional Padre
                }//Fin del condicional repite y asignatura igual a 0
            }//Fin del condicional pendiente y asignaturas mayor a 2
        }//Fin del condicional pendiente y asignaturas igual a 0
    }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function constancia(Request $request)
    {
        $periodo=Periodos::where('status','Activo')->first();
        $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->get();


        return View('admin.datosBasicos.constancia', compact('inscripcion','periodo'));
    }

    public function mostrarConstancia(Request $request)
    {
        $inscripcion=Inscripcion::find($request->id_estudiante);
        $año=date('Y');
        $periodo=Periodos::where('status','Activo')->first();
        $edu=0;
        $mensualidades=Mensualidades::where('id_datosBasicos',$inscripcion->id_datosBasicos)->where('id_periodo',$periodo->id)->where('estado','Cancelado');

        $es=DatosBasicos::find($inscripcion->id_datosBasicos);
        $accion='Ha generado una constancia de estudios al estudiante '.$es->nombres.', '.$es->apellidos;
        $this->auditoria($accion);


        if ($inscripcion->seccion->curso->curso <= 7) {
            $edu="Básica";
        }else{
            $edu="Media";
        }
        //dd($request->all());
        $dompdf = \PDF::loadView('admin.pdfs.constancia.estudios', ['inscripcion' => $inscripcion, 'periodo' => $periodo, 'año' => $año, 'edu' => $edu, 'mensualidades' => $mensualidades]);

                    return $dompdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosBasicos=DatosBasicos::find($id);
        $recaudos=Recaudos::where('id_datosBasicos',$datosBasicos->id)->get();
        $representantes=Representantes::all();
        return View('admin.datosBasicos.edit', compact('representantes','datosBasicos','recaudos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DatosBasicosRequest $request, $id)
    {
        $buscar=DatosBasicos::where('cedula',$request->cedula)->where('id','<>',$id)->where('id_representante',$request->id_representante)->get();
        $cuantos=count($buscar);
        if ($cuantos==0) {
            $datosBasicos=DatosBasicos::find($id);
            $datosBasicos->update($request->all());

        flash('ESTUDIANTE EDITADO CON ÉXITO!', 'success');

        } else {
        flash('ESTE ESTUDIANTE YA EXISTE!', 'warning');

        }
        $num=0;
        $datosBasicos=DatosBasicos::all();
        return View('admin.DatosBasicos.index', compact('datosBasicos','num'));
            
        
    }
    public function actualiza(Request $request)
    {

        $buscar=DatosBasicos::where('cedula',$request->cedula)->where('id','<>',$id)->where('id_representante',$request->id_representante)->get();
        $cuantos=count($buscar);
        if ($cuantos==0) {
            $datosBasicos=DatosBasicos::find($id);
            $datosBasicos->update($request->all());

        flash('ESTUDIANTE EDITADO CON ÉXITO!', 'success');

        } else {
        flash('ESTE ESTUDIANTE YA EXISTE!', 'warning');

        }
        $datosBasicos=DatosBasicos::find($id);
        $datosBasicos->update($request->all());

        flash('ESTUDIANTE EDITADO CON ÉXITO!', 'success');
        $num=0;
        //$datosBasicos=DatosBasicos::all();
        $padres=Padres::all();
        $preinscripcion=Inscripcion::all();
        $datosbasicos=DatosBasicos::all();
        $periodo=Periodos::where('status','Activo')->first();
        $accion='Actualiza datos del estudiante '.$buscar->nombres.', '.$buscar->apellidos;
        $this->auditoria($accion);
        return View('admin.DatosBasicos.index', compact('preinscripcion','num','datosbasicos','periodo'));
    }
    protected function validarPadre(Request $request){

        $this->validate($request,
            [
                'cedula_p'        => 'required|digits_between:6,8',
                'nombres_p'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'apellidos_p'    => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'
            ]);
    }

    protected  function validarMadre(Request $request){

        $this->validate($request,
            [
                'cedula_m'        => 'required|digits_between:6,8',
                'nombres_m'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'apellidos_m' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'
            ]);
    }

    protected  function validarCedulaEstudiante(Request $request){

        $this->validate($request,
            [
                'cedula'        => 'required|digits_between:8,8'
            ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            // dd($id);
            $estudiante=DatosBasicos::find($id);
            $estudiante->delete();
            flash('REGISTRO DEL ESTUDIANTE ELIMINADO CON ÉXITO!','success');
            return redirect()->route('admin.DatosBasicos.index');
    }

    private function auditoria($accion)
    {
        $auditoria=Auditoria::create([
                    'id_user' => \Auth::user()->id,
                    'accion' => $accion
                ]);
    }
}
