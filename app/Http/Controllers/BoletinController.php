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
use App\User;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo=Periodos::where('status','Activo')->first();
        $usuario=\Auth::user()->email;
        $personal=Personal::where('correo',$usuario)->first();
        $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->get();
        
        $boletin=Boletin::all();
        $num=0;


        $lapso1=0;
        $lapso2=0;
        $lapso3=0;
       // dd($personal->asignaciones_s);
        foreach ($personal->asignacion_s as $key) {

            foreach ($inscripcion as $key2) {

                if ($key2->seccion->seccion == $key->seccion and $key2->id_periodo == $key->pivot->id_periodo) {
            
                    foreach ($boletin->groupBy('lapso') as $key3) {
                        
                        if ($key3[0]->lapso == 1) {
                            $lapso1=1;
                        }
                        if ($key3[0]->lapso == 2) {
                            $lapso2=1;
                        }
                        if ($key3[0]->lapso == 3) {
                            $lapso3=1;
                        }
                    }
                }                    
            }
        }
        
        

        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin','secciones','periodo','personal','lapso1','lapso2','lapso3'));
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

        $usuario=\Auth::user()->email;
        $personal=Personal::where('correo',$usuario)->first();
    	
       	$contar=0;
        $cantidad=0;
        foreach ($personal->asignacion_a as $key) {
            $boletin=Boletin::where('id_asignatura',$key->pivot->id_asignatura)->where('id_periodo',$id_periodo)->groupBy('lapso')->get();
            $contar+=count($boletin);
            if ($key->pivot->id_periodo==$id_periodo) {
                $cantidad++;
            }
        }
       	
        if ($contar == 0) {
            $lapso=1;
        }else{
            if ($contar == $cantidad) {
                $lapso=2;
            }else{
                if ($contar == (2*$cantidad)) {
                    $lapso=3;
                }else{
                    $lapso=0;
                }
            }
        }



            return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num','seccion','personal','lapso'));
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
        $inscri=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos[0])->get()->first();
        $correo=\Auth::User()->email;
        $personal=Personal::where('correo',$correo)->get()->first();       

        $datobasico=DatosBasicos::find($request->id_datosBasicos);
        



        $lapso=Boletin::where('id_periodo',$periodo->id)->where('id_datosBasicos',$inscri->id)->get();
      
        $asig=Asignaturas::where('id_curso',$request->id_curso)->get();

        $tot=count($asig);
        $cant=count($request->id_asignatura);
        $k=0;
        

        for ($i=0; $i < count($request->id_datosBasicos) ; $i++) { 
            $calif=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',1)->first();
            $calif2=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',2)->first();
            $calif3=Boletin::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$periodo->id)->where('lapso',3)->first();
        }

        if (count($calif)==0) 
        {
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            {
                for ($j=$k; $j < count($request->id_asignatura) ; $j++)
                {
                    $crear=Boletin::create([
                        'id_asignatura' => $request->id_asignatura[$j],
                        'lapso' => 1,
                        'inasistencias' => $request->inasistencia[$j],
                        'calificacion' => $request->calificacion[$j],
                        'id_datosBasicos' => $request->id_datosBasicos[$i],                            
                        'id_periodo' => $periodo->id
                    ]);
                }
            }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');
                    
         }

         elseif (count($calif) == 1 and count($calif2)==0 )
         {
                for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
                {
                    for ($j=$k; $j < count($request->id_asignatura) ; $j++)
                    {
                        $crear=Boletin::create([
                            'id_asignatura' => $request->id_asignatura[$j],
                            'lapso' => 2,
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j],
                            'id_datosBasicos' => $request->id_datosBasicos[$i],                            
                            'id_periodo' => $periodo->id
                        ]);
                    }

                }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');

        }
        elseif (count($calif2)==1 and count($calif3)==0) 
        {
            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) 
            { 

                    for ($j=$k; $j < $tot ; $j++)
                    {

                        $crear=Boletin::create([
                            'id_datosBasicos' => $request->id_datosBasicos[$i],
                            'lapso' => 3,
                            
                            'id_periodo' => $periodo->id,
                            'id_asignatura' => $request->id_asignatura[$j],
                            'inasistencias' => $request->inasistencia[$j],
                            'calificacion' => $request->calificacion[$j] 
                        ]);
                    }
               
            }
            flash('REGISTRO DE LAS CALIFICACIONES DEL LAPSO REALIZADO CON ÉXITO!','success');
            return redirect()->route('admin.educacion_basica.index');
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
    public function mostrar(Request $request)
    {
        dd('adasdasdasds');
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
