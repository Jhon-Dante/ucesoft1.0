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
        // dd($personal->asignacion_a);
        
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

        $periodo=Periodos::where('status','Activo')->get()->first();
        $personal=Personal::all();
        

            foreach ($personal as $p) {
                
                        
                        if (count($p->asignacion_pe) > 0 && count($p->asignacion_p) > 0 && count($p->asignacion_s) > 0) {
                        flash('DISCULPE, YA EXISTE UN DOCENTE REGISTRADO EN ESTE CURSO CON LA(S) MISMA(S) MATERIAS(A) JUNTO CON LA SECCIÓN. ELIJA OTRO DOCENTE O ELIMINE EL ACTUAL','warning');

                        
                        return redirect()->route('admin.personal_asignatura.create')->withInput();

                        }else{

                            for($i=0;$i<count($request->id_asignatura);$i++){
                                $crear=\DB::table('personal_has_asignatura')->insert(array(
                                    'id_personal' => $request->id_personal,
                                    'id_asignatura' => $request->id_asignatura[$i],
                                    'id_seccion' => $request->id_seccion,
                                    'id_periodo' => $periodo->id));
                            }//Fin del for

                            flash('REGISTRO DE CARGA ACADÉMICA REALIZADA CON ÉXITO!','success');
                            return redirect()->route('admin.personal_asignatura.index');

                        }//Fin del else         
                
            }//fin del foreach $p
    }// Fin del store

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
