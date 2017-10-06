<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Personal;
use App\Cargos;
use Laracast\Flash\Flash;
use App\Http\Requests\PersonalRequest;
use App\User;

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

                if(count($usuario) == 0){
                    $crear=\DB::table('users')->insert(array(
                        'name'          => $request->nombres,
                        'email'         => $request->correo,
                        'password'      => bcrypt('qwerty'),
                        'tipo_user'     => $cargo->cargo
                    ));
                }

            flash('Personal registrado con éxito','success');

            return redirect()->route('admin.personal.index');
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
}
