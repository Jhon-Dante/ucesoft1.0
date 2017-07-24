<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Periodos;
use Laracasts\Flash\Flash;
use App\Http\Requests\PeriodoRequest;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $periodos=Periodos::all();
        return View('admin.periodos.index', compact('periodos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.periodos.create');
    }

    /**D
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodoRequest $request)
    {
        //dd($request->periodo);
        $buscar=Periodos::where('periodo',$request->periodo)->get();

        $cuantos=count($buscar);

        if ($cuantos>0) {
            flash('Periodo ya registrado','warning');
            $num=0;
            $periodos=Periodos::all();
            return View('admin.periodos.index', compact('periodos','num'));
        } else {

            $periodo=Periodos::create(['periodo' => $request->periodo,'status' => 'Inactivo']);
            flash('Periodo registrado con éxito, para validaciones generales dicho periodo será registrado como INACTIVO','success');
            $num=0;
            $periodos=Periodos::all();
            return View('admin.periodos.index', compact('periodos','num'));
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
        $periodo1 = Periodos::find($id);

        if ($periodo1->status=="Activo") {
            $periodo1->status="Inactivo";
            $periodo1->save();

            flash('Perido Cambiado a Inactivo','success');
            $num=0;
            $periodos=Periodos::all();

            return View('admin.periodos.index', compact('periodos','num'));
            } else {
            $buscar=Periodos::where('status','Activo')->get();
            $contar=count($buscar);

            if($contar>0){

                    foreach ($buscar as $b) {
                        $id_periodo=$b->id;
                    }

                    $periodo = Periodos::find($id_periodo);
                    $periodo->status="Inactivo";
                    $periodo->save();
            }

            $periodo1->status="Activo";
            $periodo1->save();


            flash('Perido Cambiado a Activo, considerando que el periodo que estaba activo anteriormente se coloco como Inactivo','success');
            $num=0;
            $periodos=Periodos::all();

            return View('admin.periodos.index', compact('periodos','num'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodoRequest $request, $id)
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
