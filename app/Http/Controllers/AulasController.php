<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aula;
use App\Http\Requests;
use App\Http\Requests\AulasRequest;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Auditoria;
use App\Horarios;
use App\Horarios2;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class AulasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accion ='Visualización de listado de Asignaturas registradas';
        $this->auditoria($accion);
        $num=0;
        $aula = Aula::all();
        return view('admin.aulas.index', compact('num','aula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aulas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AulasRequest $request)
    {
        
        $aula = new Aula();
        $aula->nombre = strtoupper($request['nombre']);
        $aula->save();
        
        flash("Se ha registrado en aula de forma exitosa!", 'success');
        return redirect()->route('admin.aulas.index');
    
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
        $aula = Aula::find($id);
        return view('admin.aulas.edit', ['aula'=>$aula]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AulasRequest $request, $id)
    {
        $aula = Aula::find($id);
        $aula->nombre = strtoupper($request['nombre']);
        $aula->save();
        $accion ='Aula '.$aula->nombre.' actualizada';
        $this->auditoria($accion);
        Session::flash('message', 'AULA EDITADA CORRECTAMENTE.');
        $num=0;
        $aula = Aula::all();
        return view("admin.aulas.index", ['aula'=>$aula,'num'=>$num]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $horarios = Horarios::where('id_aula',$request->id)->get();
        $horarios2 = Horarios2::where('id_aula',$request->id)->get();
        $aula=Aula::find($request->id);
        $nombre=$aula->nombre;
        if(count($horarios)>0 || count($horarios2)>0){
            $accion ='No se pudo eliminar el aula '.$nombre.'';
            $this->auditoria($accion);
            Session::flash('message-error', 'DISCULPE ESTA AULA YA SE ENCUENTRA ASIGNADA EN UN HORARIO.');
            flash('AULA NO ELIMINADA CON ÉXITO!', 'warning');
            return redirect()->back();

        } else {

            $aula->delete();
            $accion ='Eliminación del aula '.$nombre.'';
            $this->auditoria($accion);
            Session::flash('message', 'SE HA ELIMINADO EL AULA '.$aula->nombre.' EXITOSAMENTE.');
            flash('AULA ELIMINADA CON ÉXITO!', 'success');
            return redirect()->back();
        }
    }

    public function editarStatus($id)
    {
        $aula=Aula::find($id);
        //dd($asigna->status);

        if ($aula->status==1) {
            $aula->status=2;
            $aula->save();

            flash('El status del aula '.$aula->nombre.' ha sido cambiado a inactivo','warning');
        }else{
            $aula->status=1;
            $aula->save();

            flash('El status del aula '.$aula->nombre.' ha sido cambiado a Activo','success');
        }
        return redirect()->back();
    }

     private function auditoria($accion)
    {
        $auditoria=Auditoria::create([
                    'id_user' => \Auth::user()->id,
                    'accion' => $accion
                ]);
    }
}
