<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Padres;
use App\DatosBasicos;
use App\Representantes;
use Laracast\Flash\Flash;
use App\Http\Requests\DatosBasicosRequest;
use Validator;
use App\Parentesco;

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
        $representantes=Representantes::all();
        $padres=Padres::all();
        $parentescos=Parentesco::where('parentesco','Padre')->where('parentesco','Madre')->get()->lists('parentesco','id');
        return View('admin.datosBasicos.create', compact('representantes','parentescos','padres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosBasicosRequest $request)
    {
        $buscar=DatosBasicos::where('cedula',$request->cedula)->get();

        $cuantos=count($buscar);

        if ($cuantos>0) {
            flash('Este estudiante ya se encuentra registrado','warning');
            $datosBasicos=DatosBasicos::all();
            return View('admin.datosBasicos.index', compact('datosBasicos'));
        } else {
            $datoBasico=DatosBasicos::create([
                'nacionalidad' => $request->nacionalidad,
                'cedula' => $request->cedula,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'lugar_nac' => $request->lugar_nac,
                'estado' => $request->estado,
                'nacimiento' => $request->nacimiento,
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'peso' => $request->peso,
                'talla' => $request->talla,
                'salud' => $request->salud,
                'direccion' => $request->direccion,
                'nombre_p' => $request->nombre_p,
                'cedula_p' => $request->cedula_p,
                'vive_p' => $request->vive_p,
                'nombre_m' => $request->nombre_m,
                'cedula_m' => $request->cedula_m,
                'vive_m' => $request->vive_m
                ]);
            flash('Estudiante registrado con éxito','success');
            $num=0;
            $datosBasicos=DatosBasicos::all();
            return View('admin.datosBasicos.index', compact('datosBasicos','num'));
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
        $representante=Representantes::lists('nombres','id');
        return View('admin.datosBasicos.edit', compact('representante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DatosBasicosRequest $request, $id)
    {
        $buscar=DatosBasicos::where('cedula',$request->cedula)->where('id','<>',$id)->where('id_representante',$request->id_representante)->get();
        $cuantos=count($buscar);
        if ($cuantos==0) {
            $datosBasicos=DatosBasicos::find($id);
            $datosBasicos->update($request->all());

        flash('ESTUDIANTE EDITADO CON ÉXITO!', 'success');

        } else {
        flash('ESTE ESTUDIANTE YA EXISTE!', 'warning');

        }
        $num=0;
        $datosBasicos=DatosBasicos::all();
        return View('admin.DatosBasicos.index', compact('datosBasicos','num'));
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $representante=Representantes::find($request->id);
        $r=false;

        if ($r) {
            flash('EL ESTUDIANTE NO SE PUEDE ELIMINAR, DEBIDO A QUE POSEE UN REPRESENTANTE ENLAZADO AL REGISTRO, ELIMINE AL REPRESENTANTE PRIMERO!', 'warning');

        $num=0;
        $datosBasicos=DatosBasicos::all();
        return View('admin.DatosBasicos.index', compact('datosBasicos','num'));
       
        } else {

            $datosBasicos->delete();

            flash('REGISTRO DEL ESTUDIANTE '.$datosBasicos->nombre.' ELIMINADO CON ÉXITO!','success');

            $num=0;
        $datosBasicos=DatosBasicos::all();
        return View('admin.DatosBasicos.index', compact('datosBasicos','num'));

        }
        
    }
}
