<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Personal;
use App\Cargos;
use Laracast\Flash\Flash;
use App\Http\Requests\PersonalRequest;
use App\User;
use Session;
use Mail;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $num=0;
        $personal=Personal::all();
        $cargo=Cargos::lists('id','cargo');
        return View('admin.personal.index', compact('personal','cargo','num'));
        $contraseña=0;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRequest $request)
    {

        //dd($request->all());
        $buscar=Personal::where('cedula', $request->cedula)->get();

        //$personal2=Personal::find($request->)
        $usuario=User::all();



        $cuantos=count($buscar);

        if ($cuantos>0) {
            flash('Este personal ya se encuentra registrado','warning');
            $num=0;
            $personal=Personal::all();
        return View('admin.personal.index', compact('personal','num'));

        } else {

            $perso=Personal::create([
                'nombres'          =>$request->nombres,
                'apellidos'        =>$request->apellidos,
                'nacio'            =>$request->nacionalidad,
                'cedula'           =>$request->cedula,
                'fecha_nacimiento' =>$request->fecha_nacimiento,
                'edad'             =>$request->edad,
                'edo_civil'        =>$request->edo_civil,
                'direccion'        =>$request->direccion,
                'genero'           =>$request->genero,
                'codigo_hab'       =>$request->codigo_hab,
                'telf_hab'         =>$request->telf_hab,
                'codigo_cel'       =>$request->codigo_cel,
                'celular'          =>$request->celular,
                'correo'           =>$request->correo,
                'id_cargo'         =>$request->id_cargo
                ]);

                $cargo=Cargos::where('id',$request->id_cargo)->get()->first();
                $usuario=User::where('name',$request->nombres)->get()->first();

                 $contraseña=rand(100000000,1000000000);

                if(count($usuario) == 0){
                    $crear=\DB::table('users')->insert(array(
                        'name'          => $request->nombres,
                        'email'         => $request->correo,
                        'password'      => bcrypt($contraseña),
                        'tipo_user'     => $cargo->cargo
                    ));
                }

                // $destinatario=$request->correo;
                // //dd($destinatario);
                // $asunto="Confirmación de personal en el sistema";
                // $contenido="La clave para ingresar al sistema administrativo del colegio urdaneta y campo elías es:".$contraseña;
                // $data=array("contenido"=> $contenido,"personal" => $request->nombres);

                // $r=Mail::send('admin.personal.personal_correo', $data, function ($message) use ($asunto,$destinatario){
                //     //$message->from('colegiourdanetacampoelias@gmail.com');
                
                //     $message->to($destinatario)->subject($asunto);
                // });
                // if ($r) {
                //    flash('PERSONAL REGISTRADO CON ÉXITO!! Y CORREO DE CONFIRMACIÓN DE CONTRASEÑA ENVIADO!','success');
                // } else {
                //    flash('NO SE PUDO REALIZAR EL REGISTRO DEL PERSONAL !','error');
                // }
                flash('PERSONAL REGISTRADO CON ÉXITO!! PERO NO SE PUEDE ESTABLECER CONEXIÓN CON EL HOST host smtp.gmail.com [php_network_getaddresses!','warning',10);
                echo "Contraseña: ".$contraseña;

        $num=0;
        $personal=Personal::all();
        $cargo=Cargos::lists('id','cargo');
        return View('admin.personal.index', compact('personal','cargo','num','contraseña'));
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
        $personal=Personal::find($id);
        $cargos = Cargos::lists('cargo','id');
        return View('admin.personal.edit',compact('cargos','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRequest $request, $id)
    {
        $buscar=Personal::where('cedula', $request->cedula)->where('id','<>',$id)->where('id_cargo',$request->id_cargo)->get();
        $cuantos=count($buscar);

        if ($cuantos==0){
            $personal=Personal::find($id);
            $personal->update($request->all());

            flash('DATOS DEL PERSONAL EDITADOS CON ÉXITO!','success');
        }else{
            flash('ESTE PERSONAL YA EXISTE!', 'warning');
        }

        return redirect()->route('admin.personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //verificar la existencia de personal en otra tabla
        $personal=Personal::find($request->id);
        $nombres=$personal->nombres;
        
        if ($personal->delete()) {
            flash('REGISTRO DEL PERSONAL '.$nombres.' ELIMINADO CON ÉXITO!','success');
        } else {
            flash('DISCULPE, NO SE PUEDE ELIMINAR AL PERSONAL SELECCIONADO!','error');
        }
        
        return redirect()->route('admin.personal.index');
        
    }

    public function buscartipodocente($tipo)
    {
        switch ($tipo) {
            case 1:
                $id_cargo=5;
                $cargo="Preescolar";
                break;
            case 2:
                $id_cargo=4;
                $cargo="Educación Básica";
                break;
            case 3:
                $cargo="Docente de Media General";
                $id_cargo=3;
                break;
        }
        $tipo_usuario=Session::get('tipo');
        switch ($tipo_usuario) {
            case (1 or 2):
            $docentes=Personal::where('id_cargo',$id_cargo)->get();
                return view('admin.calificaciones.elegirdocente',compact('docentes','cargo') );
                break;
            
        }
    }
    public function buscarruta(Request $request)
    {
        //dd($request->all());

        Session::put('correo_docente', $request->correo);
        switch ($request->cargo) {
            case 'Preescolar':
                return redirect()->route('admin.preescolar.index');
                break;
            
            case 'Educación Básica':
                return redirect()->route('admin.educacion_basica.index');     
                break;
            case 'Docente de Media General':
                return redirect()->route('admin.educacion_media.index');     
                break;
        }
    }
    public function buscarseccion($id_personal)
    {
        
    }
}
