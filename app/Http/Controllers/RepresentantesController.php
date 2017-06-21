<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Representantes;

use App\Parentesco;

use Laracast\Flash\Flash;

class RepresentantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representantes=Representantes::all();
        return View('admin.representantes.index', compact('representantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $parentesco=Parentesco::lists('parentesco','id');
        return View('admin.representantes.create', compact('parentesco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buscar=Representantes::where('cedula',$request->cedula)->get();

        $cuantos=conunt($buscar);

        if ($cuanto>0) {
            flash('Este representante ya se encuentra registrado', 'warning');
            $datosBasicos=Representantes::all();
            return View('admin.representantes.index', compact('representantes'));
        } else {
            $representante=Representantes::create([
                'nacionalidad' =>$request->nacionalidad,
                'cedula' =>$request->cedula,
                'nombres' =>$request->nombres,
                'apellidos' =>$request->apellidos,
                'profesion' =>$request->profesion,
                'id_parentesco' =>$request->id_parentesco,
                'vive_estu' =>$request->vive_estu,
                'ingreso_apx' =>$request->ingreso_apx,
                'n_familia' =>$request->n_familia,
                'direccion' =>$request->direccion,
                'codigo_hab' =>$request->codigo_hab,
                'telf_hab' =>$request->telf_hab,
                'lugar_tra' =>$request->lugar_tra,
                'codigo_tra' =>$request->codigo_tra,
                'telf_tra' =>$request->telf_tra,
                'responsable_m' =>$request->responsable_m,
                'codigo_responsable' =>$request->codigo_responsable,
                'telf_responsable' =>$request->telf_responsable,
                'codigo_opcional' => $request->codigo_opcional,
                'telf_opcional' => $request->telf_opcional,
                'nombre_opcional' =>$request->nombre_opcional,
                'codigo_emergencia' =>$request->codigo_emergencia,
                'telf_emergencia' =>$request->elf_emergencia]);
        flash('Representante registrado con éxito','success');
        $representante=Representantes::all();
        return View('admin.representantes.index', compact('representantes'))
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
        $representantes = Representantes::find($id);
        $parentesco = Tipo::lists('parentesco', 'id');
        return view('admin.representantes.edit', compact('representantes', 'parentesco'));
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
        $representante->delete();

            flash(' SE HA ELIMINADO EL REPRESENTANTE '.$representante->nombres.' CORRECTAMENTE.','success');

            $representantes = Cargos::all();
        return view('admin.representantes.index', compact('representantes'));

    }
}
