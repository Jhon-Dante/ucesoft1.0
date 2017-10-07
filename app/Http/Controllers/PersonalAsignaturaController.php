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
        $personal=Personal::where('id_cargo','<>',1)->where('id_cargo','<>',2)->get();
        
        
        return View('admin.personal_asignatura.listado', compact('personal','num'));   
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

        $periodo=Periodos::where('status','Activo')->get()->first();
        $personal=Personal::all();
        $id_curso=$request->id_curso;
        switch($id_curso){
                      

                      case ($id_curso >= 1 && $id_curso <=7):
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

        $guias=Guias::all();

        return view('admin.personal_asignatura.guias', compact('num','guias'));
    }

    public function editar_guia($id)
    {
        $guia=Guias::find($id);
        $cursos=Cursos::where('id','>',7)->lists('curso','id');
        $secciones=Seccion::where('id_curso',$guia->secciones->curso->id)->lists('seccion','id');

        return view('admin.personal_asignatura.editar_guia', compact('guia','cursos','secciones'));
    }

    public function actualizar_signar(Request $request,$id)
    {
        dd($request->all());
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
    public function destroy($id)
    {
        
    }
}
