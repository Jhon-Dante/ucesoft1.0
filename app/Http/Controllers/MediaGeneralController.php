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
use App\asignaturas;
use App\Seccion;
use App\Personal;
class MediaGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $periodo=Periodos::where('status','Activo')->first();
        $secciones=Seccion::all();
        $inscripcion=Inscripcion::all();
       
        $num=0;
        $cali=Boletin::all();
        $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->get();
        //dd($personal);
        $contar=0;
        $personal2=Personal::where('correo',$correo)->first();
        
        $cantidad=0;
        //buscando lapso a registrar
        foreach ($personal2->asignacion_a as $key) {
            //dd($key->pivot->id_asignatura);
            $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$periodo->id)->groupBy('lapso')->get();
            
            $contar+=count($boletin);
            if($key->pivot->id_periodo==$periodo->id){
                $cantidad++;
            }
        }
        //dd($contar);

        if ($contar==0) {
            $lapso=1;
        } else {
            if ($contar==$cantidad) {
                $lapso=2;
            } else {
                if ($contar==(2*$cantidad)) {
                    $lapso=3;
                } else {
                    $lapso=0;
                }
                
            }
            
        }
        //dd($lapso);
        return View('admin.educacion_media.index', compact('num','inscripcion','boletin','secciones','periodo','personal','lapso'));
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
         $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->first();
        
        //dd($personal);
        //buscando lapso a registrar
        $contar=0;
        $cantidad=0;
        foreach ($personal->asignacion_a as $key) {
            //dd($key->pivot->id_asignatura);
            $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$id_periodo)->groupBy('lapso')->get();
            $contar+=count($boletin);
            if($key->pivot->id_periodo==$id_periodo){
                $cantidad++;
            }
        }
        //dd($contar);

        if ($contar==0) {
            $lapso=1;
        } else {
            if ($contar==$cantidad) {
                $lapso=2;
            } else {
                
                if ($contar==(2*$cantidad)) {
                    $lapso=3;
                } else {
                    $lapso=0;
                }
            }
            
        }

        $ins=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
        //  dd($lapso);
        return View('admin.educacion_media.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num','seccion','personal','lapso','ins'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo=Periodos::where('status','Activo')->get()->first();
        $contar=0;
        $correo=\Auth::user()->email;
        $personal=Personal::where('correo',$correo)->first();
        
        $cantidad=0;
        //buscando lapso a registrar
        foreach ($personal->asignacion_a as $key) {
            
            if($key->pivot->id_periodo==$periodo->id){
                $cantidad++;
            }
        }
        $tot=$cantidad;
        $cant=count($request->id_asignatura);
        $k=0;
        
        for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {
                        $crear=Boletin::create([
                            'id_asignatura' => $request->id_asignatura[$j],
                            'lapso' => $request->lapso,
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j],
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'id_periodo' => $periodo->id
                        ]);
                    }
                
                    $k=$j;
                    $tot+=$tot;

               
            }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO '.$request->lapso,'success');
            return redirect()->route('admin.educacion_media.index');
    }

    public function mostrar($id_seccion, $id_periodo)
    {
        dd('1433241214');
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
    public function pdf($i,$id_datosBasicos,$id_periodo){
        dd($id_datosBasicos);

    }
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
