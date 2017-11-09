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
use App\asignaturas;
use App\Seccion;
use App\Personal;
use App\Representantes;
use App\Mensualidades;
use App\User;
use Session;

class MediaGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $periodo=Periodos::where('status','Activo')->first();
        $secciones=Seccion::all();
        $inscripcion=Inscripcion::all();
       
        $num=0;
        $cali=Boletin::all();
        $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->get();
        //dd($personal);
        $contar=0;
        $personal2=Personal::where('correo',$correo)->first();
        
        $cantidad=0;
        //buscando lapso a registrar
        foreach ($personal2->asignacion_a as $key) {
            //dd($key->pivot->id_asignatura);
            $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$periodo->id)->groupBy('lapso')->get();
            
            $contar+=count($boletin);
            if($key->pivot->id_periodo==$periodo->id){
                $cantidad++;
            }
        }
        //dd($contar);

        if ($contar==0) {
            $lapso=1;
        } else {
            if ($contar==$cantidad) {
                $lapso=2;
            } else {
                if ($contar==(2*$cantidad)) {
                    $lapso=3;
                } else {
                    $lapso=0;
                }
                
            }
            
        }
        //dd($lapso);
        return View('admin.educacion_media.index', compact('num','inscripcion','boletin','secciones','periodo','personal','lapso'));
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
        $c=\Auth::user()->email;
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
              $boletin=Boletin::all();
               $correo=\Auth::user()->email;
              $personal=Personal::where('correo',$correo)->first();
              
              //dd($personal);
              //buscando lapso a registrar
              $contar=0;
              $cantidad=0;
              foreach ($personal->asignacion_a as $key) {
                  //dd($key->pivot->id_asignatura);
                  $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$request->id_periodo)->groupBy('lapso')->get();
                  $contar+=count($boletin);
                  if($key->pivot->id_periodo==$request->id_periodo){
                      $cantidad++;
                  }
              }
              //dd($contar);

              if ($contar==0) {
                  $lapso=1;
              } else {
                  if ($contar==$cantidad) {
                      $lapso=2;
                  } else {
                      
                      if ($contar==(2*$cantidad)) {
                          $lapso=3;
                      } else {
                          $lapso=0;
                      }
                  }
                  
              }
              $ins=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
              //  dd($lapso);
              return View('admin.educacion_media.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num','seccion','personal','lapso','ins'));

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

        //dd($request->all());
        $periodo=Periodos::where('status','Activo')->get()->first();
        $inscri=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos[0])->get()->first();
        $correo=\Auth::User()->email;
        $personal=Personal::where('correo',$correo)->get();       
        $datobasico=DatosBasicos::find($request->id_datosBasicos);
        $asig=Asignaturas::where('id_curso',$request->id_curso)->get();

        $tot=count($asig);
        $cant=count($request->id_asignatura)/count($request->id_datosBasicos);
        $k=0;
        

        if ($request->lapso==1) 
        {
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            {
                for ($j=$k; $j < $cant ; $j++)
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
            return redirect()->route('admin.educacion_media.index');
                    
         }

         elseif ($request->lapso==2)
         {
                for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
                {
                    for ($j=$k; $j < $cant ; $j++)
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
            return redirect()->route('admin.educacion_media.index');

        }
        else 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $cant ; $j++)
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
            return redirect()->route('admin.educacion_media.index');
    }
}
    public function mostrar($id_seccion, $id_periodo)
    {
        $correo=\Auth::user()->email;
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
        return View('admin.educacion_media.show', compact('num','guia','boletin','asignaturas','seccion','inscripcion','id_periodo','lapsos','lapso1','lapso2','lapso3','periodo','num','id_periodo','personal'));
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

    public function boletinMediaEstudiante($id_datosBasicos, $id_seccion,$id_periodo, $lapso)
    {

        $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->first();
        $representante=Representantes::where('email',$correo)->first();

        $inscripcion=Inscripcion::where('id_seccion',$id_seccion)->where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->get();
        $inscripcion2=Inscripcion::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->first();
        $seccion=Seccion::find($id_seccion);
        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
        $periodo=Periodos::find($id_periodo);
        $mensualidades=Mensualidades::where('id_inscripcion',$inscripcion2->id)->where('estado','Cancelado')->get();

        $boletin=Boletin::where('id_periodo',$id_periodo)->get();
        $boletin2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->get();

        $lapso1=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',1)->get();
        $lapso2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',2)->get();
        $lapso3=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',3)->get();
        $l1=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',1)->orderBy('lapso')->get();
        $l2=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',2)->get();
        $l3=Boletin::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('lapso',3)->get();
        //dd(count($l1),count($l2));
        
        //dd(count($lapso1));
        //Si no hay notas...
        if (count($boletin2) == 0) {
            flash('EL ESTUDIANTE TODAVÍA NO TIENE NOTAS CARGADAS','warning');
                return redirect()->back();
        }else{
          if ($lapso == 1 AND count($l1) != count($asignaturas)  AND count($l1)>0) {
            flash('DISCULPE, TODAVÍA FALTAN CALIFICACIONES POR CARGAR EN EL LAPSO 1','warning');
              return redirect()->back();
          }else{
            if ($lapso == 2 AND count($l2) != count($asignaturas)  AND count($l2)>0) {
              flash('DISCULPE, TODAVÍA FALTAN CALIFICACIONES POR CARGAR EN EL LAPSO 2','warning');
              return redirect()->back();
            }else{
              if ($lapso == 3 AND count($l3) != count($asignaturas)   AND count($l3)>0) {
              flash('DISCULPE, TODAVÍA FALTAN CALIFICACIONES POR CARGAR EN EL LAPSO 3','warning');
              return redirect()->back();
              }else{
                
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

                            $lap_compa=0;
                            if ($lapso==1) {
                              $lap_compa=1;
                            }elseif ($lapso==2) {
                              $lap_compa=2;
                            }else{
                              $lap_compa=3;
                            }

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
                           
                          //dd(count($l1));
                           $num=0;
                           $representante=Representantes::find($inscripcion2->datosBasicos->id_representante);
                            $dompdf = \PDF::loadView('admin.pdfs.boletines.boletinMedia.boletinMediaEstudiante', ['num' => $num, 'inscripcion' => $inscripcion, 'periodo' => $periodo, 'boletin' => $boletin, 'boletin2' => $boletin2, 'seccion' => $seccion, 'id_periodo' => $id_periodo,'lap_compa' => $lap_compa, 'lapsos' => $lapsos, 'asignaturas' => $asignaturas, 'representante' => $representante,'l1' => $l1, 'l2' => $l2, 'l3' => $l3, 'lapso1' => $lapso1, 'cont_lap1' => $cont_lap1, '$cont_lap2' => $cont_lap2, 'id_datosBasicos' => $id_datosBasicos])->setPaper('a4', 'landscape');

                            return $dompdf->stream();

                        }//fin de la busqueda del tercer lapso y solvencia de 12 mensualidades
                    }//fin de la busqueda del segundo lapso y solvencia de 6 mensualidades
                }//fin de la busqueda del primer lapso y solvencia de 3 mensualidades

              }//faltan asignaturas del 1 lapso
            }//faltan asignaturas del 2 lapso
          }//faltan asignaturas del 3 lapso
          }
        

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($i,$id_datosBasicos,$id_periodo){
        dd($id_datosBasicos);

    }
    public function edit($id)
    {
        //
    }

    public function editar(Request $request)
    {
      $c=\Auth::user()->email;
        $representante=Representantes::where('email',$c)->first();

        if (count($representante) > 1) {
            flash('¡¡¡ACCESO DENEGADO!!! - INCIDENTE REPORTADO','warning');
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

              $correo=\Auth::user()->email;
              $personal=Personal::where('correo',$correo)->first();
              $inscripcion=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->first();
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
              return View('admin.educacion_media.edit', compact('num','personal','guia','boletin','asignaturas','seccion','inscripcion','id_periodo','lapsos','lapso1','lapso2','lapso3','periodo','num','id_periodo'));



            }else{
                flash('¡CONTRASEÑA INCORRECTA!','danger');
                return redirect()->back();
            }
        }//fin del else de comprobacion de usuario representante
    }

    public function notas()
    {
        $periodo=Session::get('periodo');
        $email=\Auth::user()->email;

        $representante=Representantes::where('email',$email)->first();
        $datosBasicos=DatosBasicos::where('id_representante',$representante->id)->get();
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        
        $reporte1=Calificaciones::where('nro_reportes',1)->groupBy('id_datosBasicos')->get();
        $reporte2=Calificaciones::where('nro_reportes',2)->groupBy('id_datosBasicos')->get();
        $reporte3=Calificaciones::where('nro_reportes',3)->groupBy('id_datosBasicos')->get();

        $lapso1=Boletin::where('lapso',1)->groupBy('id_datosBasicos')->get();
        $lapso2=Boletin::where('lapso',2)->groupBy('id_datosBasicos')->get();
        $lapso3=Boletin::where('lapso',3)->groupBy('id_datosBasicos')->get();

        $lapso=Boletin::where('id_periodo',$periodo)->groupBy('lapso')->get();
        //dd(count($lapso));
        $cont=0;

          
        

       

        //   foreach ($lapso2 as $key3) {
        //     if ($key3->datosBasicos->id == $key->id AND $key3->id_periodo == $periodo) {
              
        //     }
        //   }

        //   foreach ($lapso3 as $key4) {
        //     if ($key4->datosBasicos->id == $key->id AND $key4->id_periodo == $periodo) {
              
        //     }
        //   }

        // }
        // }
        //dd($cont);
        $num=0;
        return View('admin.calificaciones.notas.index', compact('num','boletin','inscripcion','datosBasicos','lapso1','lapso2','lapso3','reporte1','reporte2','reporte3'));

    }

    public function notas2()
    {
        $periodo=Session::get('periodo');
        $email=\Auth::user()->email;
        $secciones=Seccion::all();
        $inscripciones=Inscripcion::where('id_periodo',$periodo)->groupBy('id_seccion')->get();
        
        //dd(count($lapso));
        $cont=0;

        $num=0;
        return View('admin.calificaciones.notas2.index', compact('num','secciones','inscripciones'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       //
    }

    public function actualizarlapso(Request $request)
    {

       $datoBasico=DatosBasicos::find($request->id_datosBasicos);
            for ($i=0; $i < count($request->id_asignatura) ; $i++) {
                $lapso=Boletin::find($request->id[$i]);
                $lapso->inasistencias = $request->inasistencias[$i];
                $lapso->calificacion = $request->calificacion[$i];
                $lapso->save();
            }
        flash('NOTAS DEL ESTUDIANTE '.$datoBasico->nombres.' EDITADO CON ÉXITO!', 'success');
        return redirect()->route('admin.educacion_media.index');
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
}
