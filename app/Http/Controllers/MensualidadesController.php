<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mensualidades;
use App\Meses;
use App\Periodos;

class MensualidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo=Periodos::where('status','Activo')->first();
        $meses=Meses::all();
        $mensualidades=Mensualidades::where('id_periodo',$periodo->id)->get();
        $estudiantes=Mensualidades::where('id_periodo',$periodo->id)->groupBy('id_datosBasicos')->get();
        $num=0;
        return View('admin.mensualidades.index',compact('num','mensualidades','meses','estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.mensualidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mensualidades=Mensualidades::where('id',$request->id)->where('id_mes',$request->id_mes)->get()->first();

        if ($mensualidades->estado == 'Sin pagar') {
            $mensualidades->estado = 'Cancelado';
            $mensualidades->save();

           flash('MENSUALIDAD CANCELADA CON ÉXITO!','success');
        }
        else
        {
            flash('LA MENSUALIDAD YA ESTÁ PAGADA!','alert');
        }

        return redirect()->route('admin.mensualidades.index');
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
