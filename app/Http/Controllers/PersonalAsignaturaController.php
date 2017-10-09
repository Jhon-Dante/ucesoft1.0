<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asignaturas;
use App\Personal;
use App\Periodos;
use App\Seccion;
use App\Cursos;
use App\Guias;
use App\PersonalPSecciones;
use App\Docente_has_asignatura;
use App\Inscripcion;
use App\Boletin;
use Laracast\Flash\Flash;


class PersonalAsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $personal=Personal::where('id_cargo','<>',1)->where('id_cargo','<>',2)->get();
        // dd($personal->asignacion_a);
        
        return View('admin.personal_asignatura.index', compact('personal','num'));
    }

    public function listado()
    {
        //dd('asasa');
        $num=0;
        $periodo=Periodos::where('status','Activo')->first();
        $personal=Personal::where('id_cargo','<>',1)->where('id_cargo','<>',2)->get();
        
        //dd($personal);
        return View('admin.personal_asignatura.listado', compact('personal','num','periodo'));   
    }
    public function buscarpersonal($id)
    {
        $personal=Personal::find($id);
        //dd($personal);
        if($personal->id_cargo==5) {
            
               return $cursos=Cursos::where('id',1)->get();
        }else{
            if ($personal->id_cargo==4) {

                return $cursos=Cursos::where('id','>=',2)->where('id','<=',7)->get();

            } else {
                return $cursos=Cursos::where('id','>=',8)->where('id','<=',12)->get();
            }
            
        }
            
        
    }

    public function buscarsecciones($id)
    {
        return $secciones=Seccion::where('id_curso',$id)->get();
    }

    public function buscarasignaturas($id)
    {
        
        return $asignaturas=Asignaturas::where('id_curso',$id)->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $personal=Personal::where('id_cargo','<>',1)->where('id_cargo','<>',2)->get();
        $asignaturas=Asignaturas::lists('asignatura','id');
        $periodos=Periodos::lists('periodo','id');
        $seccion=Seccion::lists('seccion','id');
        return View('admin.personal_asignatura.create', compact('personal','asignaturas','periodos','seccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $periodo=Periodos::where('status','Activo')->first();
        $personal=Personal::all();
        $id_curso=$request->id_curso;
        switch($id_curso){
                      
                      case 1:
                      $contar=0;
                      foreach ($personal as $keys) {
                        foreach ($keys->asignacion_s as $key) {
                          if($key->id_seccion==$request->id_seccion and $key->pivot->id_periodo==$periodo->id){
                            $contar++;
                          }
                        }    
                      }
                      
                      if ($contar>0) {
                        flash('YA LA SECCIÓN SELECCIONADA SE ENCUENTRA ASIGNADA A UN DOCENTE!','error');
                            return redirect()->back();
                      }else{

                        $create=PersonalPSecciones::create([
                          'id_personal' => $request->id_personal,
                          'id_seccion' => $request->id_seccion,
                          'id_periodo' => $periodo->id
                        ]);

                        flash('ASIGNACIÓN DE SECCIÓN A DOCENTE DE PREESCOLAR SE HA RELIZADO DE FORMA EXITOSA!','success');
                        return redirect()->route('admin.personal_asignatura.listadopreescolar');

                      }

                      break;
                      case ($id_curso >= 2 && $id_curso <=7):
                        //es de preescolar o basica
                      $contar=0;
                      foreach ($personal as $keys) {
                        foreach ($keys->asignacion_s as $key) {
                          if($key->id_seccion==$request->id_seccion and $key->pivot->id_periodo==$periodo->id){
                            $contar++;
                          }
                        }    
                      }
                      
                      if ($contar>0) {
                        flash('YA LA SECCIÓN SELECCIONADA SE ENCUENTRA ASIGNADA A UN DOCENTE!','error');
                            return redirect()->back();
                      }else{

                          //dd($request->all());
                            $asig=Asignaturas::where('id_curso',$request->id_curso)->get();
                            // $asig2[]=$asig;
                             //dd(count($asig));
                            for ($k=0; $k < count($asig) ; $k++) { 
                               
                               $crear=Docente_has_asignatura::create([
                              'id_personal' => $request->id_personal,
                              'id_asignatura' => $asig[$k]->id,
                              'id_seccion' => $request->id_seccion,
                              'id_periodo' => $periodo->id
                              ]);
                                //dd('sasas');
                            }
                           
                           flash('ASIGNACIÓN DE SECCIÓN A DOCENTE DE BÁSICA REALIZADO CON ÉXITO!','success');
                           return redirect()->route('admin.personalasignatura.listado');

                          }
                      break;

                      case ($id_curso > 7):
                        //es de media general
                      if (count($request->id_asignatura)==0) {
                          flash('DEBE SELECCIONAR AL MENOS UNA ASIGNATURA!','warning');
                            return redirect()->route('admin.personal_asignatura.index');
                      } else {
                        $contar=0;
                        foreach ($personal as $keys) {
                            foreach ($keys->asignacion_s as $key) {
                            for ($i=0; $i <count($request->id_asignatura) ; $i++) { 
                                
                              if($key->pivot->id_seccion==$request->id_seccion and $key->pivot->id_periodo==$periodo->id and $key->pivot->id_asignatura==$request->id_asignatura[$i]){
                                $contar++;

                              }  
                            }    
                          }
                        }
                        //verificando si ya estan asignadas todas las asignaturas de esta seccion  
                        $asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
                        $contar2=0;
                        foreach ($personal as $keys) {
                            foreach ($keys->asignacion_s as $key) {
                            
                              if($key->id_seccion==$request->id_seccion and $key->pivot->id_periodo==$periodo->id){
                                $contar2++;
                              }  
                                
                          }
                        }
                         
                      }
                      
                      if ($contar>0) {
                        flash('SELECCIONÓ ASIGNATURAS QUE YA SE ENCUENTRAN ASIGNADAS A OTROS DOCENTES!','error');
                      }
                      if($contar2==count($asignaturas)){
                            flash('YA LA SECCIÓN SELECCIONADA TIENEN ASIGNADAS TODAS LAS ASIGNATURAS A OTROS DOENTES!','error');  
                           
                        }
                        if ($contar2==count($asignaturas) || $contar>0) {
                            return redirect()->back();
                        
                        }else{
                          
                          for ($i=0; $i < count($request->id_asignatura) ; $i++) { 
                            $crear=Docente_has_asignatura::create([
                              'id_personal' => $request->id_personal,
                              'id_asignatura' => $request->id_asignatura[$i],
                              'id_seccion' => $request->id_seccion,
                              'id_periodo' => $periodo->id
                            ]);
                          }
                            

                          flash('ASIGNACIÓN DE ASIGNATURAS A DOCENTE DE MEDIA GENERAL REALIZADO DE FORMA EXITOSA!','success');
                          return redirect()->route('admin.personal_asignatura.index');

                        }
                      break;
                    
                    }


    }// Fin del store

    public function buscarseccionguia()
    {
        $personal=Personal::where('id_cargo',3)->get();
        $periodos=Periodos::lists('periodo','id');
        $seccion=Seccion::lists('seccion','id');
        return View('admin.personal_asignatura.asignarguia', compact('personal','periodos','seccion'));   
    }

    public function asignar(Request $request)
    {
        $periodo=Periodos::where('status','Activo')->get()->first();
        $guia=Guias::where('id_periodo',$periodo->id)->where('id_seccion',$request->id_seccion)->get();
        if (count($guia)>0) {
            flash('YA LA SECCIÓN SELECCIONADA TIENE ASIGNADO UN DOCENTE GUÍA !','error');
            return redirect()->route('admin.personal_asignatura.asignarguia')->withInput();
        } else {
            $guia=Guias::create(['id_personal' => $request->id_personal,
                                'id_seccion' => $request->id_seccion,
                                'id_periodo' => $periodo->id]);
            flash('DOCENTE ASIGNADO COMO GUÍA DE MANERA EXITOSA !','success');
            return redirect()->route('admin.personal_asignatura.guias')->withInput();
        }
        
    }

    public function listarguias()
    {

        $num=0;
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $guias=Guias::all();
        } else {
            $correo=\Auth::user()->email;
            $personal=Personal::where('correo',$correo)->first();
            $guias=Guias::where('id_personal',$personal->id)->get();
        }
        
        

        return view('admin.personal_asignatura.guias', compact('num','guias'));
    }

    public function editar_guia($id)
    {
        $guia=Guias::find($id);
        $cursos=Cursos::where('id','>',7)->lists('curso','id');
        $secciones=Seccion::where('id_curso',$guia->secciones->curso->id)->lists('seccion','id');

        return view('admin.personal_asignatura.editar_guia', compact('guia','cursos','secciones'));
    }

    public function actualizar_asignacion_mg(Request $request)
    {

        $periodo=Periodos::where('status','Activo')->first();
        $personal=Personal::find($request->id_personal);

          $hallada=0;
        foreach ($personal->asignacion_s as $key) {
          if ($key->pivot->id_seccion==$request->id_seccion and $key->pivot->id_periodo==$periodo->id) {
            $inscripcion=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$periodo->id)->get();
            foreach ($inscripcion as $key2) {
              $boletin=Boletin::where('id_datosBasicos',$key2->id_datosBasicos)->where('id_periodo',$periodo->id)->get();
              if (count($boletin)>0) {
                $hallada++;
              }
            }
                

          }
        }
        
        
        if ($hallada>0) {
          flash('NO ES POSIBLE ELIMINAR LA ASIGNACIÓN DEBIDO A QUE EL DOCENTE YA HA CARGADO CALIFICACIÓN EN DICHA SECCIÓN !','error');
            return redirect()->route('admin.personalasignatura.listado');
        }else{
          $personal=Personal::find($request->id_personal);
          $cont=0;
          foreach ($personal->asignacion_s as $key3) {
            
            if ($key3->pivot->id_seccion==$request->id_seccion and $key3->pivot->id_periodo==$periodo->id) {
                $personal->asignacion_s()->detach($request->id_seccion);
              //dd($key3->id);
                $cont++;
            }
          }
          if ($cont>0) {
            flash('ASIGNACIÓN ELIMINADA CON ÉXITO !','success');
            return redirect()->route('admin.personalasignatura.listado');
          } else {
            flash('ASIGNACIÓN NO FUE ELIMINADA CON ÉXITO !','error');
            return redirect()->route('admin.personalasignatura.listado');
          }
          
          
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
        
        $num=0;
        $guia=Guias::find($id);
        $inscripcion=Inscripcion::where('id_seccion',$guia->id_seccion)->where('id_periodo',$guia->id_periodo)->get();
        $seccion=Seccion::find($guia->id_seccion);
        $asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
        $id_periodo=$guia->id_periodo;
        $boletin=Boletin::where('id_periodo',$guia->id_periodo)->get();
        
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
              
              if ($key2[0]->id_asignatura==$key->id and $key2[0]->id_periodo==$guia->id_periodo) {
         
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

            return view('admin.personal_asignatura.vista_notas_cargadas', compact('num','guia','boletin','asignaturas','seccion','inscripcion','id_periodo','lapsos','lapso1','lapso2','lapso3'));
        
    }

    public function listadopreescolar()
    {
        $num=0;
        $periodo=Periodos::where('status','Activo')->first();

        $personal=Personal::where('id_cargo',5)->get();

        return view('admin.personal_asignatura.listadopreescolar', compact('num','personal','periodo'));      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        dd('asas');
        $personal=Personal::where('cedula',$request->cedula)->where('id','<>',$id)->get();

        $personal=Personal::find($id);
        //$personal->update($request->all());

        return redirect()->route('admin.personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $periodo=Periodos::where('status','Activo')->first();
        $personal=Personal::find($request->id_personal);

          $hallada=0;
        foreach ($personal->asignacion_s as $key) {
          if ($key->pivot->id_seccion==$request->id_seccion and $key->pivot->id_asignatura==$request->id_asignatura and $key->pivot->id_periodo==$periodo->id) {
            $inscripcion=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$periodo->id)->get();
            foreach ($inscripcion as $key2) {
              $boletin=Boletin::where('id_asignatura',$request->id_asignatura)->where('id_datosBasicos',$key2->id_datosBasicos)->where('id_periodo',$periodo->id)->get();
              if (count($boletin)>0) {
                $hallada++;
              }
            }
                

          }
        }
        
        
        if ($hallada>0) {
          flash('NO ES POSIBLE ELIMINAR LA ASIGNACIÓN DEBIDO A QUE EL DOCENTE YA HA CARGADO CALIFICACIÓN EN DICHA ASIGNATURA !','error');
            return redirect()->route('admin.personal_asignatura.index');
        }else{
          $personal=Personal::find($request->id_personal);
          $cont=0;

          foreach ($personal->asignacion_a as $key3) {
            
            if ($key3->pivot->id_seccion==$request->id_seccion and $key3->pivot->id_asignatura==$request->id_asignatura and $key3->pivot->id_periodo==$periodo->id) {
                $personal->asignacion_a()->detach($request->id_asignatura);
                $cont++;
            }
          }
          if ($cont>0) {
            flash('ASIGNACIÓN ELIMINADA CON ÉXITO !','success');
            return redirect()->route('admin.personal_asignatura.index');
          } else {
            flash('ASIGNACIÓN NO FUE ELIMINADA CON ÉXITO !','error');
            return redirect()->route('admin.personal_asignatura.index');
          }
          
          
        }
    }
}
