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
        $opcion=0;
        $representantes=Representantes::all();
        $padres=Padres::all();
        $datosBasicos=DatosBasicos::all();
        $id_estudiante=0;
        $parentescos=Parentesco::where('parentesco','Padre')->where('parentesco','Madre')->get()->lists('parentesco','id');
                
        return View('admin.datosBasicos.create', compact('representantes','parentescos','padres','opcion','datosBasicos','id_estudiante'));
    }

    public function buscarEstudiante(Request $request)
    {
        $opcion=0;
        $representantes=Representantes::all();
        $padres=Padres::all();
        $datosBasicos=DatosBasicos::all();
        $datosBasicos2=DatosBasicos::find($request->id_estudiante);
        $id_estudiante=$datosBasicos2->id;
        $parentescos=Parentesco::where('parentesco','Padre')->where('parentesco','Madre')->get()->lists('parentesco','id');
                
        return View('admin.datosBasicos.reinscribir', compact('representantes','parentescos','padres','opcion','datosBasicos','id_estudiante','datosBasicos2'));    
    }

    public function reinscribir(Request $request)
    {
        
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
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'lugar_nac' => $request->lugar_nac,
                'estado' => $request->estado,
                'fecha_nac' => $request->fecha_nac,
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'peso' => $request->peso,
                'talla' => $request->talla,
                'salud' => $request->salud,
                'direccion' => $request->direccion,
                'id_padre' => $request->id_padre,
                'padre_vive' => $request->padre_vive,
                'id_madre' => $request->id_madre,
                'madre_vive' => $request->madre_vive
                ]);
            flash('Estudiante registrado con éxito','success');
            $num=0;
            $datosBasicos=DatosBasicos::all();
            return View('admin.datosBasicos.index', compact('datosBasicos','num'));
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
