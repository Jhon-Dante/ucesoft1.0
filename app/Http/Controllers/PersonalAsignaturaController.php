<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asignaturas;
use App\Personal;
use App\Periodos;
use App\Seccion;
use App\Cursos;
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
        //dd($personal->asignacion_a);
        
        return View('admin.personal_asignatura.index', compact('personal','num'));
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
        dd($request->id_docente);
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
        $personal=Personal::where('cedula',$request->cedula)->where('id','<>',$id)->get();

        $personal=Personal::find($id);
        $personal->update($request->all());

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
