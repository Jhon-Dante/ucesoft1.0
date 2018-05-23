<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asignaturas;
use App\Cursos;
use Laracasts\Flash\flash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AsignaturasRequest;
use Validator;    
use App\Auditoria;
use App\Boletin;
use App\Periodos;
use App\NBloques;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class AsignaturasController extends Controller
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
        $a=0;
        $num=0;
        $asignaturas=Asignaturas::all();
        return View('admin.asignaturas.index', compact('asignaturas','num','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos=Cursos::lists('curso','id');
        return View('admin.asignaturas.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturasRequest $request)
    {
        $buscar=Asignaturas::where('asignatura',$request->asignatura)->where('id_curso',$request->id_curso)->get();

        if (count($buscar)==0) {
            $asignatura=Asignaturas::create([
                'asignatura' => $request->asignatura,
                'id_curso' => $request->id_curso,
                'color' => $request->color
                ]);
            $asignaturas=Asignaturas::where('asignatura',$request->asignatura)->where('id_curso',$request->id_curso)->first();

            //registrando en bloques
            $periodos=Periodos::all();
            for ($i=0; $i < count($periodos) ; $i++) {
                $nbloques=NBloques::create([
                    'n_bloques' => 4,
                    'id_asignatura' => $asignaturas->id,
                    'id_periodo' => $i
                ]);
            }
            //registrando en auditoria
            $accion = 'Registro de la Asignatura '.$request->asignatura.' en el curso '.$request->curso.'';

            flash('ASIGNATURA '.$request->asignatura.' EN EL CURSO '.$request->curso.' HAN SIDO REGISTRADOS CON ÉXITO!', 'success');
        } else {

            //registrando en auditoria
            $accion='Falla en el registro de la Asignatura '.$request->asignatura.' en el curso '.$request->curso.'';
            flash('DISCULPE, LA ASIGNATURA '.$request->asignatura.' EN EL CURSO '.$request->curso.' YA SE ENCUENTRA ACTUALMENTE REGISTRADO!','warning');
        }
        $this->auditoria($accion);
        $num=0;
        $asignaturas=Asignaturas::all();
        return redirect()->route('admin.asignaturas.index', compact('asignaturas','num'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request->all());
        $a=$request->id;
        $asignaturas=Asignaturas::all();
        return View('admin.asignaturas.show', compact('asignaturas','num','a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $asignaturas=Asignaturas::find($id);
        $cursos=Cursos::lists('curso','id');
        return View('admin.asignaturas.edit', compact('cursos','asignaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturasRequest $request, $id)
    {
        // $asignaturas=Asignaturas::where('asignatura',$request->asignatura)->where('id','<>',$id)->get();
        $asignaturas=Asignaturas::find($id);
        if (count($asignaturas)>0) {
            
            $asignaturas->asignatura=$request->asignatura;
            $asignaturas->id_curso=$request->id_curso;
            $asignaturas->color=$request->color; 
            $asignaturas->update();

            //registrando en auditoria
            $accion = 'Actualización de la Asignatura '.$request->asignatura.'';
            flash('REGISTRO ACTUALIZADO CON ÉXITO','success');
        } else {
                       
            $accion = 'Falla en la Actualización de la Asignatura '.$request->asignatura.'';
            flash('REGISTRO NO ACTUALIZADO','warning');
        }
        $this->auditoria($accion);

        return redirect()->route('admin.asignaturas.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $asignaturas=Asignaturas::find($request->id);
        $comprueba=Boletin::where('id_asignatura',$request->id)->first();
        if(count($comprueba)>0){
            $accion="Falla en la eliminación de la asignatura";
            flash('EXISTEN CURSOS ASIGNADOS A ESTA MATERIA, NO SE PUEDE ELIMINAR! ELIMINE EL CURSO PRIMERO', 'warning');
        } else {
            $x=$asignaturas->asignatura;
            if($asignaturas->delete()){
                 $accion="Eliminación de la asignatura ".$request->asignatura;
                flash('REGISTRO DE ASIGNATURA '.$request->asignatura.' ELIMINADO CON ÉXITO!', 'success');
            }else{
                $accion="No se pudo eliminar la asignatura ".$request->asignatura;
                flash('REGISTRO NO ELIMINADO!','warning');
                    
            }
        }
        //registrando en auditoria
         $this->auditoria($accion);
        return redirect()->route('admin.asignaturas.index');
        
    }

    public function editarStatus($id)
    {
        $asigna=Asignaturas::find($id);
        //dd($asigna->status);

        if ($asigna->status==1) {
            $asigna->status=2;
            $asigna->save();

            flash('El status de la asignatura '.$asigna->asignatura.' ha sido cambiado a inactivo','warning');
        }else{
            $asigna->status=1;
            $asigna->save();

            flash('El status de la asignatura '.$asigna->asignatura.' ha sido cambiado a Activo','success');
        }
        return redirect()->back();
    }

    public function buscarasignatura($id)
    {
        return $nbloques=Asignaturas::find($id);   
    }

    private function auditoria($accion)
    {
        $auditoria=Auditoria::create([
                    'id_user' => \Auth::user()->id,
                    'accion' => $accion
                ]);
    }
}
