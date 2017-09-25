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

class PreescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inscripcion=Inscripcion::all();
        $calificaciones=Calificaciones::all();
        $num=0;
        return View('admin.preescolar.index', compact('num','inscripcion','calificaciones'));
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

       $datobasico=DatosBasicos::where('id',$id_inscripcion)->get()->first();
       $periodos=Periodos::where('id',$id_periodo)->get()->first();
       $calificaciones=Calificaciones::all();
       $cali=count(Calificaciones::where('id_datosBasicos',$id_inscripcion)->where('id_periodo',$id_periodo)->get());
        if (count($cali)==null) {
           $cali=0;
        }
        
       return View('admin.preescolar.create', compact('datobasico','periodos','calificaciones','cali'));
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
        if (strLen($request->juicios)<=2) {
           flash('DISCULPE, JUICIO DEBE SER MAYOR A 200 CARÁCTERES','warning');
           return redirect()->route('admin.crearmomento',['id_inscripcion' => $request->id_datosBasicos,'id_periodo' => $request->id_periodo])->withInput();
        }else{

            if (strLen($request->sugerencias)<=7) {
                    flash('DISCULPE, SUGERENCIAS DEBE SER MAYOR A 70 CARÁCTERES','warning');
                    return redirect()->route('admin.crearmomento',['id_inscripcion' => $request->id_datosBasicos,'id_periodo' => $request->id_periodo])->withInput();

            }else{
                $calif=Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->get()->first();
                
                if ($calif == 0) {
                    
                    $crear=Calificaciones::create([
                        'nro_reportes' => 1,
                        'juicios' => $request->juicios,
                        'sugerencia' => $request->sugerencias,
                        'id_datosBasicos' => $request->id_datosBasicos,
                        'id_periodo' => $request->id_periodo
                    ]);

                    flash('REGISTRO DE JUICIOS Y SUGERENCIAS DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');

                }else{

                    $crear=Calificaciones::create([
                        'nro_reportes' => $calif->nro_reportes+1,
                        'juicios' => $request->juicios,
                        'sugerencia' => $request->sugerencias,
                        'id_datosBasicos' => $request->id_datosBasicos,
                        'id_periodo' => $request->id_periodo
                    ]);

                    flash('REGISTRO DE JUICIOS Y SUGERENCIAS DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');
                }
            }
        }
        $cali=count(Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get());
        if (count($cali)==null) {
           $cali=0;
        }
        $calificaciones=Calificaciones::all();
        $inscripcion=Inscripcion::all();
        $num=0;
        return View('admin.preescolar.index', compact('num','inscripcion'));
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
