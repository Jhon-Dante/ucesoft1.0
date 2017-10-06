<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Inscripcion;
use App\DatosBasicos;
use App\Momentos;
use App\Calificaciones;
use App\Periodos;
use App\Boletin;
use App\Asignaturas;
use App\Seccion;
use App\Personal;
class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo=Periodos::where('status','Activo')->get()->first();
        $secciones=Seccion::all();
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        $num=0;
        $cali=Boletin::all();
        $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->get();
        //dd($personal);
        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin','secciones','periodo','personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('asdasdsdas');
    }

    public function crear($id_seccion, $id_periodo)
    {
    	
    	$inscripcion=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        $inscripcion2=Inscripcion::where('id_seccion',$id_seccion)->get()->first();
        $seccion=Seccion::find($id_seccion);
           
        $num=0;
    	$asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
       	$periodos=Periodos::find($id_periodo);
       	$boletin=Boletin::all();
       	



            return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num','seccion'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$lapso=Boletin::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get();
        $datobasico=DatosBasicos::find($request->id_datosBasicos);


        $periodo=Periodos::where('status','Activo')->get()->first();

        $inscri=Boletin::where('id_datosBasicos',$request->id_datosBasicos)->get()->first();
        $asig=Asignaturas::where('id_curso',$request->id_curso)->get();
       
        $tot=count($asig);
        $cant=count($request->id_asignatura);
        $k=0;
        

        if (count($lapso)==0) 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {
                        $crear=Boletin::create([
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'lapso' => 1,
                            'sugerencias' => 0,
                            'id_periodo' => $periodo->id,
                            'id_asignatura' => $request->id_asignatura[$j],
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j] 
                        ]);
                    }
                
                    $k=$j;
                    $tot+=$tot;

               
            }

        } if (count($lapso)==1) 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {
                        $crear=Boletin::create([
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'lapso' => 2,
                            'sugerencias' => 0,
                            'id_periodo' => $periodo->id,
                            'id_asignatura' => $request->id_asignatura[$j],
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j] 
                        ]);
                    }
                
                    $k=$j;
                    $tot+=$tot;

               
            }

        } if (count($lapso)==2) 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {
                        $crear=Boletin::create([
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'lapso' => 3,
                            'sugerencias' => 0,
                            'id_periodo' => $periodo->id,
                            'id_asignatura' => $request->id_asignatura[$j],
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j] 
                        ]);
                    }
                
                    $k=$j;
                    $tot+=$tot;

               
            }

        }else{
            flash('YA TODOS LOS LAPSOS DE ');
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
