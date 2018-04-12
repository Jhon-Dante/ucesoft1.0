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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
