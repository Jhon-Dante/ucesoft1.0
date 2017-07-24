<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargos;
use App\Http\Requests;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
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
        return view('admin.cargos.create');
    }

    public function store(CargosRequest $request)
    {
            
            $buscar=Cargos::where('cargo',$request->cargo)->get();
            $cuantos=count($buscar);
            if($cuantos==0){
                $cargo = new Cargos();
                $cargo->cargo = strtoupper($request->cargo);

                $cargo->save();

                flash('CARGO REGISTRADO CORRECTAMENTE','success');
            }else{
                flash('EL CARGO YA SE ENCUENTRA REGISTRADO A ESTE PERSONAL','warning');
            }    
       
         
        $num=0;
        $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos','num'));

    }
    public function messages(){

        return [
            'cargo.required' => 'A sasas is required'
        ];
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
        return view('admin.cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargosRequest $request, $id)
    {
    	$buscar=Cargos::where('cargo',$request->cargo)->where('id','<>',$id)->get();
    	$cuantos=count($buscar);
	    	if($cuantos==0){
		        $cargo = Cargos::find($id);
		        $cargo->cargo = strtoupper($request->cargo);
		        $cargo->save();

		        flash('CARGO EDITADO CORRECTAMENTE','success');
	    	}else{
	    		flash('ESTE CARGO YA EXISTE','warning');
	    	}
            $num=0;
        $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos','num'));
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
            $num=0;
 	        $cargos = Cargos::all();
        	return view('admin.cargos.index', compact('cargos','num'));
        } else {

            $cargo->delete();

            flash(' SE HA ELIMINADO EL CARGO '.$cargo->cargo.' CORRECTAMENTE.','success');
            $num=O;
            $cargos = Cargos::all();
        return view('admin.cargos.index', compact('cargos','num'));

        }
    }
}
