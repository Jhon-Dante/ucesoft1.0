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
use Session;
use App\Representantes;
use App\DatosBasicos;
use App\Inscripcion;
// use App\NBloques;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user()->tipo_user;
        $email=\Auth::user()->email;

        if ($user == 'Representante') {


        $representante=Representantes::where('email',$email)->first();
        $datosBasicos=DatosBasicos::where('id_representante',$representante->id)->get();
        $inscripcion=Inscripcion::all();
        
            $cont=0;
            $num=0;
            $secciones=Seccion::where('id_curso','!=','1')->get();
            $periodos=Periodos::where('status','Activo')->get()->first();
            $id_periodo=Session::get('periodo');
            $horarios=Horarios::where('id_periodo',$id_periodo)->get();
            $horarios2=Horarios2::where('id_periodo',$id_periodo)->get();
            $a=1;

            return View('admin.horarios.index', compact('horarios','num','secciones','periodos','horarios','horarios2','id_periodo','representante','datosBasicos','inscripcion','a'));
        }else{
            $a=0;
            $num=0;
            $secciones=Seccion::where('id_curso','!=','1')->get();
            $periodos=Periodos::where('status','Activo')->get()->first();
            $id_periodo=Session::get('periodo');
            $horarios=Horarios::where('id_periodo',$id_periodo)->get();
            $horarios2=Horarios2::where('id_periodo',$id_periodo)->get();
           
            // dd($horarios2);
            return View('admin.horarios.index', compact('horarios','num','secciones','periodos','horarios','horarios2','id_periodo','a'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd($request->all());
    }

    public function crear($id_seccion,$id_periodo)
    {
        $secciones=Seccion::find($id_seccion);
        $periodos=Periodos::find($id_periodo);
        $dias=Dias::all();
        $asignaturas=Asignaturas::where('status',1)->get();
        switch ($secciones->id_curso) {
            case ($secciones->id_curso <= 4):

                    $bloquesx=array();
                    $colores=array();
                    $aula=array();
                    $id_horarios=array();
                        $k=1;
                    for ($h=0; $h < 7; $h++) { 
                        $b=Bloques2::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 7; $i++) { 
                        for ($j=1; $j < 6; $j++) {
                            if (($i==1 && $j==1) || ($i==1 && $j==2) || ($i==1 && $j==3) || ($i==1 && $j==4) || ($i==1 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                            
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                                
                            }
                        }
                                
                    }
                $horarios=Horarios2::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques2::all();

                $bloque=1;
                $y=1;
                $x=0;
                $k=0;
                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios2::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=7;
                    }
                    $y++;
                    $x=$y+34;
                }
               
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            
            case ($secciones->id_curso >=5 AND $secciones->id_curso <= 7):

                $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aulas=array();
                $id_horarios=array();
                        $k=1;
                    for ($h=0; $h < 7; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 7; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==2 && $j==1) || ($i==2 && $j==2) || ($i==2 && $j==3) || ($i==2 && $j==4) || ($i==2 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=1;
                $y=1;
                $x=0;
                
                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=16;
                    }
                    $y++;
                    $x=$y+79;
                }
               
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            case ($secciones->id_curso >= 8):
                $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                //dd($horarios);
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aulas=array();
                $id_horarios=array();
                        $k=8;
                    for ($h=0; $h < 9; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 9; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==4 && $j==1) || ($i==4 && $j==2) || ($i==4 && $j==3) || ($i==4 && $j==4) || ($i==4 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=8;
                $y=8;
                $x=0;
                
                for ($i=0; $i < 9 ; $i++) {

                    if ($bloque == $x) {  
                        //echo $x."-";
                        $bloque=$bloque-($x-$y); 
                    }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        //echo $bloque."-";
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=16;
                    }
                    $y++;
                    $x=$y+79;
                    //echo $bloque."-".$x."*";
                }
               
                for ($i=0; $i < 9; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
        }

        $horas=8;
        $aulas=Aula::where('status',1)->get();
        $cuantosb=0;
        if ($secciones->id<=4) {
            $cuantosb=Horarios2::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        }else{
            $cuantosb=Horarios::where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->get();
        }
        // $nbloques=NBloques::where('id_periodo',$id_periodo)->get();
        
        return View('admin.horarios.show', compact('asignaturas','cuantosb','secciones','periodos','aulas','horas','dias','horarios','bloques3','bloquesx','colores','aula','id_horarios'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         
        
         // dd($request->all());
        //buscando curso
        $curso=Seccion::find($request->id_seccion);
        $bloCompa=Bloques::where('id',$request->id_bloque)->get();
        $horarioMa=Bloques::whereBetween('id', array(1,40))->get();
        $horarioTa=Bloques::whereBetween('id',array(40,9999))->get();

        //Verifica bloques cargados de asignaturas para horarios 2
        $verifica=Horarios2::where('id_asignatura',$request->id_asignatura)->where('id_periodo',$request->id_periodo)->get();
        //Verifica bloques cargados de asignaturas para horarios
        $verifica2=Horarios::where('id_asignatura',$request->id_asignatura)->where('id_periodo',$request->id_periodo)->get();
        $asigna=Asignaturas::find($request->id_asignatura);

        //dd($request->id_bloque);
        $horarios2=Horarios::where('id_bloque',$request->id_bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();
        $hora=Horarios2::where('id_bloque',$request->id_bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->get();

        //Sumar numero de bloques restantes con los máximos
        $resta=count($verifica)  +$request->n_bloques;
        $resta2=count($verifica2)+$request->n_bloques;
        if (count($horarios2)>0 || count($hora)>0) {
            flash('DISCULPE, YA HA ASIGNADO UNA ASIGNATURA EN ESTE BLOQUE, ELIJA OTRO BLOQUE O ELIMINE EL BLOQUE ESPECIFICADO!','warning');

            return redirect()->route('admin.crearhorario',['id_seccion' => $request->id_seccion,'id_periodo' => $request->id_periodo])->withInput();
        } else {

            //dd($curso->id);
            if ($curso->id_curso<=4) {

            
                

                // dd($resta, $asigna->n_bloques);
                if ($resta > $asigna->n_bloques) {
                       flash('HA ALCANZADO EL NÚMERO MÁXIMO DE BLOQUES PARA ESTA ASIGNATURA! SOLO SE LE PERMITE TENER: '.$asigna->n_bloques.' BLOQUES DE ESTA ASIGNATURA!','warning');
                       return redirect()->back();
                   }else{  

                        if (($request->id_bloque == 1   && $request->n_bloques >=2) || 
                            ($request->id_bloque == 8   && $request->n_bloques >=2) || 
                            ($request->id_bloque == 15  && $request->n_bloques >=2) || 
                            ($request->id_bloque == 22  && $request->n_bloques >=2) || 
                            ($request->id_bloque == 29  && $request->n_bloques >=2)) {
                            
                            flash('EL NÚMERO DE BLOQUES NO PUEDE OCUPAR TAMBIÉN LA HORA DE RECREO! ESTE BLOQUE NO PUEDE SER MAYOR A 1','danger')->important();

                            return redirect()->back();
                        }else{
                            
                            for ($i=0; $i < $request->n_bloques ; $i++) { 
                                $crear=Horarios2::create([
                                    'id_bloque' => $request->id_bloque+$i,
                                    'id_aula' => $request->id_aula,
                                    'id_asignatura' => $request->id_asignatura,
                                    'id_seccion' => $request->id_seccion,
                                    'id_periodo' => $request->id_periodo
                                ]);
                            }
                        }

                    }
            }elseif ($curso->id_curso >=5 && $curso->id_curso <= 7){
            
                
                // dd($resta, $asigna->n_bloques);
                if ($resta2 > $asigna->n_bloques) {
                       flash('HA ALCANZADO EL NÚMERO MÁXIMO DE BLOQUES PARA ESTA ASIGNATURA! SOLO SE LE PERMITE TENER: '.$asigna->n_bloques.' BLOQUES DE ESTA ASIGNATURA!','warning');
                       return redirect()->back();
                }else{
                    if (((
                        ($request->id_bloque == 1  || 
                        $request->id_bloque == 17  || 
                        $request->id_bloque == 33 || 
                        $request->id_bloque == 49 || 
                        $request->id_bloque == 65) && $request->n_bloques >=3) 
                        || 
                        ($request->id_bloque == 2  || 
                        $request->id_bloque == 18  || 
                        $request->id_bloque == 34 || 
                        $request->id_bloque == 50 || 
                        $request->id_bloque == 66) && $request->n_bloques >=2)) {
                        
                        flash('EL NÚMERO DE BLOQUES NO PUEDE OCUPAR TAMBIÉN LA HORA DE RECREO!','danger')->important();

                        return redirect()->back();
                    }else{
                    for ($i=0; $i < $request->n_bloques ; $i++) { 
                         $crear=Horarios::create([
                            'id_bloque' => $request->id_bloque+$i,
                            'id_aula' => $request->id_aula,
                            'id_asignatura' => $request->id_asignatura,
                            'id_seccion' => $request->id_seccion,
                            'id_periodo' => $request->id_periodo
                        ]);
                        }
                    }
                }
            }else{
                // dd($resta2,$asigna->n_bloques);
                if ($resta2 > $asigna->n_bloques) {
                       flash('HA ALCANZADO EL NÚMERO MÁXIMO DE BLOQUES PARA ESTA ASIGNATURA! SOLO SE LE PERMITE TENER: '.$asigna->n_bloques.' BLOQUES DE ESTA ASIGNATURA!','warning');
                       return redirect()->back();
                }else{
                    if (
                            (((
                                ($request->id_bloque == 9  || 
                                $request->id_bloque == 25  || 
                                $request->id_bloque == 41 || 
                                $request->id_bloque == 57 || 
                                $request->id_bloque == 73) && $request->n_bloques >=4)
                                || 
                                ($request->id_bloque == 10  || 
                                $request->id_bloque == 26  || 
                                $request->id_bloque == 42 || 
                                $request->id_bloque == 58 || 
                                $request->id_bloque == 74) && $request->n_bloques >=3)
                                || 
                                ($request->id_bloque == 11  || 
                                $request->id_bloque == 27  || 
                                $request->id_bloque == 43 || 
                                $request->id_bloque == 59 || 
                                $request->id_bloque == 75) && $request->n_bloques >=2)
                        ) 
                    {
                        
                        flash('EL NÚMERO DE BLOQUES NO PUEDE OCUPAR TAMBIÉN LA HORA DE RECREO!','danger')->important();

                        return redirect()->back();
                    }else{
                    for ($i=0; $i < $request->n_bloques ; $i++) { 
                         $crear=Horarios::create([
                            'id_bloque' => $request->id_bloque+$i,
                            'id_aula' => $request->id_aula,
                            'id_asignatura' => $request->id_asignatura,
                            'id_seccion' => $request->id_seccion,
                            'id_periodo' => $request->id_periodo
                        ]);
                    } //Cierra for
                }//Cierra else
            }


       }
        $secciones=Seccion::where('id',$request->id_seccion)->get()->first();
        $periodos=Periodos::where('id',$request->id_periodo)->get()->first();
        $bloques=Bloques::lists('bloque','id');
        $bloques3=Bloques::all();
        $dias=Dias::all();
        $bloques2=Bloques::orderBy('id_dia')->groupBy('id_dia')->get();
        $asignaturas=Asignaturas::where('status',1)->get();
        $horarios=Horarios::where('id_periodo',$request->id_periodo)->get();
        $horas=8;

        switch ($secciones->id_curso) {
            case ($secciones->id_curso <= 4):

                $bloquesx=array();
                $colores=array();
                $aula=array();
                $id_horarios=array();
                    $k=1;
                for ($h=0; $h < 7; $h++) { 
                    $b=Bloques2::find($k);  
                    $bloquesx[$h][0]=$b->bloque;
                    $colores[$h][0]="#FFFFFF";
                    $aula[$h][0]="";
                    $id_horarios[$h][0]="";
                    $k++;
                }
                for ($i=0; $i < 7; $i++) { 
                    for ($j=1; $j < 6; $j++) {
                    if (($i==1 && $j==1) || ($i==1 && $j==2) || ($i==1 && $j==3) || ($i==1 && $j==4) || ($i==1 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else { 
                         $bloquesx[$i][$j]="LIBRE";
                         $colores[$i][$j]="#FFFFFF";
                         $aula[$i][$j]="";
                         $id_horarios[$i][$j]="";
                     }
                    }
                            
                }
                $horarios=Horarios2::where('id_periodo',$request->id_periodo)->where('id_seccion',$request->id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques2::all();

        $bloque=1;
        $y=1;
        $x=0;

                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {
                        $bloque=$bloque-($x-$y);
                    
                    }
                    //echo $bloque;
                    for ($j=1; $j < 6;$j++) { 
                        //echo $bloque."-";
                        
                        $horario=Horarios2::where('id_bloque',$bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();

                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=7;
                    }
                    //echo "<br>";
                    $y++;
                    $x=$y+34;
                }
                //dd(count($bloquesx));
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            
            case ($secciones->id_curso >=5 AND $secciones->id_curso <= 7):
                $horarios=Horarios::where('id_periodo',$request->id_periodo)->where('id_seccion',$request->id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aula=array();
                $id_horarios=array();
                        $k=1;
                    for ($h=0; $h < 7; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 7; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==2 && $j==1) || ($i==2 && $j==2) || ($i==2 && $j==3) || ($i==2 && $j==4) || ($i==2 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=1;
                $y=1;
                $x=0;
                
                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=16;
                    }
                    $y++;
                    $x=$y+79;
                }
               
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            case ($secciones->id_curso >= 8):
                $horarios=Horarios::where('id_periodo',$request->id_periodo)->where('id_seccion',$request->id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aula=array();
                $id_horarios=array();
                        $k=8;
                    for ($h=0; $h < 9; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 9; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==4 && $j==1) || ($i==4 && $j==2) || ($i==4 && $j==3) || ($i==4 && $j==4) || ($i==4 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=8;
                $y=8;
                $x=0;
                
                for ($i=0; $i < 9 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$request->id_seccion)->where('id_periodo',$request->id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=9;
                    }
                    $y++;
                    $x=$y+72;
                }
               
                for ($i=0; $i < 9; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
        }
         $aulas=Aula::where('status',1)->get();
            $recreo=Horarios::where('id_bloque',3)->where('id_bloque',12)->where('id_bloque',19)->where('id_bloque',28)->where('id_bloque',35)->where('id_bloque',44)->where('id_bloque',51)->where('id_bloque',60)->where('id_bloque',67)->where('id_bloque',76)->get();
            // dd(count($recreo));
            if (count($recreo)>0) {
                // dd($recreo[1]);
                for ($i=0; $i < count($recreo); $i++) {
                    
                    $r=Horarios::find($recreo[$i]->id)->first();
                    $r->delete();
                }
                
                flash('NO SE PUEDE CARGAR ASIGNATURAS EN UN BLOQUE DE RECESO!','warning');

            }
        // return View('admin.horarios.show', compact('asignaturas','bloques','secciones','periodos','aulas','horas','bloques2','dias','horarios','bloques3','bloquesx','colores','aula','id_horarios'));
         return redirect()->back();

            
        }
    }

    public function mostrarhorario($id_seccion, $id_periodo)
    {

        
       
        $secciones=Seccion::find($id_seccion);
        $periodos=Periodos::find($id_periodo);
        $dias=Dias::all();
        $asignaturas=Asignaturas::all();
        switch ($secciones->id_curso) {
            case ($secciones->id_curso <= 4):

                    $bloquesx=array();
                    $colores=array();
                    $aula=array();
                    $id_horarios=array();
                        $k=1;
                    for ($h=0; $h < 7; $h++) { 
                        $b=Bloques2::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 7; $i++) { 
                        for ($j=1; $j < 6; $j++) {
                        if (($i==1 && $j==1) || ($i==1 && $j==2) || ($i==1 && $j==3) || ($i==1 && $j==4) || ($i==1 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else { 
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                $horarios=Horarios2::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques2::all();

                $bloque=1;
                $y=1;
                $x=0;
                $k=0;
                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios2::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=7;
                    }
                    $y++;
                    $x=$y+34;
                }
               
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            
            case ($secciones->id_curso >=5 AND $secciones->id_curso <= 7):

                $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aulas=array();
                $id_horarios=array();
                        $k=1;
                    for ($h=0; $h < 7; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 7; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==2 && $j==1) || ($i==2 && $j==2) || ($i==2 && $j==3) || ($i==2 && $j==4) || ($i==2 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=1;
                $y=1;
                $x=0;
                
                for ($i=0; $i < 7 ; $i++) {

                    if ($bloque == $x) {  $bloque=$bloque-($x-$y); }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=16;
                    }
                    $y++;
                    $x=$y+79;
                }
               
                for ($i=0; $i < 7; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
            case ($secciones->id_curso >= 8):
                $horarios=Horarios::where('id_periodo',$id_periodo)->where('id_seccion',$id_seccion)->groupBy('id_bloque')->get();
                //dd($horarios);
                $bloques3=Bloques::all();
                $bloquesx=array();
                $colores=array();
                $aulas=array();
                $id_horarios=array();
                        $k=8;
                    for ($h=0; $h < 9; $h++) { 
                        $b=Bloques::find($k);  
                        $bloquesx[$h][0]=$b->bloque;
                        $colores[$h][0]="#FFFFFF";
                        $aula[$h][0]="";
                        $id_horarios[$h][0]="";
                        $k++;
                    }
                    for ($i=0; $i < 9; $i++) { 
                        for ($j=1; $j < 6; $j++) { 
                            if (($i==4 && $j==1) || ($i==4 && $j==2) || ($i==4 && $j==3) || ($i==4 && $j==4) || ($i==4 && $j==5)) {
                                 $bloquesx[$i][$j]="RECESO";
                                 $colores[$i][$j]="#E0E0E0";
                                 $aula[$i][$j]="";
                                 $id_horarios[$i][$j]="";
                            } else {
                             $bloquesx[$i][$j]="LIBRE";
                             $colores[$i][$j]="#FFFFFF";
                             $aula[$i][$j]="";
                             $id_horarios[$i][$j]="";
                         }
                        }
                                
                    }
                    $bloque=8;
                $y=8;
                $x=0;
                
                for ($i=0; $i < 9 ; $i++) {

                    if ($bloque == $x) {  
                        //echo $x."-";
                        $bloque=$bloque-($x-$y); 
                    }

                    for ($j=1; $j < 6;$j++) { 
                        $horario=Horarios::where('id_bloque',$bloque)->where('id_seccion',$id_seccion)->where('id_periodo',$id_periodo)->first();
                        //echo $bloque."-";
                        if (count($horario)==1) {
                        $bloquesx[$i][$j]=$horario->asignatura->codigo;
                        $colores[$i][$j]=$horario->asignatura->color;
                        $aula[$i][$j]=$horario->aula->nombre;
                        $id_horarios[$i][$j]=$horario->id;
                        }            
                        $bloque+=16;
                    }
                    $y++;
                    $x=$y+79;
                    //echo $bloque."-".$x."*";
                }
               
                for ($i=0; $i < 9; $i++) { 
                    for ($j=0; $j < 6; $j++) { 
                        //echo $bloquesx[$i][$j]."-";
                    }
                    //echo "<br>";
                }
                //dd("Hasta aqui");
                break;
        }
       // dd($bloquesx);

        $horas=8;
         $aulas=Aula::all();
        
        $dompdf = \PDF::loadView('admin.pdfs.horarios.horarios', ['secciones' => $secciones, 'periodos' => $periodos, 'bloques3' => $bloques3,'dias' => $dias,'colores' => $colores, 'bloquesx' => $bloquesx,'aula' => $aula, 'id_horarios' => $id_horarios ])->setPaper('a4', 'landscape');

        return $dompdf->stream();
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
    public function buscarbloques($id)
    {
        return $nbloques=NBloques::where('id_asignatura',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd('34253425342');
        $horario=Horarios::find($id);
        $horario->delete();

        flash('BLOQUE ELIMINADO CON ÉXITO!','success');
        return redirect()->back();
    }
    public function destruir(Request $request)
    {
        //dd($request->all());
        $seccion=Seccion::find($request->id_seccion);
        if ($seccion->curso->id <= 4) {
            $horario=Horarios2::find($request->id_horario);
            $horario->delete();
        } else {
            $horario=Horarios::find($request->id_horario);
            $horario->delete();
        }

        flash('BLOQUE ELIMINADO CON ÉXITO!','success');
        return redirect()->back();
        
    }
     public function mostrar()
    {
        return View('admin.horarios.show');
    }
}
