<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mensualidades;
use App\Meses;
use App\Pagos;
use App\Periodos;
use Session;
class MensualidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::where('id',$id_periodo)->first();
        $meses=Meses::all();
        $mensualidades=Mensualidades::where('id_periodo',$periodo->id)->get();
        $estudiantes=Mensualidades::where('id_periodo',$periodo->id)->groupBy('id_datosBasicos')->get();
        //dd($mensualidades);
        
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

    public function contabilidad()
    {
        
    }
    public function store(Request $request)
    {

        //buscando el ultimo monto registrado para este mes
        $ultimo_monto_mes=Pagos::where('id_mes',$request->id_mes)->get()->last();
        //buscando el periodo con el que se inicio sesion
        $id_periodo=Session::get('periodo');
        $mensualidades=Mensualidades::where('id',$request->id)->first();
        dd($mensualidades->pagos);
        //registrando ulitmo pago actualizado del mes con el estudiante
        //$pagando=\DB::table('mensualidades_pagos')->insert(array('id_mensualidad' => , ););
        
        /*$mensualidades=Mensualidades::where('id',$request->id)->where('id_mes',$request->id_mes)->get()->first();

        if ($mensualidades->estado == 'Sin pagar') {
            $mensualidades->estado = 'Cancelado';
            $mensualidades->forma_pago=$request->forma_pago;
            $mensualidades->codigo_operacion=$request->codigo_operacion;
            $mensualidades->save();

           flash('MENSUALIDAD CANCELADA CON ÉXITO!','success');
        }
        else
        {
            flash('LA MENSUALIDAD YA ESTÁ PAGADA!','alert');
        }

        return redirect()->route('admin.mensualidades.index');*/
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
       
    }

    public function buscar($id)
    {
        return $x=\DB::select('select mensualidades.*,meses.mes,datos_basicos.nombres,datos_basicos.apellidos,periodos.periodo from mensualidades,meses,periodos,datos_basicos where mensualidades.id_periodo=periodos.id and mensualidades.id_datosBasicos = datos_basicos.id and mensualidades.id='.$id);
        
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
        $mensualidad=Mensualidades::find($request->id_mensualidad);
//dd($request->forma_pago);
        $mensualidad->forma_pago=$request->forma_pago;
        $mensualidad->codigo_operacion=$request->codigo_operacion;

        $mensualidad->save();

        flash('MENSUALIDAD ACTUALIZADA CON ÉXITO!','success');

        return redirect()->route('admin.mensualidades.index');
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
