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
    
    public function store(Request $request)
    {
        
        if (!empty($request->seccion)) {
        $seccion=Seccion::where('seccion',$request->seccion)->where('id_curso',$request->id_curso)->get();
        
        if (count($seccion)==0) {

            $seccion=Seccion::create([
                'seccion' => $request->seccion,
                'id_curso' => $request->id_curso ]);
            flash('Registro ingresado con éxito','success');
        
        $secciones=Seccion::all();

        return View('admin.secciones.index',compact('secciones'));
        

        } else {
           
             flash('Disculpe la Sección ya ha sido asignada a ese curso','warning');
             $cursos=Cursos::lists('curso','id');
            return View('admin.secciones.create',compact('cursos'));  
        }
    
        } else {
            flash('Existe un campo obligatorio vacio','error');
           //return redirect('admin/secciones/create');            
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
}
