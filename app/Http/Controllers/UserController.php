<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Http\Requests;
use App\User;
use Input;
use App\Representantes;
use App\Personal;
use App\Cargos;
use Session;
use Illuminate\Support\Facades\Auth;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        $num=0;
        $usuarios=User::all();
        return View('admin.usuarios.index', compact('num','usuarios'));
    }
    public function index()
    {
        $email=\Auth::user()->email;
        $usuario=User::where('email',$email)->first();

        $personal=Personal::where('correo',$email)->first();
    // ]dd($personal);
        $representante=representantes::where('email',$email)->first();
        if(count($representante)>0 && count($personal)==0){
            $user=1;
        }else{
            $user=2;
        }


        return View('admin.profile.index', compact('usuario','personal','representante','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|image'
        ]);
        $user = Auth::user();
        $extension = $request->file('foto')->getClientOriginalExtension();
        
        $file_name = $user->id . '.' . $extension;
        \Image::make($request->file('foto'))
            ->resize(144, 144)
            ->save('img/users' . $file_name);

        $user->foto = $file_name;
        $user->save();

        flash('Foto cargada con éxito!','success');
        return redirect()->back();
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

    public function editarPermisos(request $request)
    {
        if(Auth::user()->tipo_user == 'Administrador(a)' || $request->contraseña == null){
            $clave=$request->password;
            $validator=Auth::user()->password;
            if (password_verify($clave, $validator)) {
                $usuarios=User::all();
                $num=0;
                return View('admin.usuarios.edit_per', compact('usuarios','num'));
            }else{
                flash('¡CONTRASEÑA INCORRECTA!','warning');
                return redirect()->back();
            }
        }else{
            flash('NO ESTÁ AUTORIZADO PARA ACCEDER A ESTA FUNCIONALIDAD!','warning');
            return redirect()->back();
        }
    }
    public function actualizar(Request $request)
    {
        // dd($request->user);
        $validator= \Auth::user()->password;
        $clave=$request->password;
        $user=$request->user;
        // dd($user,$password);
        if (password_verify($clave, $validator)) {

            if ($request->user==2) {
               $representante=0;
               $personal=Personal::where('correo',Auth::user()->email)->first();
            }else{
                $representante=Representantes::where('correo',Auth::user()->email)->first();
                $personal=0;
            }
            $usuario=User::find(Auth::user()->id);
            // dd($usuario);




            return View('admin.profile.edit',compact('personal','representante','usuario','user'));



        }else{
         flash('¡CONTRASEÑA INCORRECTA!','danger');
         return redirect()->back();   
        }
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
    public function update(Request $request)
    {
        // dd('sdfasfad');

        if ($request->foto != null) {
            $this->validate($request,[
                'foto' => 'required|image'
            ]);
            $user = Auth::user();
            $extension = $request->file('foto')->getClientOriginalExtension();
            
            $file_name = $user->id . '.' . $extension;
            \Image::make($request->file('foto'))
                ->resize(144, 144)
                ->save('img/users' . $file_name);

            $user->foto = $file_name;
            $user->save();
        }

        if ($request->user == 2) {
            $u=User::find($request->usuario);
            $u->name=$request->nombres;
            $u->save();
            $personal=Personal::find($request->id);
            $personal->update($request->all());

            flash('DATOS ACTUALIZADOS!','success');
        }else{
            dd('repre');
        }

        $email=\Auth::user()->email;
        $usuario=User::where('email',$email)->first();
        $personal=Personal::where('correo',$email)->first();
        $representante=representantes::where('email',$email)->first();

        if(count($representante)>0 && count($personal)==0){
            $user=1;
        }else{
            $user=2;
        }


        return View('admin.profile.index', compact('usuario','personal','representante','user'));
    }

    public function editarStatus($id)
    {
        $usuario=User::find($id);
        //dd($asigna->status);

        if ($usuario->status==1) {
            $usuario->status=2;
            $usuario->save();

            flash('El status del usuario '.$usuario->name.' ha sido cambiado a inactivo','warning');
        }else{
            $usuario->status=1;
            $usuario->save();

            flash('El status del usuario '.$usuario->name.' ha sido cambiado a Activo','success');
        }
        return redirect()->back();
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
