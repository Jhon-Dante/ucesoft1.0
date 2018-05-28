<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Representantes;
use App\Parentesco;
use Laracast\Flash\Flash;
use App\Http\Requests\RepresentantesRequest;
use App\User;   
use Redirect;
use App\Session;
use Mail;
use App\Auditoria;
use App\DatosBasicos;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class RepresentantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accion='Visualiza datos de los representantes registrados';
        $this->auditoria($accion);
        $num=0;
        $representantes=Representantes::all();
        $datosBasicos=DatosBasicos::all();
        return View('admin.representantes.index', compact('representantes','num','datosBasicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        
        return View('admin.representantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentantesRequest $request)
    {

        // dd($request->all());
        $buscar=Representantes::where('cedula',$request->cedula)->get();

        $cuantos=count($buscar);
        $email=User::where('email',$request->email)->first();
        if (count($email) == 0) {
            if ($cuantos>0) {
                flash('Este representante ya se encuentra registrado', 'warning');
                
                if ($request->desde==1) {
                    return redirect()->back();    
                } else {
                    return redirect()->route('admin.representantes.index');
                }
                
            } else {
                $representante=Representantes::create([
                    'nacionalidad'      =>$request->nacionalidad,
                    'cedula'            =>$request->cedula,
                    'nombres'           =>$request->nombres,
                    'apellidos'         =>$request->apellidos,
                    'profesion'         =>$request->profesion,
                    'vive_estu'         =>$request->vive_estu,
                    'ingreso_apx'       =>$request->ingreso_apx,
                    'n_familia'         =>$request->n_familia,
                    'fecha_nacimiento'  =>$request->fecha_nacimiento,
                    'direccion'         =>$request->direccion,
                    'email'             =>$request->email,
                    'codigo_hab'        =>$request->codigo_hab,
                    'telf_hab'          =>$request->telf_hab,
                    'lugar_tra'         =>$request->lugar_tra,
                    'codigo_tra'        =>$request->codigo_tra,
                    'telf_tra'          =>$request->telf_tra,
                    'responsable_m'     =>$request->responsable_m,
                    'codigo_responsable'=>$request->codigo_responsable,
                    'telf_responsable'  =>$request->telf_responsable,
                    'codigo_opcional'   =>$request->codigo_opcional,
                    'telf_opcional'     =>$request->telf_opcional,
                    'nombre_opcional'   =>$request->nombre_opcional,
                    'codigo_emergencia' =>$request->codigo_emergencia,
                    'telf_emergencia'   =>$request->telf_emergencia
                ]);

                $contraseña=rand(100000000,1000000000);
                $name= ''.$request->nombres.', '.$request->apellidos;

                $repre=\DB::table('users')->insert([
                    'name' => $name,
                    'email' => $request->email,
                    'password' => bcrypt($contraseña),
                    'tipo_user' => 'Representante',
                    //---------------------------------- Estudiante
                            'pre_re' => 'No',
                            'list_estu' => 'No',
                            'edit_estu' => 'No',
                            'eli_estu' => 'No',
                            'const_estu' => 'No',
                            'cer_estu' => 'No',
                            'titulob_estu' => 'No',
                            //---------------------------------- Representante
                            'list_repre' => 'No',
                            'create_repre' => 'No',
                            'edit_repre' => 'No',
                            //---------------------------------- mensualidades
                            'pag_mensu' => 'No',
                            'edit_montos' => 'No',
                            'edit_monto_m' => 'No',
                            //---------------------------------- calificaciones
                            'edit_cali_pre' => 'No',
                            'edit_cali_basic' => 'No',
                            'edit_cali_media' => 'No',
                            'edit_notas_final' => 'No',
                            //---------------------------------- Horarios
                            'gen_horario' => 'No',
                            //---------------------------------- personal
                            'list_perso' => 'No',
                            'create_perso' => 'No',
                            'edit_perso' => 'No',
                            'act/desac_perso' => 'No',
                            'asig_car_aca' => 'No',
                            'asig_guia' => 'No',
                            'list_guia' => 'No',
                            //---------------------------------- config

                                //------------------------------------- usuarios
                                'list_user' => 'No',
                                'list_edit' => 'No',
                                //------------------------------------- asignaturas
                                'list_asig' => 'No',
                                'create_asig' => 'No',
                                'edit_asig' => 'No',
                                'elim_asig' => 'No',
                                //------------------------------------- auditoria
                                'list_auditoria' => 'No',
                                //------------------------------------- aulas
                                'list_aula' => 'No',
                                'create_aula' => 'No',
                                'edit_aula' => 'No',
                                'elim_aula' => 'No',
                                //------------------------------------- cargos
                                'list_cargo' => 'No',
                                'create_cargo' => 'No',
                                'edit_cargo' => 'No',
                                'elim_cargo' => 'No',
                                //------------------------------------- periodos
                                'list_periodo' => 'No',
                                'create_periodo' => 'No',
                                'edit_periodo' => 'No',
                                'elim_periodo' => 'No',
                                'act/desac_periodo' => 'No',
                                //------------------------------------- respaldar BD
                                'res_BD' => 'No',
                                //------------------------------------- Secciones
                                'list_seccion' => 'No',
                                'create_seccion' => 'No',
                                'edit_seccion' => 'No',
                                'elim_seccion' => 'No',
                                //-------------------------------------
                    'status' => 1
                ]);


                 // $name=$request->nombres;
                    $destinatario=$request->email;
                    $contenido="La clave para ingresar al sistema administrativo del colegio urdaneta y campo elías es:".$contraseña;



                    $r=Mail::send('admin.personal.personal_correo', ['name' => $name,'contraseña' => $contraseña,'destinatario' => $destinatario,'contenido' => $contenido], function ($m) use ($asunto,$destinatario,$persona,$contenido,$data,$monto) {
                        $m->from('colegiourdanetacampoelias@gmail.com', 'Ucesoft1.0');

                        $m->to($destinatario, $persona)->subject('Registro del representante');
                    });
                // $destinatario=$request->email;
                // $asunto="Confirmación de representante en el sistema";
                // $contenido="La clave para ingresar al sistema administrativo del colegio urdaneta y campo elías es:".$contraseña;
                // $data=array("contenido"=> $contenido,"personal" => $request->nombres);

                // $r=Mail::send('admin.personal.personal_correo', $data, function ($message) use ($asunto,$destinatario){
                //     //$message->from('colegiourdanetacampoelias@gmail.com');
                
                //     $message->to($destinatario)->subject($asunto);
                // });
            flash('REPRESENTANTE REGISTRADO CON ÉXITO!! PERO NO SE PUEDE ESTABLECER CONEXIÓN CON EL HOST host smtp.gmail.com [php_network_getaddresses!, CONTRASEÑA: '.$contraseña.'','warning',10)->important();
            
            // flash('Representante registrado con éxito','success');
            if ($request->desde==1) {
                    return redirect()->back();    
                } else {
                    return redirect()->route('admin.representantes.index');
                }
            }
                

                    $accion='Registra nuevo representante: '.$request->nombres;
                    $this->auditoria($accion);
            
        }else{
            flash('YA EXISTE ESTE CORREO ELECTRÓNICO EN EL SISTEMA!', 'danger');
            return redirect()->back();
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
        return view('admin.representantes.edit', compact('representantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RepresentantesRequest $request, $id)
    {
        $representantes=Representantes::where('cedula',$request->cedula)->where('id','<>',$id)->get();

        if (count($representantes)==0) {

            $representantes=Representantes::find($id);
            $representantes->update($request->all());

            flash('REPRESENTANTE EDITADO CON ÉXITO!', 'success');
        } else {
            flash('ESTE REPRESENTANTE YA ESTÁ REGISTRADO!','warning');
        }
        $accion='Actualiza datos del representante'.$representantes->nombres;
        $this->auditoria($accion);

        return redirect()->route('admin.representantes.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $representantes=Representantes::find($id);
        $representantes->delete();
        flash(' SE HA ELIMINADO EL REPRESENTANTE     CORRECTAMENTE.','success');
        return redirect()->route('admin.representantes.index');
    }

    public function editarStatus($id)
    {
        $repre=Representantes::find($id);
        //dd($asigna->status);

        if ($repre->status==1) {
            $repre->status=2;
            $repre->save();

            flash('El status del representante '.$repre->nombres.' ha sido cambiado a inactivo','warning');
        }else{
            $repre->status=1;
            $repre->save();

            flash('El status del representante '.$repre->nombres.' ha sido cambiado a Activo','success');
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
