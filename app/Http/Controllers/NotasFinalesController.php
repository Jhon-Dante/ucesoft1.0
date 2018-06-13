<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Http\Requests\DatosBasicosRequest;
use App\Padres;
use App\DatosBasicos;
use App\Representantes;
use App\Asignaturas;
use App\Recaudos;
use App\Parentesco;
use App\AsignaturasPreinscripcion;
use App\Preinscripcion;
use App\Periodos;
use App\Seccion;
use App\Cursos;
use App\Inscripcion;
use App\Mensualidades;
use App\AsignaturasPendientes;
use App\User;
use App\Calificaciones;
use App\Boletin;
use App\Pagos;
use Session;
use App\Auditoria;
use App\BoletinFinal;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class NotasFinalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $periodo=Session::get('periodo');
        $inscripcion=Inscripcion::where('id_periodo',$periodo)->get();
        $BoletinFinal=BoletinFinal::where('id_periodo',$periodo)->groupBy('id_datosBasicos')->get();
        return view('admin.calificaciones.notas_finales.index', compact('num','BoletinFinal','inscripcion'));
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
