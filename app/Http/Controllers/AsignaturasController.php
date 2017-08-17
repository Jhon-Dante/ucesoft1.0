<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asignaturas;
use App\Cursos;
use Laracasts\Flash\flash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AsignaturasRequest;
use Validator;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a=Asignaturas::all();
        $num=0;
        $asignaturas=Asignaturas::all();
        return View('admin.asignaturas.index', compact('asignaturas','num','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos=Cursos::lists('curso','id');
        return View('admin.asignaturas.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturasRequest $request)
    {
        $buscar=Asignaturas::where('asignatura',$request->asignatura)->where('id_curso',$request->id_curso)->get();

        if (count($buscar)==0) {
            $asignatura=Asignaturas::create([
                'asignatura' => $request->asignatura,
                'id_curso' => $request->id_curso
                ]);
            flash('ASIGNATURA '.$request->asignatura.' EN EL CURSO '.$request->curso.' HAN SIDO REGISTRADOS CON ÉXITO!', 'success');
        } else {
            flash('DISCULPE, LA ASIGNATURA '.$request->asignatura.' EN EL CURSO '.$request->curso.' YA SE ENCUENTRA ACTUALMENTE REGISTRADOS!','warning');
        }
        $num=0;
        $asignaturas=Asignaturas::all();
        return redirect()->route('admin.asignaturas.index', compact('asignaturas','num'));
        
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
        $asignaturas=Asignaturas::find($id);
        $cursos=Cursos::lists('curso','id');
        return View('admin.asignaturas.edit', compact('cursos','asignaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturasRequest $request, $id)
    {
        $asignaturas=Asignaturas::where('asignatura',$request->asignatura)->where('id','<>',$id)->get();

        if (count($asignaturas)==0) {
            $asignaturas=Asignaturas::find($id);
            $asignaturas->asignatura=$request->asignatura;
            $asignaturas->id_curso=$request->id_curso;
            $asignaturas->update();

            flash('REGISTRO EDITADO CON ÉXITO','success');
        } else {
            flash('REGISTRO NO EDITADO','warning');
        }

        return redirect()->route('admin.asignaturas.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $asignaturas=Asignaturas::find($request->id);

        if ($asignaturas->cursos()->exists()) {
            flash('EXISTEN CURSOS ASIGNADOS A ESTA MATERIA, NO SE PUEDE ELIMINAR! ELIMINE EL CURSO PRIMERO', 'warning');
        } else {
            $x=$asignaturas->asignatura;
            if($asignaturas->delete()){
                flash('REGISTRO DE ASIGNATURA '.$request->asignatura.' ELIMINADO CON ÉXITO!', 'success');
            }else{
                flash('REGISTRO NO ELIMINADO!','warning');

            }
        }
        return redirect()->route('admin.asignaturas.index');
        
    }
}
