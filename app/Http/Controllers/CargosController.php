<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargos;
use App\Tipo;
use App\Http\Requests;
use Session;
use Auth;
use App\Http\Requests\CargosRequest;

class CargosController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargos::all();
        $num = 0;
        
        return view('admin.cargos.index', compact('cargos', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tipo = Tipo::lists('tipo', 'id');
        return view('admin.cargos.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargosRequest $request)
    {

        $buscar=Cargos::where('cargo',$request->cargo)->where('id_tipo_personal',$request->id_tipo_personal)->get();
        $cuantos=count($buscar);
        if($cuantos==0){
        $cargo = new Cargos();
        $cargo->cargo = strtoupper($request->cargo);
        $cargo->id_tipo_personal = $request->id_tipo_personal;

        $cargo->save();

        flash('CARGO REGISTRADO CORRECTAMENTE','success');
        }else{
            flash('EL CARGO YA SE ENCUENTRA REGISTRADO A ESTE PERSONAL','warning');
        }
        $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos'));

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
        $cargo = Cargos::find($id);
        $tipo = Tipo::lists('tipo', 'id');
        return view('admin.cargos.edit', compact('cargo', 'tipo'));
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
    	$buscar=Cargos::where('cargo',$request->cargo)->where('id','<>',$id)->where('id_tipo_personal',$request->id_tipo_personal)->get();
    	$cuantos=count($buscar);
	    	if($cuantos==0){
		        $cargo = Cargos::find($id);
		        $cargo->cargo = strtoupper($request->cargo);
                $cargo->id_tipo_personal=$request->id_tipo_personal;
		        $cargo->save();

		        flash('CARGO EDITADO CORRECTAMENTE','success');
	    	}else{
	    		flash('ESTE CARGO YA EXISTE','warning');
	    	}
        $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $cargo = Cargos::find($request->id);
        //$cargo->personal()->exists()
        $x=false;
        if($x){

            flash('EL CARGO NO SE PUEDE ELIMINAR PORQUE POSEE PERSONAL EN ALGÚN PERIODO','warning');

 	        $cargos = Cargos::all();
        	return view('admin.cargos.index', compact('cargos'));
        } else {

            $cargo->delete();

            flash(' SE HA ELIMINADO EL CARGO '.$cargo->cargo.' CORRECTAMENTE.','success');

            $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos'));

        }
    }
}
