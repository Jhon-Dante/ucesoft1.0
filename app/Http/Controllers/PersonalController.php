<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Personal;
use App\Cargos;
use App\Tipo;
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
        $personal=Personal::all();
        $cargo=Cargos::lists('id','cargo');
        return View('admin.personal.index', compact('personal','cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargos::lists('cargo','id');
        $tipos = Tipo::lists('tipo','id');
        return View('admin.personal.create',compact('cargos','tipos'));
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
            $personal=Personal::all();
        return View('admin.personal.index', compact('personal'));

        } else {
            $perso=Personal::create([
                'nombres'       =>$request->nombres,
                'apellidos'     =>$request->apellidos,
                'nacio'         =>$request->nacio,
                'cedula'        =>$request->cedula,
                'direccion'     =>$request->direccion,
                'tenencia'      =>$request->tenencia,
                'nacimiento'    =>$request->nacimiento,
                'edad'          =>$request->edad,
                'sexo'          =>$request->sexo,
                'edo_civil'     =>$request->edo_civil,
                'municipio'     =>$request->municipio,
                'ciudad'        =>$request->ciudad,
                'estado'        =>$request->estado,
                'pais'          =>$request->pais,
                'telf_movil'    =>$request->telf_movil,
                'telf_fijo'     =>$request->telf_fijo,
                'correo'        =>$request->correo,
                'titulo'        =>$request->titulo,
                'mencion'       =>$request->mencion,
                'id_tipoPersonal'=>$request->id_tipoPersonal,
                'id_cargo'      =>$request->id_cargo]);
            flash('Personal registrado con éxito','success');
            $personal=Personal::all();
            return View('admin.personal.index', compact('personal'));
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
