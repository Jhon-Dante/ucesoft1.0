<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deducciones;

use Laracast\Flash\Flash;

use App\Http\Requests;

class DeduccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deducciones=Deducciones::all();
        return View('admin.deducciones.index', compact('deducciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.deducciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buscar=Deducciones::where('deduccion',$request->deduccion)->get();

        $cuantos=count($buscar);
       
        if ($cuantos>0) {
            flash('Ya se encuentra registrada dicha deducción','error');
            $deducciones=Deducciones::all();
            return View('admin.deducciones.index',compact('deducciones'));

        } else {
            $deduccion=Deducciones::create(['deduccion' => $request->deduccion,
                                            'monto' => $request->monto]);
            flash('Deducción registrada exitosamente','success');
             $deducciones=Deducciones::all();
            return View('admin.deducciones.index',compact('deducciones'));


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
        $deduccion=Deducciones::find($id);

        return View('admin.deducciones.edit',compact('deduccion'));
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
        $buscar=Deducciones::where('deduccion',$request->deduccion)->where('id','<>',$id)->get();

        $cuantos=count($buscar);
       
        if ($cuantos>0) {
            flash('Ya se encuentra registrada dicha deducción','error');
            $deducciones=Deducciones::all();
            return View('admin.deducciones.index',compact('deducciones'));

        } else {
            $deduccion=Deducciones::find($id);
            $deduccion->deduccion=$request->deduccion;
            $deduccion->monto=$request->monto;
            $deduccion->save();
            flash('Deducción actualizada exitosamente','success');
             $deducciones=Deducciones::all();
            return View('admin.deducciones.index',compact('deducciones'));


        }

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
