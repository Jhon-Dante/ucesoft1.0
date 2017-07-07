<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DatosBasicos;

use App\Representantes;

use Laracast\Flash\Flash;

class DatosBasicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $datosBasicos=DatosBasicos::all();
        return View('admin.DatosBasicos.index', compact('datosBasicos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representante=Representantes::lists('nombres','id');
        return View('admin.datosBasicos.create', compact('representante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buscar=DatosBasicos::where('cedula',$request->cedula)->get();

        $cuantos=conunt($buscar);

        if ($cuanto>0) {
            flash('Este estudiante ya se encuentra registrado','warning');
            $datosBasicos=DatosBasicos::all();
            return View('admin.datosBasicos.index', compact('datosBasicos'));
        } else {
            $datoBasico=DatosBasicos::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'nacionalidad' => $request->nacionalidad,
                'cedula' => $request->cedula,
                'direccion' => $request->direccion,
                'nacimiento' => $request->nacimiento
                ]);
            flash('Estudiante registrado con éxito','success');
            $datosBasicos=DatosBasicos::all();
            return View('admin.datosBasicos.index', compact('datosBasicos'));
        }
        
    }

    public function verificarPadre($cedula){

        dd("DWD");

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
