<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\asignaturas;
use App\DatosBasicos;
use App\Boletin;
use App\Calificaciones;
use App\Preinscripcion;
use App\Inscripcion;
use App\Asignaturas_inscripcion;
use App\AsignaturasPendientes;
use App\AsignaturasPendientesFinal;
use App\AsignaturasPreinscripcion;
use App\Periodos;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class RemedialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $periodo=Periodos::where('status','Activo')->first();
        $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->get();
        $boletin=Boletin::where('calificacion','D')->where('calificacion','E')->where('id_periodo',$periodo->id)->get();
        $boletin2=Boletin::where('calificacion','<',10)->where('id_periodo',$periodo->id)->get();
        $momentos=Calificaciones::all();
        $pendientes=AsignaturasPendientes::all();
        $pendientesPre=AsignaturasPreinscripcion::all();



        return View('admin.remediales.index', compact('num','inscripcion','periodo','boletin','boletin2','momentos','pendientes','pendientesPre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
