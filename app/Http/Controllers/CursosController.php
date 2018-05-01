<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cursos;
use Laracasts\Flash\Flash;
use App\Http\Requests\CursosRequest;
use Redirect;
use App\Auditoria;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accion='Se Mostraron la lista de cursos registrados'; 
        $this->auditoria($accion);
        $num=0;
        $cursos=Cursos::all();
        return View('admin.cursos.index',compact('cursos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursosRequest $request)
    {
        //dd($request->all());


            $cursos=Cursos::where('curso',$request->curso)->get();
            //dd(count($cursos));
            if (count($cursos)==0) {
                $cursos=Cursos::create(['curso' => $request->curso]);
                if($cursos){
                     $accion='Se registro el curso '.$request->curso; 
                    flash("SE HA REGISTRADO DE FORMA EXITOSA!", 'success');
                }else{
                     $accion='No se pudo registrar el curso '.$request->curso;
                    flash("DISCULPE, NO SE PUDO REALIZAR EL REGISTRO", 'error');
                }
            }

        $this->auditoria($accion);
        return redirect()->route('admin.cursos.index');
        
        
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
        $curso=Cursos::find($id);
        return View('admin.cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursosRequest $request, $id)
    {
    
            $cursos=Cursos::where('curso',$request->curso)->where('id','<>',$id)->get();
            //dd(count($cursos));
            if (count($cursos)==0) {
                $cursos=Cursos::find($id);
                $cursos->curso=$request->curso;
                $cursos->save();
                $accion='Se actualizó el curso '.$request->curso;
                    $this->auditoria($accion);
                    flash("SE HA ACTUALIZADO DE FORMA EXITOSA!", 'success');
            }
           return redirect()->route('admin.cursos.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $curso=Cursos::find($request->id);
         $c=$curso->curso;
        if($curso->seccion()->exists()){
            $accion='No se pudo eliminar el curso '.$c;
            
            flash('EXISTEN SECCIONES CREADAS PARA ESTE CURSO, NO SE PUEDE ELIMINAR.','warning');
        }else{
            $c=$curso->curso;
            if($curso->delete()){
                 $accion='Se eliminó el curso '.$c;
            flash('CURSO '.$c.' ELIMINADO CON ÉXITO.','success');
            }else{
                 $accion='No se pudo eliminar el curso '.$c;
            flash('CURSO '.$c.' NO ELIMINADO.','warning');
            }
        }
            $this->auditoria($accion);
            return redirect()->route('admin.cursos.index');       

    }

    private function auditoria($accion)
    {
        $auditoria=Auditoria::create([
                    'id_user' => \Auth::user()->id,
                    'accion' => $accion
                ]);
    }
}
