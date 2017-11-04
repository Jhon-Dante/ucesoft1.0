<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bloques;
use App\Aula;
use App\Horarios;
use App\Cursos;
use App\Asignaturas;
use App\Seccion;
use App\Periodos;
use App\Dias;
use App\Horarios2;
use App\Bloques2;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $secciones=Seccion::where('id_curso','!=','1')->get();
        $periodos=Periodos::where('status','Activo')->get()->first();
        $horarios=Horarios::where('id_periodo',$periodos->id);
        return View('admin.horarios.index', compact('horarios','num','secciones','periodos','horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($request->all());
    }

    public function crear($id_seccion,$id_periodo)
    {

        
        $aulas=Aula::all();
        $secciones=Seccion::find($id_seccion);
        $periodos=Periodos::find($id_periodo);
        $dias=Dias::all();
        $asignaturas=Asignaturas::all();

        if ($secciones->id_curso <=4)
        {
            $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
            $bloques3=Bloques::all();
        }
        else
        {
            $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();

            $bloques3=Bloques::all();
        }

        $horas=8;
        return View('admin.horarios.show', compact('asignaturas','secciones','periodos','aulas','horas','dias','horarios','bloques3'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buscando curso
        $curso=Seccion::find($request->id_seccion);
        $bloCompa=Bloques::where('id',$request->id_bloque)->get();
        $horarioMa=Bloques::whereBetween('id', array(1,40))->get();
        $horarioTa=Bloques::whereBetween('id',array(40,9999))->get();

        //dd($request->id_bloque);
        $horarios2=Horarios::where('id_bloque',$request->id_bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();
        


        if (count($horarios2)>0) {
            flash('DISCULPE, YA HA ASIGNADO UNA ASIGNATURA EN ESTE BLOQUE, ELIJA OTRO BLOQUE O ELIMINE EL HORARIO','warning');

            return redirect()->route('admin.crearhorario',['id_seccion' => $request->id_seccion,'id_periodo' => $request->id_periodo])->withInput();
        } else {

            
               

            for ($i=0; $i < $request->bloque ; $i++) { 
                 $crear=Horarios::create([
                    'id_bloque' => $request->id_bloque+$i,
                    'id_aula' => $request->id_aula,
                    'id_asignatura' => $request->id_asignatura,
                    'id_seccion' => $request->id_seccion,
                    'id_periodo' => $request->id_periodo
                ]);
             }


        $aulas=Aula::all();
        $secciones=Seccion::where('id',$request->id_seccion)->get()->first();
        $periodos=Periodos::where('id',$request->id_periodo)->get()->first();
        $bloques=Bloques::lists('bloque','id');
        $bloques3=Bloques::all();
        $dias=Dias::all();
        $bloques2=Bloques::orderBy('id_dia')->groupBy('id_dia')->get();
        $asignaturas=Asignaturas::all();
        $horarios=Horarios::where('id_periodo',$request->id_periodo)->get();
        $horas=8;

        return View('admin.horarios.show', compact('asignaturas','bloques','secciones','periodos','aulas','horas','bloques2','dias','horarios','bloques3'));


            
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
        dd('234324324');
    }
     public function mostrar()
    {
        return View('admin.horarios.show');
    }
}
