<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Validaciones;
use App\Seccion;
use App\Cursos;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Http\Requests\SeccionesRequest;

class SeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $num=0;
        $secciones=Seccion::all();
        return View('admin.secciones.index', compact('secciones','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cursos=Cursos::lists('curso','id');
        return View('admin.secciones.create', compact('cursos'));   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(SeccionesRequest $request)
    {
        
        $seccion=Seccion::where('seccion',$request->seccion)->where('id_curso',$request->id_curso)->get();
        
        if (count($seccion)==0) {

            $seccion=Seccion::create([
                'seccion' => $request->seccion,
                'id_curso' => $request->id_curso ]);
            flash('REGISTRO INGRESADO CON ÉXITO!','success');
        
        return redirect()->route('admin.secciones.index');
        

        } else {
           
             flash('DISCULPE, LA SECCIÓN YA HA SIDO ASIGNADA A ESTE CURSO','warning');
            return redirect()->route('admin.secciones.create');  
        }

        return redirect()->route('admin.secciones.index', compact('secciones','num'));
        
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
        $seccion=Seccion::find($id);
        $cursos=Cursos::lists('curso','id');
        return View('admin.secciones.edit', compact('seccion','cursos'));
        //dd();
    }
    /**
     * Update the specified resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeccionesRequest $request, $id)
    {
        $seccion=Seccion::where('seccion',$request->seccion)->where('id','<>',$id)->where('id_curso',$request->id_curso)->get();

        if (count($seccion)==0){
            $seccion=Seccion::find($id);
            $seccion->seccion=$request->seccion;
            $seccion->id_curso=$request->id_curso;
            $seccion->save();

                flash("SE HA ACTUALIZADO DE FORMA EXITOSA!",'success');
        }else{
                flash("DISCULPE, YA EXISTE UN REGISTRO CON ESA MISMA SECCION Y CURSO");
        }
        return redirect()->route('admin.secciones.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $seccion=Seccion::find($request->id);

        if ($seccion->cursos()->exists()) {
            flash('EXISTEN REGISTROS CON ESTA SECCIÓN, NO SE PUEDE ELIMINAR');
        }else {
            $s=$seccion->seccion;
            if ($curso->delete()) {
                flash('SECCION '.$s.' ELIMINADO CON ÉXITO!','success');
            } else {
                flash('SECCION '.$S.' No eliminado.','warning');
            }
        }
        return redirect()->route('admin.secciones.index');
    }
    public function editarStatus($id)
    {
        $seccion=Seccion::find($id);
        //dd($asigna->status);

        if ($seccion->status==1) {
            $seccion->status=2;
            $seccion->save();

            flash('El status de la sección '.$seccion->seccion.' ha sido cambiado a inactivo','warning');
        }else{
            $seccion->status=1;
            $seccion->save();

            flash('El status de la sección '.$seccion->seccion.' ha sido cambiado a Activo','success');
        }
        return redirect()->back();
    }
}
