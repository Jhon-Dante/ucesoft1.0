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
use App\Mensualidades;
use App\Representantes;
use App\User;
use Session;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class PreescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p=Periodos::where('status','Activo')->first();
        $periodo2=Session::get('periodo');
        $periodo=Periodos::where('status','Activo')->first();
        // en el caso de que sea administrador o secretaria
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $usuario=Session::get('correo_docente');
        } else {
             $usuario=\Auth::user()->email;  //Busco el Email del personal
        }
        
       
        $personal=Personal::where('correo',$usuario)->first(); //Comparo ese email con el registro del personal registrado
        $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->get();
        
        
        $calificaciones=Calificaciones::all();
        //inicializando reportes
        $reporte1=0;
        $reporte2=0;
        $reporte3=0;
        //consultando las asignaciones de secciones del personal
        foreach ($personal->personapsecciones as $key) {
            //verificando los datos en inscripcion
            foreach ($inscripcion as $key2) {
                //buscando si existen estudiantes inscritos en la seccion asignada al personal
                if ($key2->id_seccion==$key->id_seccion and $key2->id_periodo==$key->id_periodo) {
                    //buscando si a esos estudiantes se les ha cargado calificacion
                    foreach ($calificaciones->groupBy('nro_reportes') as $key3) {
                        if ($key3[0]->nro_reportes==1) {
                            $reporte1=1;
                        }
                        if ($key3[0]->nro_reportes==2) {
                            $reporte2=1;
                        }
                        if ($key3[0]->nro_reportes==3) {
                            $reporte3=1;
                        }
                    }
                }
            }
        }
        $num=0;
        return view('admin.preescolar.index', compact('num','p','periodo2','personal','calificaciones','reporte1','reporte2','reporte3'));
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

    public function crear(Request $request)
    {
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $c=Session::get('correo_docente');
        } else {
             $c=\Auth::user()->email;  //Busco el Email del personal
        }
        
        
        $representante=Representantes::where('email',$c)->first();

        if (count($representante) > 1) {
            flash('¡¡¡ACCESO DENEGADO!!! - INCIDENTE REPORTADO','warning');
            return redirect()->back();
        }else{
            if (\Auth::user()->tipo_user=="Administrador(a)") {
                $num=0;
                //dd($request->id_periodo);
                $seccion=Seccion::find($request->id_seccion);

                $periodo=Periodos::find($request->id_periodo);
                $inscritos=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();
                $ins=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
                $reporte=$request->reporte;

               return View('admin.preescolar.create', compact('num','inscritos','periodo','reporte','seccion','ins'));
            }else{
            $clave=$request->password;
            $busca=PersonalPSecciones::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
            $personal=Personal::find($busca->id_personal);
            $email=$personal->correo;
            $usuario=User::where('email',$email)->first();
            $validator=$usuario->password;


                if (password_verify($clave, $validator)) {

                    $num=0;
                    $seccion=Seccion::find($request->id_seccion);

                    $periodo=Periodos::find($request->id_periodo);
                    $inscritos=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();
                    $ins=Inscripcion::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
                    $reporte=$request->reporte;

                   return View('admin.preescolar.create', compact('num','inscritos','periodo','reporte','seccion','ins'));
                }else{
                    flash('¡CONTRASEÑA INCORRECTA!','danger');
                    return redirect()->back();
                }

            }
        }//fin del else de comprobacion de usuario representante
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

    public function mostrarmomento($reporte, $id_seccion, $id_periodo)
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
            


            foreach ($reportes2->groupBy('nro_reportes') as $key2) 
            {

                if ($key2[0]->id_periodo==$periodos->id) 
                {
                    
                    $repor[$i]=$key2[0]->nro_reportes;

                    $i++;
                    $p++;
                 }
            }
        }
        $k=$i;

        if ($i>0 and $p>0) 
        {
            $j=$i-1;
            $lapsos[$m]=$repor[$j];
            $m++;
        }
        $n=0;
        return View('admin.preescolar.show', compact('num','inscritos','periodos','cali','seccion','id_periodo','lapsos','reportes','reportes2','n'));
    }

    public function mostrarmomento2($id_seccion, $id_periodo)
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
            


            foreach ($reportes2->groupBy('nro_reportes') as $key2) 
            {

                if ($key2[0]->id_periodo==$periodos->id) 
                {
                    
                    $repor[$i]=$key2[0]->nro_reportes;

                    $i++;
                    $p++;
                 }
            }
        }
        $k=$i;

        if ($i>0 and $p>0) 
        {
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

    public function pdf($id_seccion, $id_periodo)
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


        $dompdf = \PDF::loadView('admin.pdfs.boletines.boletinPreescolar.boletinPreescolar', ['num' => $num, 'inscritos' => $inscritos, 'periodos' => $periodos, 'cali' => $cali, 'seccion' => $seccion, 'id_periodo' => $id_periodo, 'lapsos' => $lapsos, 'reportes' => $reportes, 'reportes2' => $reportes2, 'n' => $n])->setPaper('a4', 'landscape');

        return $dompdf->stream();
    }

    public function boletinPreescolarEstudiante($id_datosBasicos, $id_seccion, $id_periodo, $reporte)
    {
        //dd($reporte);
        $inscripcion=Inscripcion::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->first();
        $inscritos=Inscripcion::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        $inscripcion2=Inscripcion::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->first();
        $seccion=Seccion::find($id_seccion);
        $periodo=Periodos::find($id_periodo);
        $cali=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes=Calificaciones::where('id_periodo',$id_periodo)->get();
        $reportes2=Calificaciones::where('id_periodo',$id_periodo)->groupBy('nro_reportes')->get();
        // dd(count($reportes2));
        $mensualidades=Mensualidades::where('id_inscripcion',$inscripcion2->id)->where('estado','Cancelado')->get();
        //dd($reporte);
        $boletin2=Calificaciones::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->get();
        if (count($boletin2) == 0) {
            flash('EL ESTUDIANTE TODAVÍA NO TIENE NOTAS CARGADAS','warning');
                return redirect()->back();
                
        }else{
            if ($count($mensualidades)<3 AND $reporte==1) {
                flash('EL ESTUDIANTE DEBE TENER 3 MESES DE SOLVENCIA EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 1ER LAPSO','warning');
                return redirect()->back();
            }else{
                if (count($mensualidades)<6 AND $reporte==2) {
                    flash('EL ESTUDIANTE DEBE TENER 6 MESES DE SOLVENCIA EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 2DO LAPSO','warning');
                return redirect()->back();
                }else{
                    if (count($mensualidades)<9 AND $reporte==3) {
                        flash('EL ESTUDIANTE DEBE TENER 9 MESES DE SOLVENCIA EN LAS MENSUALIDADES PARA PODER DESCARGAR SUS NOTAS DEL 3ER LAPSO','warning');
                        return redirect()->back();
                }else{

                    $k=0;
                    $i=0;
                    $m=0;
                    foreach ($reportes2 as $key) {
                        $p=0;
                        $i=$k;
                        

                        if(count($mensualidades)<3){
                            flash('EL ESTUDIANTE TODAVÍA TIENE MENSUALIDADES QUE DEBE CANCELAR PARA VER LAS CALIFICACIONES CARGADAS','danger');
                            return redirect()->back();
                        }else{
                            foreach ($reportes2->groupBy('nro_reportes') as $key2) {

                                if ($key2[0]->id_periodo==$periodo->id) {
                                    
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
                        $report=0;
                        if ($reporte==1) {
                            $report=1;
                        }elseif ($reporte==2) {
                            $report=2;
                        }else{
                            $report=3;
                        }
                        //dd($report);

                                $l1=Calificaciones::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('nro_reportes',1)->get();
                                $l2=Calificaciones::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('nro_reportes',2)->get();
                                $l3=Calificaciones::where('id_periodo',$id_periodo)->where('id_datosBasicos',$id_datosBasicos)->where('nro_reportes',3)->get();
                               $num=0;
                               $representante=Representantes::find($inscripcion2->datosBasicos->id_representante);


                        $dompdf = \PDF::loadView('admin.pdfs.boletines.boletinPreescolar.boletinPreescolarEstudiante', ['num' => $num, 'inscripcion' => $inscripcion, 'periodo' => $periodo, 'boletin2' => $boletin2, 'seccion' => $seccion, 'id_periodo' => $id_periodo, 'lapsos' => $lapsos, 'representante' => $representante,'report' => $report,'l1' => $l1, 'l2' => $l2, 'l3' => $l3, 'id_datosBasicos' => $id_datosBasicos])->setPaper('a4', 'landscape');

                        return $dompdf->stream();
                    }
                }
            }
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        if (\Auth::user()->tipo_user=="Administrador(a)" || \Auth::user()->tipo_user=="Secretario(a)") {
            $c=Session::get('correo_docente');
        } else {
             $c=\Auth::user()->email;  //Busco el Email del personal
        }
        
        $representante=Representantes::where('email',$c)->first();

        if (count($representante) > 1) {
            flash('¡¡¡ACCESO DENEGADO!!! - INCIDENTE REPORTADO','warning');
            return redirect()->back();
        }else{
            if (\Auth::user()->tipo_user=="Administrador(a)") {
                $reportes2=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->groupBy('nro_reportes')->get();

                $momento1=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',1)->get();
                $momento2=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',2)->get();
                $momento3=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',3)->get();
                
                $reportes=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->get();

                //dd(count($momento1),count($momento2),count($reportes2));

                $reportes2=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->groupBy('nro_reportes')->get();
                $periodo=Periodos::find($request->id_periodo);
                $estudiante=DatosBasicos::find($request->id_datosBasicos);
                $inscrito=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->first();
                $calificaciones=Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get();
                $n=0;

                //dd(count($inscrito));
                return View('admin.preescolar.edit', compact('lapso','reportes','periodo','estudiante','inscrito','Calificaciones','reportes2','n','mensaje'));
            }else{
                
            //dd($request->all());
            $clave=$request->password;
            $busca=PersonalPSecciones::where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
            $personal=Personal::find($busca->id_personal);
            $email=$personal->correo;
            $usuario=User::where('email',$email)->first();
            $validator=$usuario->password;


            if (password_verify($clave, $validator)) {

                
                $reportes2=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->groupBy('nro_reportes')->get();

                $momento1=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',1)->get();
                $momento2=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',2)->get();
                $momento3=Calificaciones::where('id_periodo',$request->id_periodo)->where('nro_reportes',3)->get();
                
                $reportes=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->get();

                //dd(count($momento1),count($momento2),count($reportes2));

                $reportes2=Calificaciones::where('id_periodo',$request->id_periodo)->where('id_datosBasicos',$request->id_datosBasicos)->groupBy('nro_reportes')->get();
                $periodo=Periodos::find($request->id_periodo);
                $estudiante=DatosBasicos::find($request->id_datosBasicos);
                $inscrito=Inscripcion::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->first();
                $calificaciones=Calificaciones::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get();
                $n=0;

                //dd(count($inscrito));
                return View('admin.preescolar.edit', compact('lapso','reportes','periodo','estudiante','inscrito','Calificaciones','reportes2','n','mensaje'));
            }else{
                flash('¡CONTRASEÑA INCORRECTA!','danger');
                return redirect()->back();
            }
            }
        }//fin del else de comprobacion de usuario representante
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $datoBasico=DatosBasicos::find($request->id_datosBasicos);
            for ($i=0; $i < count($request->juicios) ; $i++) {
                $momento=Calificaciones::find($request->id[$i]);

                $momento->juicios = $request->juicios[$i];
                $momento->sugerencia = $request->sugerencia[$i];
                $momento->save();
            }

        flash('NOTAS DEL ESTUDIANTE '.$datoBasico->nombres.' EDITADO CON ÉXITO!', 'success');
        return redirect()->route('admin.preescolar.index');
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
