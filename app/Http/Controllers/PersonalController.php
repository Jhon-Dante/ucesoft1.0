<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Personal;
use App\Cargos;
use Laracast\Flash\Flash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $personal=Personal::all();
        $cargo=Cargos::lists('id','cargo');
        return View('admin.personal.index', compact('personal','cargo','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $buscar=Personal::where('cedula', $request->cedula)->get();

        $cuantos=count($buscar);

        if ($cuantos>0) {
            flash('Este personal ya se encuentra registrado','warning');
            $num=0;
            $personal=Personal::all();
        return View('admin.personal.index', compact('personal','num'));

        } else {
            $perso=Personal::create([
                'nombres'          =>$request->nombres,
                'apellidos'        =>$request->apellidos,
                'nacio'            =>$request->naciomalidad,
                'cedula'           =>$request->cedula,
                'fecha_nacimiento' =>$request->fecha_nacimiento,
                'fecha_ingreso'    =>$request->fecha_ingreso,
                'edad'             =>$request->edad,
                'edo_civil'        =>$request->edo_civil,
                'direccion'        =>$request->direccion,
                'genero'           =>$request->genero,
                'codigo_hab'       =>$request->codigo_hab,
                'telf_hab'         =>$request->telf_hab,
                'codigo_cel'       =>$request->codigo_cel,
                'celular'          =>$request->celular,
                'correo'           =>$request->correo,
                'id_cargo'         =>$request->id_cargo]);

            flash('Personal registrado con éxito','success');
            $num=0;
            $personal=Personal::all();
            return View('admin.personal.index', compact('personal','num'));
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
