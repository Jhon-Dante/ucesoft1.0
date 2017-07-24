<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cursos;
use Laracasts\Flash\Flash;
use App\Http\Requests\CursosRequest;
use Redirect;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
                    flash("SE HA REGISTRADO DE FORMA EXITOSA!", 'success');
                }else{
                    flash("DISCULPE, NO SE PUDO REALIZAR EL REGISTRO", 'error');
                }
            }
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
         
        if($curso->seccion()->exists()){
            flash('EXISTEN SECCIONES CREADAS PARA ESTE CURSO, NO SE PUEDE ELIMINAR.','warning');
        }else{
            $c=$curso->curso;
            if($curso->delete()){
            flash('CURSO '.$c.' ELIMINADO CON ÉXITO.','success');
            }else{
            flash('CURSO '.$c.' NO ELIMINADO.','warning');
            }
        }
            return redirect()->route('admin.cursos.index');       

    }
}
