<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\flash;
use Illuminate\Support\Facades\Session;
use App\NBloques;

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

class BloquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $K=-1;
        // dd($request->all());
        for ($i=0; $i <= count($request->nb); $i++) { 
            if($request->nb[$i]>4){
                flash('LOS NÚMEROS DE BLOQUES NO PUEDEN SUPERAR LAS 4 HORAS!','warning');
                return redirect()->back();
            }else{
                $nbloques=NBloques::where('id_asignatura',$request->id_asignatura[$i])->update(['n_bloques' =>$request->nb[$i]]);
            }
            $K++;
        }
        // dd(count($request->id_asignatura),$K);
        if(count($request->id_asignatura)==$K){
            flash('NÚMERO DE BLOQUES ACTUALIZADO CON ÉXITO!','success');
        }
        return redirect()->back();

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
