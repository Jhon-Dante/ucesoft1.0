<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Inscripcion;
use App\DatosBasicos;
use App\Momentos;
use App\Calificaciones;
use App\Periodos;
use App\Boletin;
use App\Asignaturas;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        $num=0;
        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('asdasdsdas');
    }

    public function crear($id_inscripcion, $id_periodo)
    {
    	// dd($id_inscripcion);
    	$inscripcion=Inscripcion::where('id_datosbasicos',$id_inscripcion)->get()->first();
    	$asignaturas=Asignaturas::all();
       	$datobasico=DatosBasicos::where('id',$id_inscripcion)->get()->first();
       	$periodos=Periodos::where('id',$id_periodo)->get()->first();
       	$boletin=Boletin::all();
       	$cali=count(Boletin::where('id_datosBasicos',$id_inscripcion)->where('id_periodo',$id_periodo)->get();
        if (count($cali)==null) {
           $cali=0;
        }
        $boleta=Boletin::where('id_datosBasicos'$id_inscripcion)->where('id_periodo',$id_periodo)->get();
        
       return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','asignaturas','inscripcion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $datobasico=DatosBasicos::where('id',$request->id_datosBasicos)->get()->first();
        if ($request->inasistencias > 0) {
           flash('DISCULPE, LAS INASISTENCIAS DEBEN SER NÚMEROS ENTEROS','warning');
           return redirect()->route('admin.crearlapso',['id_inscripcion' => $request->id_datosBasicos,'id_periodo' => $request->id_periodo])->withInput();
        }else{

        		for($i=0;$i<count($request->id_asignatura);$i++){
                       $crear=Boletin::create([
                    'id_asignatura' => $request->id_asignatura[$i],
                    'lapso' => 1,
                    'inasistencias' => $request->inasistencias[$i],
                    'calificacion' => $request->calificacion[$i],
                    'id_datosBasicos' => $request->id_datosBasicos,
                    'id_periodo' => $request->id_periodo,
                    'sugerencias' => 0
                	]);
                }

                flash('REGISTRO DE NOTAS DE LAPSO DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');
            }
        $cali=count(Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get());
        if (count($cali)==null) {
           $cali=0;
        }
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        $num=0;
        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin'));
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
