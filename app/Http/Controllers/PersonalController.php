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
            $personal=Personal::lists('id');
            $cargo=Cargos::lists('cargo','id');
            return View('admin.tipo_personal.create', compact('personal','cargo','num'));
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
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.edit',compact('cargos'));
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
        $buscar=Personal::where('cedula', $request->cedula)->where('id','<>',$id)->where('id_cargo',$request->id_cargo)->get();
        $cuantos=count($buscar);

        if ($cuantos==0){
            $personal=Personal::find($id);
            $personal->update($request->all());

            flash('DATOS DEL PERSONAL EDITADOS CON ÉXITO!','success');
        }else{
            flash('ESTE PERSONAL YA EXISTE!', 'warning');
        }
        $num=0;
        $personal=Personal::all();
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.index',compact('cargos','personal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargos=Cargos::find($request->id);
        $p=false;

        if ($p) {
            flash('EL PERSONAL NO SE PUEDE ELIMINAR DEBIDO A QUE POSEE UN CARGO EN LA INSTITUCIÓN, EDITE EL PERSONAL Y ELIMINE EL CARGO PARA PODER ELIMINAR','warning');
        } else {
            $personal->delete();

            flash('REGISTRO DEL PERSONAL '.$datosBasicos->nombre.' ELIMINADO CON ÉXITO!','success');
        }
        $num=0;
        $personal=Personal::all();
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.create',compact('cargos','personal','num'));
        
    }
}
