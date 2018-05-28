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
                $usuarios=User::where('tipo_user','<>','Representante')->get();
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






    public function editP(request $request,$id,$edit_p)
    {
        // dd($id,$edit_p);
        $user=User::find($id);
        // $user->update($request->all());

            if($edit_p == 'pre_re'){

                if($user->pre_re == 'Si'){
                    $user->pre_re='No';
                    $user->save();
                }else{
                    $user->pre_re='Si';
                    $user->save();
                }
            }
            if($edit_p == 'list_estu'){

                if($user->list_estu == 'Si'){
                    $user->list_estu='No';
                    $user->save();
                }else{
                    $user->list_estu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_estu'){

                if($user->edit_estu == 'Si'){
                    $user->edit_estu='No';
                    $user->save();
                }else{
                    $user->edit_estu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'eli_estu'){

                if($user->eli_estu == 'Si'){
                    $user->eli_estu='No';
                    $user->save();
                }else{
                    $user->eli_estu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'const_estu'){

                if($user->const_estu == 'Si'){
                    $user->const_estu='No';
                    $user->save();
                }else{
                    $user->const_estu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'cer_estu'){

                if($user->cer_estu == 'Si'){
                    $user->cer_estu='No';
                    $user->save();
                }else{
                    $user->cer_estu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'titulob_estu'){

                if($user->titulob_estu == 'Si'){
                    $user->titulob_estu='No';
                    $user->save();
                }else{
                    $user->titulob_estu='Si';
                    $user->save();
                }

            }
            //---------------------------------- Representante
            if($edit_p == 'list_repre'){

                if($user->list_repre == 'Si'){
                    $user->list_repre='No';
                    $user->save();
                }else{
                    $user->list_repre='Si';
                    $user->save();
                }

            }
            if($edit_p == 'create_repre'){

                if($user->create_repre == 'Si'){
                    $user->create_repre='No';
                    $user->save();
                }else{
                    $user->create_repre='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_repre'){

                if($user->edit_repre == 'Si'){
                    $user->edit_repre='No';
                    $user->save();
                }else{
                    $user->edit_repre='Si';
                    $user->save();
                }

            }
            //---------------------------------- mensualidades
            if($edit_p == 'pag_mensu'){

                if($user->pag_mensu == 'Si'){
                    $user->pag_mensu='No';
                    $user->save();
                }else{
                    $user->pag_mensu='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_montos'){

                if($user->edit_montos == 'Si'){
                    $user->edit_montos='No';
                    $user->save();
                }else{
                    $user->edit_montos='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_monto_m'){

                if($user->edit_monto_m == 'Si'){
                    $user->edit_monto_m='No';
                    $user->save();
                }else{
                    $user->edit_monto_m='Si';
                    $user->save();
                }

            }
            //---------------------------------- calificaciones
            if($edit_p == 'edit_cali_pre'){

                if($user->edit_cali_pre == 'Si'){
                    $user->edit_cali_pre='No';
                    $user->save();
                }else{
                    $user->edit_cali_pre='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_cali_basic'){

                if($user->edit_cali_basic == 'Si'){
                    $user->edit_cali_basic='No';
                    $user->save();
                }else{
                    $user->edit_cali_basic='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_cali_media'){

                if($user->edit_cali_media == 'Si'){
                    $user->edit_cali_media='No';
                    $user->save();
                }else{
                    $user->edit_cali_media='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_notas_final'){

                if($user->edit_notas_final == 'Si'){
                    $user->edit_notas_final='No';
                    $user->save();
                }else{
                    $user->edit_notas_final='Si';
                    $user->save();
                }

            }
            //---------------------------------- Horarios
            if($edit_p == 'gen_horario'){

                if($user->gen_horario == 'Si'){
                    $user->gen_horario='No';
                    $user->save();
                }else{
                    $user->gen_horario='Si';
                    $user->save();
                }

            }
            //---------------------------------- personal
            if($edit_p == 'list_perso'){

                if($user->list_perso == 'Si'){
                    $user->list_perso='No';
                    $user->save();
                }else{
                    $user->list_perso='Si';
                    $user->save();
                }

            }
            if($edit_p == 'create_perso'){

                if($user->create_perso == 'Si'){
                    $user->create_perso='No';
                    $user->save();
                }else{
                    $user->create_perso='Si';
                    $user->save();
                }

            }
            if($edit_p == 'edit_perso'){

                if($user->edit_perso == 'Si'){
                    $user->edit_perso='No';
                    $user->save();
                }else{
                    $user->edit_perso='Si';
                    $user->save();
                }

            }
            // if($edit_p == 'act/desac_perso'){

            //     if($user->act/desac_perso == 'Si'){
            //         $user->act/desac_perso='No';
            //         $user->save();
            //     }else{
            //         $user->act/desac_perso='Si';
            //         $user->save();
            //     }

            // }
            if($edit_p == 'asig_car_aca'){

                if($user->asig_car_aca == 'Si'){
                    $user->asig_car_aca='No';
                    $user->save();
                }else{
                    $user->asig_car_aca='Si';
                    $user->save();
                }

            }
            if($edit_p == 'asig_guia'){

                if($user->asig_guia == 'Si'){
                    $user->asig_guia='No';
                    $user->save();
                }else{
                    $user->asig_guia='Si';
                    $user->save();
                }

            }
            if($edit_p == 'list_guia'){

                if($user->list_guia == 'Si'){
                    $user->list_guia='No';
                    $user->save();
                }else{
                    $user->list_guia='Si';
                    $user->save();
                }

            }
            //---------------------------------- config

                //------------------------------------- usuarios
                if($edit_p == 'list_user'){

                    if($user->list_user == 'Si'){
                        $user->list_user='No';
                        $user->save();
                    }else{
                        $user->list_user='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'list_edit'){

                    if($user->list_edit == 'Si'){
                        $user->list_edit='No';
                        $user->save();
                    }else{
                        $user->list_edit='Si';
                        $user->save();
                    }


                }
                //------------------------------------- asignaturas
                if($edit_p == 'list_asig'){

                    if($user->list_asig == 'Si'){
                        $user->list_asig='No';
                        $user->save();
                    }else{
                        $user->list_asig='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'create_asig'){

                    if($user->create_asig == 'Si'){
                        $user->create_asig='No';
                        $user->save();
                    }else{
                        $user->create_asig='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'edit_asig'){

                    if($user->edit_asig == 'Si'){
                        $user->edit_asig='No';
                        $user->save();
                    }else{
                        $user->edit_asig='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'elim_asig'){

                    if($user->elim_asig == 'Si'){
                        $user->elim_asig='No';
                        $user->save();
                    }else{
                        $user->elim_asig='Si';
                        $user->save();
                    }


                }
                //------------------------------------- auditoria
                if($edit_p == 'list_auditoria'){

                    if($user->list_auditoria == 'Si'){
                        $user->list_auditoria='No';
                        $user->save();
                    }else{
                        $user->list_auditoria='Si';
                        $user->save();
                    }


                }
                //------------------------------------- aulas
                if($edit_p == 'list_aula'){

                    if($user->list_aula == 'Si'){
                        $user->list_aula='No';
                        $user->save();
                    }else{
                        $user->list_aula='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'create_aula'){

                    if($user->create_aula == 'Si'){
                        $user->create_aula='No';
                        $user->save();
                    }else{
                        $user->create_aula='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'edit_aula'){

                    if($user->edit_aula == 'Si'){
                        $user->edit_aula='No';
                        $user->save();
                    }else{
                        $user->edit_aula='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'elim_aula'){

                    if($user->elim_aula == 'Si'){
                        $user->elim_aula='No';
                        $user->save();
                    }else{
                        $user->elim_aula='Si';
                        $user->save();
                    }


                }
                //------------------------------------- cargos
                if($edit_p == 'list_cargo'){

                    if($user->list_cargo == 'Si'){
                        $user->list_cargo='No';
                        $user->save();
                    }else{
                        $user->list_cargo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'create_cargo'){

                    if($user->create_cargo == 'Si'){
                        $user->create_cargo='No';
                        $user->save();
                    }else{
                        $user->create_cargo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'edit_cargo'){

                    if($user->edit_cargo == 'Si'){
                        $user->edit_cargo='No';
                        $user->save();
                    }else{
                        $user->edit_cargo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'elim_cargo'){

                    if($user->elim_cargo == 'Si'){
                        $user->elim_cargo='No';
                        $user->save();
                    }else{
                        $user->elim_cargo='Si';
                        $user->save();
                    }


                }
                //------------------------------------- periodos
                if($edit_p == 'list_periodo'){

                    if($user->list_periodo == 'Si'){
                        $user->list_periodo='No';
                        $user->save();
                    }else{
                        $user->list_periodo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'create_periodo'){

                    if($user->create_periodo == 'Si'){
                        $user->create_periodo='No';
                        $user->save();
                    }else{
                        $user->create_periodo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'edit_periodo'){

                    if($user->edit_periodo == 'Si'){
                        $user->edit_periodo='No';
                        $user->save();
                    }else{
                        $user->edit_periodo='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'elim_periodo'){

                    if($user->elim_periodo == 'Si'){
                        $user->elim_periodo='No';
                        $user->save();
                    }else{
                        $user->elim_periodo='Si';
                        $user->save();
                    }


                }
                // if($edit_p == 'act/desac_periodo'){

                //     if($user->act/desac_periodo == 'Si'){
                //         $user->act/desac_periodo='No';
                //         $user->save();
                //     }else{
                //         $user->act/desac_periodo='Si';
                //         $user->save();
                //     }


                // }
                //------------------------------------- respaldar BD
                if($edit_p == 'res_BD'){

                    if($user->res_BD == 'Si'){
                        $user->res_BD='No';
                        $user->save();
                    }else{
                        $user->res_BD='Si';
                        $user->save();
                    }


                }
                //------------------------------------- Secciones
                if($edit_p == 'list_seccion'){

                    if($user->list_seccion == 'Si'){
                        $user->list_seccion='No';
                        $user->save();
                    }else{
                        $user->list_seccion='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'create_seccion'){

                    if($user->create_seccion == 'Si'){
                        $user->create_seccion='No';
                        $user->save();
                    }else{
                        $user->create_seccion='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'edit_seccion'){

                    if($user->edit_seccion == 'Si'){
                        $user->edit_seccion='No';
                        $user->save();
                    }else{
                        $user->edit_seccion='Si';
                        $user->save();
                    }


                }
                if($edit_p == 'elim_seccion'){

                    if($user->elim_seccion == 'Si'){
                        $user->elim_seccion='No';
                        $user->save();
                    }else{
                        $user->elim_seccion='Si';
                        $user->save();
                    }


                }
                
                flash('PERMISO EDITADO CON ÉXITO!','success');
                $usuarios=User::where('tipo_user','<>','Representante')->get();
                $num=0;
                return View('admin.usuarios.edit_per', compact('usuarios','num'));
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
