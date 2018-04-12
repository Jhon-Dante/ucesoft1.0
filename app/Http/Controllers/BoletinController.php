<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Inscripcion;
use App\DatosBasicos;
use App\Momentos;
use App\Calificaciones;
use App\Periodos;
use App\Boletin;
use App\Asignaturas;
use App\Seccion;
use App\Personal;
use App\User;
use App\Mensualidades;
use App\Representantes;
use Session;
use App\Auditoria;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos=Session::get('periodo');
        $periodo=Periodos::find($periodos);
        
        $p=Periodos::where('status','Activo')->first();
        $periodo2=Session::get('periodo');
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $usuario=Session::get('correo_docente');
        } else {
             $usuario=\Auth::user()->email;  //Busco el Email del personal
        }
       
        //dd($usuario);
        $personal=Personal::where('correo',$usuario)->first();
        $inscripcion=Inscripcion::all();
        //dd($personal);
        $boletin=Boletin::all();
        $num=0;
        $lapso=Boletin::where('id_periodo',$periodo)->groupBy('lapso')->get();

        $lapso1=0;
        $lapso2=0;
        $lapso3=0;
        //dd(count($personal->asignacion_s));
        foreach ($personal->asignacion_s as $key) {

            foreach ($inscripcion as $key2) {

                if ($key2->seccion->id == $key->pivot->id_seccion and $key2->id_periodo == $key->pivot->id_periodo) {
            
                    foreach ($boletin->groupBy('lapso') as $key3) {
                        
                        if ($key3[0]->lapso == 1) {
                            $lapso1=1;
                        }
                        if ($key3[0]->lapso == 2) {
                            $lapso2=1;
                        }
                        if ($key3[0]->lapso == 3) {
                            $lapso3=1;
                        }
                    }
                }                    
            }
        }
        
        //dd($lapso1);

        return View('admin.educacion_basica.index', compact('num','p','inscripcion','periodo2','boletin','secciones','periodo','personal','lapso1','lapso2','lapso3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('asdasdsdas');
    }

    public function crear(Request $request)
    {
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $c=Session::get('correo_docente');
        } else {
             $c=\Auth::user()->email;  //Busco el Email del personal
        }	
        
        $representante=Representantes::where('email',$c)->first();

        if (count($representante) > 1) {
            flash('¡¡¡ACCESO DENEGADO!!! - INCIDENTE REPORTADO','warning');
            return redirect()->back();
        }else{

            $clave=$request->password;
            
            $personal=Personal::all();


            foreach ($personal as $key) {
              foreach ($key->asignacion_s as $key2) {
                if ($key2->pivot->id_seccion == $request->id_seccion AND $key2->pivot->id_periodo == $request->id_periodo) {
                  $personal=Personal::find($key2->pivot->id_personal);
                  $usuario=User::where('email',$personal->correo)->first();
                  $validator=$usuario->password;
                }
              }
            }

            


            if (password_verify($clave, $validator)) {


          	  $inscripcion=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();
              $inscripcion2=Inscripcion::where('id_seccion',$request->id_seccion)->get()->first();
              $seccion=Seccion::find($request->id_seccion);
                 
              $num=0;
              $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();

              $periodos=Periodos::find($request->id_periodo);
              // en el caso de que sea administrador o secretaria
              if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
                  $usuario=Session::get('correo_docente');
              } else {
                   $usuario=\Auth::user()->email;  //Busco el Email del personal
              }
              
              $personal=Personal::where('correo',$usuario)->first();
          	
             	$contar=0;
              $cantidad=0;
              foreach ($personal->asignacion_a as $key) {
                  $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$request->id_periodo)->groupBy('lapso')->get();
                  $contar+=count($boletin);
                  if ($key->pivot->id_periodo==$request->id_periodo) {
                      $cantidad++;
                  }
              }
             	
              if ($contar == 0) {
                  $lapso=1;
              }else{
                  if ($contar == $cantidad) {
                      $lapso=2;
                  }else{
                      if ($contar == (2*$cantidad)) {
                          $lapso=3;
                      }else{
                          $lapso=0;
                      }
                  }
              }
              $ins=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();


                  return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num','seccion','personal','lapso','ins'));

              
            }else{
                flash('¡CONTRASEÑA INCORRECTA!','danger');
                return redirect()->back();
            }
        }//fin del else de comprobacion de usuario representante
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $periodo=Periodos::where('status','Activo')->get()->first();
        $inscri=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos[0])->get()->first();
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $correo=Session::get('correo_docente');
        } else {
             $correo=\Auth::user()->email;  //Busco el Email del personal
        }
        
        $personal=Personal::where('correo',$correo)->get()->first();       

        $datobasico=DatosBasicos::find($request->id_datosBasicos);
        



        $lapso=Boletin::where('id_periodo',$periodo->id)->where('id_datosBasicos',$inscri->id)->get();
      
        $asig=Asignaturas::where('id_curso',$request->id_curso)->get();

        $tot=count($asig);
        $cant=count($request->id_asignatura);
        $k=0;
        

        for ($i=0; $i < count($request->id_datosBasicos) ; $i++) { 
            $calif=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',1)->first();
            $calif2=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',2)->first();
            $calif3=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',3)->first();
        }

        if (count($calif)==0) 
        {
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            {
                for ($j=$k; $j < count($request->id_asignatura) ; $j++)
                {
                    $crear=Boletin::create([
                        'id_asignatura' => $request->id_asignatura[$j],
                        'lapso' => 1,
                        'inasistencias' => $request->inasistencia[$j],
                        'calificacion' => $request->calificacion[$j],
                        'id_datosBasicos' => $request->id_datosBasicos[$i],                            
                        'id_periodo' => $periodo->id
                    ]);
                }
            }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');
                    
         }

         elseif (count($calif) == 1 and count($calif2)==0 )
         {
                for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
                {
                    for ($j=$k; $j < count($request->id_asignatura) ; $j++)
                    {
                        //dd(count($request->id_asignatura));
                        $crear=Boletin::create([
                            'id_asignatura' => $request->id_asignatura[$j],
                            'lapso' => 2,
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j],
                            'id_datosBasicos' => $request->id_datosBasicos[$i],                            
                            'id_periodo' => $periodo->id
                        ]);
                    }

                }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');

        }
        elseif (count($calif2)==1 and count($calif3)==0) 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {

                        $crear=Boletin::create([
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'lapso' => 3,
                            
                            'id_periodo' => $periodo->id,
                            'id_asignatura' => $request->id_asignatura[$j],
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j] 
                        ]);
                    }
               
            }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');
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
    public function pdf()
    {
        dd('pdf');
    }
    public function boletinBasicaEstudiante($id_datosBasicos, $id_seccion, $id_periodo,$lapso)
    {
        $s=Seccion::find($id_seccion);
        $accion='Visualiza la carga de notas de: '.$s->curso->curso. ' en la sección: '.$s->seccion;
        $this->auditoria($accion);
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $correo=Session::get('correo_docente');
        } else {
             $correo=\Auth::user()->email;  //Busco el Email del personal
        }
        
        $personal=Personal::where('correo',$correo)->first();

        $representante=Representantes::where('email',$correo)->first();

        $inscripcion=Inscripcion::where('id_seccion',$id_seccion)->where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->get();
        $inscripcion2=Inscripcion::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->first();
        $seccion=Seccion::find($id_seccion);
        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
        $periodo=Periodos::find($id_periodo);
        $mensualidades=Mensualidades::where('id_inscripcion',$inscripcion2->id)->where('estado','Cancelado')->get();
        
        $boletin=Boletin::where('id_periodo',$id_periodo)->get();
        $boletin2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->orderBy('id_asignatura')->get();


        $lapso1=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',1)->get();
        $lapso2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',2)->get();
        $lapso3=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',3)->get();

        
        if (count($boletin2) == 0) {
            flash('EL ESTUDIANTE TODAVÍA NO TIENE NOTAS CARGADAS','warning');
                return redirect()->back();
        }




        if(count($lapso1) > 0 AND count($mensualidades)<3){//Si ya está cargado el primer lapso y no tiene 3 meses de mensualidad cancelada...
            flash('EL ESTUDIANTE DEBE TENER 3 MESES DE SOLVENCIA EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 1ER LAPSO','warning');
            return redirect()->back();
        }else{
            if (count($lapso2) > 0 AND count($mensualidades)<6) {
                flash('EL ESTUDIANTE DEBE TENER 6 MESES DE SOLVENCIA EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 2DO LAPSO','warning');
                return redirect()->back();
            }else{
                if (count($lapso3) > 0 AND count($mensualidades)<12) {
                    flash('EL ESTUDIANTE DEBE ESTAR SOLVENTE EN TODOS LOS MESES EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 3ER LAPSO','warning');
                    return redirect()->back();
                }else{


                    $lap_m=0;
                    if ($lapso==1) {
                      $lap_m=1;
                    }elseif ($lapso==2) {
                      $lap_m=2;
                    }else{
                      $lap_m=3;
                    }
                    //dd($lap);
                    $k=0;
                    $i=0; 
                    $m=0;
                    $cont_lap1=0;
                    $cont_lap2=0;
                    $cont_lap3=0;
                    foreach ($asignaturas as $key) {
                    $p=0;
                    $i=$k;
                    
                        if(count($mensualidades)<3){
                            flash('EL ESTUDIANTE TODAVÍA TIENE MENSUALIDADES QUE DEBE CANCELAR PARA VER LAS CALIFICACIONES CARGADAS','danger');
                            return redirect()->back();
                        }else{
                          foreach ($key->boletin->groupBy('lapso') as $key2) {
                              
                              if ($key2[0]->id_asignatura==$key->id and $key2[0]->id_periodo==$id_periodo) {
                                
                              $lap[$i]=$key2[0]->lapso;
                                if($key2[0]->lapso==1){
                                  $cont_lap1++;
                                }
                                if($key2[0]->lapso==2){
                                  $cont_lap2++;
                                }
                                if($key2[0]->lapso==3){
                                  $cont_lap3++;
                                }
                              $i++; 
                              $p++;   
                              }
                              
                            }

                            $k=$i;
                            
                            if($i>0 and $p>0){
                              $j=$i-1;
                              $lapsos[$m]=$lap[$j]; 
                              $m++;             
                            }
                   
                        }
                        //verificando si esta listo el lapso 1 para imprimir boletin
                       if ($cont_lap1==count($asignaturas)) {
                         $lapso1=1;
                       }else{
                         $lapso1=0;
                       }
                       //verificando si esta listo el lapso 2 para imprimir boletin
                       if ($cont_lap2==count($asignaturas)) {
                         $lapso2=1;
                       }else{
                         $lapso2=0;
                       }
                       //verificando si esta listo el lapso 3 para imprimir boletin
                       if ($cont_lap3==count($asignaturas)) {
                         $lapso3=1;
                       }else{
                         $lapso3=0;
                       }
                    }

                    $l1=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',1)->get();
                    $l2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',2)->get();
                    $l3=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',3)->get();
                   $num=0;
                   $representante=Representantes::find($inscripcion2->datosBasicos->id_representante);

                   
                    $dompdf = \PDF::loadView('admin.pdfs.boletines.boletinBasica.boletinBasicaEstudiante', ['num' => $num, 'inscripcion' => $inscripcion, 'periodo' => $periodo, 'boletin' => $boletin, 'boletin2' => $boletin2, 'seccion' => $seccion, 'id_periodo' => $id_periodo, 'lapsos' => $lapsos, 'asignaturas' => $asignaturas, 'representante' => $representante,'l1' => $l1, 'l2' => $l2, 'l3' => $l3, 'lapso1' => $lapso1,'lap_m' => $lap_m, 'cont_lap1' => $cont_lap1, '$cont_lap2' => $cont_lap2, 'id_datosBasicos' => $id_datosBasicos])->setPaper('a4', 'landscape');

                    return $dompdf->stream();



                }//fin de la busqueda del tercer lapso y solvencia de 12 mensualidades
            }//fin de la busqueda del segundo lapso y solvencia de 6 mensualidades
        }//fin de la busqueda del primer lapso y solvencia de 3 mensualidades   
    }
    public function mostrar($id_seccion, $id_periodo)
    {
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $correo=Session::get('correo_docente');
        } else {
             $correo=\Auth::user()->email;  //Busco el Email del personal
        }
        
        $personal=Personal::where('correo',$correo)->first();
        $inscripcion=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        $seccion=Seccion::find($id_seccion);
        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
        $periodo=Periodos::find($id_periodo);


        $boletin=Boletin::where('id_periodo',$id_periodo)->get();
        
        $k=0;
        $i=0; 
        $m=0;
        $cont_lap1=0;
        $cont_lap2=0;
        $cont_lap3=0;
        foreach ($asignaturas as $key) {
        $p=0;
        $i=$k;
        
          foreach ($key->boletin->groupBy('lapso') as $key2) {
              
              if ($key2[0]->id_asignatura==$key->id and $key2[0]->id_periodo==$id_periodo) {
                //dd(count($key2));
              $lap[$i]=$key2[0]->lapso;
                if($key2[0]->lapso==1){
                  $cont_lap1++;
                }
                if($key2[0]->lapso==2){
                  $cont_lap2++;
                }
                if($key2[0]->lapso==3){
                  $cont_lap3++;
                }
              $i++; 
              $p++;   
              }
              
            }

            $k=$i;
            
            if($i>0 and $p>0){
              $j=$i-1;
              $lapsos[$m]=$lap[$j]; 
              $m++;             
            }
   
        }
        //verificando si esta listo el lapso 1 para imprimir boletin
       if ($cont_lap1==count($asignaturas)) {
         $lapso1=1;
       }else{
         $lapso1=0;
       }
       //verificando si esta listo el lapso 2 para imprimir boletin
       if ($cont_lap2==count($asignaturas)) {
         $lapso2=1;
       }else{
         $lapso2=0;
       }
       //verificando si esta listo el lapso 3 para imprimir boletin
       if ($cont_lap3==count($asignaturas)) {
         $lapso3=1;
       }else{
         $lapso3=0;
       }

       $num=0;
        return View('admin.educacion_basica.show', compact('num','guia','boletin','asignaturas','seccion','inscripcion','id_periodo','lapsos','lapso1','lapso2','lapso3','periodo','num','id_periodo'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
      // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $c=Session::get('correo_docente');
        } else {
             $c=\Auth::user()->email;  //Busco el Email del personal
        }
      
        $representante=Representantes::where('email',$c)->first();

        if (count($representante) > 1) {
            flash('¡¡¡ACCESO DENEGADO!!! - INCIDENTE REPORTADO','warning');
            $s=Seccion::find($request->id_seccion);
            $accion='Intentó ingresar a la carga de notas del curso '.$s->curso->curso.' en la sección '.$s->seccion;
            $this->auditoria($accion);
            return redirect()->back();
        }else{
            $clave=$request->password;
            
            $personal=Personal::all();

            foreach ($personal as $key) {
              foreach ($key->asignacion_s as $key2) {
                if($key2->pivot->id_seccion == $request->id_seccion AND $key2->pivot->id_periodo == $request->id_periodo){
                  $id_perso=$key2->pivot->id_personal;
                }
              }
            }
            $personal2=Personal::find($id_perso);
            $email=$personal2->correo;
            $usuario=User::where('email',$email)->first();
            $validator=$usuario->password;


            if (password_verify($clave, $validator)) {
              // en el caso de que sea administrador o secretaria
              if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
                  $correo=Session::get('correo_docente');
              } else {
                   $correo=\Auth::user()->email;  //Busco el Email del personal
              }
               
              $personal=Personal::where('correo',$correo)->first();
              $inscripcion=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get();
              $seccion=Seccion::find($request->id_seccion);
              $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
              $periodo=Periodos::find($request->id_periodo);


              $boletin=Boletin::where('id_periodo',$request->id_periodo)->get();
              
              $k=0;
              $i=0; 
              $m=0;
              $cont_lap1=0;
              $cont_lap2=0;
              $cont_lap3=0;
              foreach ($asignaturas as $key) {
              $p=0;
              $i=$k;
              
                foreach ($key->boletin->groupBy('lapso') as $key2) {
                    
                    if ($key2[0]->id_asignatura==$key->id and $key2[0]->id_periodo==$request->id_periodo) {
                      //dd(count($key2));
                    $lap[$i]=$key2[0]->lapso;
                      if($key2[0]->lapso==1){
                        $cont_lap1++;
                      }
                      if($key2[0]->lapso==2){
                        $cont_lap2++;
                      }
                      if($key2[0]->lapso==3){
                        $cont_lap3++;
                      }
                    $i++; 
                    $p++;   
                    }
                    
                  }

                  $k=$i;
                  
                  if($i>0 and $p>0){
                    $j=$i-1;
                    $lapsos[$m]=$lap[$j]; 
                    $m++;             
                  }
         
              }
              //verificando si esta listo el lapso 1 para imprimir boletin
             if ($cont_lap1==count($asignaturas)) {
               $lapso1=1;
             }else{
               $lapso1=0;
             }
             //verificando si esta listo el lapso 2 para imprimir boletin
             if ($cont_lap2==count($asignaturas)) {
               $lapso2=1;
             }else{
               $lapso2=0;
             }
             //verificando si esta listo el lapso 3 para imprimir boletin
             if ($cont_lap3==count($asignaturas)) {
               $lapso3=1;
             }else{
               $lapso3=0;
             }

             $num=0;
              return View('admin.educacion_basica.edit', compact('num','guia','boletin','asignaturas','seccion','inscripcion','id_periodo','lapsos','lapso1','lapso2','lapso3','periodo','num','id_periodo'));



            }else{
                flash('¡CONTRASEÑA INCORRECTA!','danger');
                return redirect()->back();
            }
        }//fin del else de comprobacion de usuario representante
    }
    public function edit($id)
    {
        //
    }

    public function actualizarlapso(Request $request)
    {
      //dd($request->all());


       $datoBasico=DatosBasicos::find($request->id_datosBasicos);
            for ($i=0; $i < count($request->id_asignatura) ; $i++) {
                $lapso=Boletin::find($request->id[$i]);
                $lapso->inasistencias = $request->inasistencias[$i];
                $lapso->calificacion = $request->calificacion[$i];
                $lapso->save();
            }
        flash('NOTAS DEL ESTUDIANTE '.$datoBasico->nombres.' EDITADO CON ÉXITO!', 'success');
        return redirect()->route('admin.educacion_basica.index');

        $accion='Actualiza datos del estudiante '.$datosBasicos->nombres;
        $this->auditoria($accion);
      
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function auditoria($accion)
    {
        //use App\Auditoria;
        //$accion='Mostrando los datos de los estudiantes registrados';
        //$this->auditoria($accion);
        $auditoria=Auditoria::create([
                    'id_user' => \Auth::user()->id,
                    'accion' => $accion
                ]);
    }
}
