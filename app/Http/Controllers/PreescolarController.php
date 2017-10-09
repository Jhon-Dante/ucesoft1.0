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
use App\Personal;
use App\PersonalPSecciones;
use App\Seccion;

class PreescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=\Auth::user()->email;  //Bueso el Email del personal
        $personal=Personal::where('correo',$usuario)->get()->first(); //Comparo ese email con el registro del personal registrado
        $asignacion=PersonalPSecciones::where('id_personal',$personal->id)->get()->first(); //Veo la asignacion que tiene ese personal 
        $seccion=Seccion::where('id',$asignacion->id_seccion)->get();
        $seccion2=Seccion::where('id',$asignacion->id_seccion)->get()->first(); //Trae la sección con la que está relacionada el personal
        $periodo=Periodos::where('status','Activo')->get()->first(); 



        $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->where('id_seccion',$seccion2->id)->get()->first();

        $lapso=Calificaciones::where('id_datosBasicos',$inscripcion->id)->where('id_periodo',$periodo->id)->get()->first();
        $lapso2=Calificaciones::where('id_datosBasicos',$inscripcion->id)->where('id_periodo',$periodo->id)->where('nro_reportes',2)->get()->first();

        $calificaciones=Calificaciones::all();
        $num=0;
        return View('admin.preescolar.index', compact('num','inscripcion','calificaciones','personal','seccion','periodo','lapso','lapso2'));
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
        $num=0;
        $periodos=Periodos::find($id_periodo);
        $inscritos=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$periodos->id)->get();
        $cali=Calificaciones::all();

        // inscripcion::where('id_seccion')->get()->first();
        
       return View('admin.preescolar.create', compact('num','inscritos','periodos','calificaciones','cali'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i=0; $i < count($request->juicios) ; $i++) { 
            
        
            if (strLen($request->juicios[$i])<=2) {
               flash('DISCULPE, JUICIO DEBE SER MAYOR A 200 CARÁCTERES','warning');
               return redirect()->route('admin.preescolar.index')->withInput();
            }

        }

        for ($i=0; $i < count($request->sugerencia) ; $i++) { 

        
            if (strLen($request->sugerencia[$i])<=7) {
                    flash('DISCULPE, SUGERENCIAS DEBE SER MAYOR A 70 CARÁCTERES','warning');
                    return redirect()->route('admin.preescolar.index')->withInput();

            }
        }
        for ($i=0; $i < count($request->id_datosBasicos) ; $i++) { 
            $calif=Calificaciones::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$request->id_periodo)->get()->first();
            $calif2=Calificaciones::where('id_datosBasicos',$request->id_datosBasicos[$i])->where('id_periodo',$request->id_periodo)->where('nro_reportes',2)->get()->first();
        }
            

        if (count($calif) == 0) {

            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) { 
                $crear=Calificaciones::create([
                'nro_reportes' => 1,
                'juicios' => $request->juicios[$i],
                'sugerencia' => $request->sugerencia[$i],
                'id_datosBasicos' => $request->id_datosBasicos[$i],
                'id_periodo' => $request->id_periodo
                ]);
            }

            flash('REGISTRO DE JUICIOS Y SUGERENCIAS DE LOS ESTUDIANTE REGISTRADO CON ÉXITO!','success');

        }elseif(count($calif) == 1 && count($calif2) == 0) {

            
            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) {

                $crear=Calificaciones::create([
                'nro_reportes' => $calif->nro_reportes+1,
                'juicios' => $request->juicios[$i],
                'sugerencia' => $request->sugerencia[$i],
                'id_datosBasicos' => $request->id_datosBasicos[$i],
                'id_periodo' => $request->id_periodo
                ]);

            }

            flash('REGISTRO DE JUICIOS Y SUGERENCIAS DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');

        }else{

            for ($i=0; $i < count($request->id_datosBasicos) ; $i++) { 
                $crear=Calificaciones::create([
                'nro_reportes' => 3,
                'juicios' => $request->juicios[$i],
                'sugerencia' => $request->sugerencia[$i],
                'id_datosBasicos' => $request->id_datosBasicos[$i],
                'id_periodo' => $request->id_periodo
            ]);

            }

            flash('REGISTRO DE JUICIOS Y SUGERENCIAS DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');
        }

        $cali=count(Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get());
        if (count($cali)==null) {
           $cali=0;
        }

        return redirect()->route('admin.preescolar.index');
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

    public function mostrarmomento($id_seccion, $id_periodo)
    {
        $num=0;
        $inscritos=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        $seccion=Seccion::find($id_seccion);
        $periodos=Periodos::find($id_periodo);
        $cali=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes2=Calificaciones::where('id_periodo',$id_periodo)->groupBy('nro_reportes')->get();
        // dd(count($reportes2));

        $k=0;
        $i=0;
        $m=0;
        foreach ($reportes2 as $key) {
            $p=0;
            $i=$k;
            


            foreach ($reportes2->groupBy('nro_reportes') as $key2) {

                if ($key2[0]->id_periodo==$periodos->id) {
                    
                    $repor[$i]=$key2[0]->nro_reportes;

                    $i++;
                    $p++;


                    }
                }

            }
            $k=$i;

            if ($i>0 and $p>0) {
                $j=$i-1;
                $lapsos[$m]=$repor[$j];
                $m++;
        }
        $n=0;
        return View('admin.preescolar.show', compact('num','inscritos','periodos','cali','seccion','id_periodo','lapsos','reportes','reportes2','n'));
    }

    public function calificaciones($id_seccion, $id_periodo)
    {
        $num=0;
        $inscritos=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        $seccion=Seccion::find($id_seccion);
        $periodos=Periodos::find($id_periodo);
        $cali=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes2=Calificaciones::where('id_periodo',$id_periodo)->groupBy('nro_reportes')->get();
        // dd(count($reportes2));

        $k=0;
        $i=0;
        $m=0;
        foreach ($reportes2 as $key) {
            $p=0;
            $i=$k;
            


            foreach ($reportes2->groupBy('nro_reportes') as $key2) {

                if ($key2[0]->id_periodo==$periodos->id) {
                    
                    $repor[$i]=$key2[0]->nro_reportes;

                    $i++;
                    $p++;


                    }
                }

            }
            $k=$i;

            if ($i>0 and $p>0) {
                $j=$i-1;
                $lapsos[$m]=$repor[$j];
                $m++;
        }
        $n=0;
        return View('admin.preescolar.show', compact('num','inscritos','periodos','cali','seccion','id_periodo','lapsos','reportes','reportes2','n'));
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

    public function pdf($value='')
    {
        dd('asdsadasd');
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
