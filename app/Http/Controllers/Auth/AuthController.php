<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Redirect;
use Session;
use App\Periodos;
use App\DatosBasicos;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
    }
    public function showLoginForm()
    {
        
        $anio = date('Y');
        $periodos2= Periodos::where('status','Activo')->first();
        $periodos = Periodos::where('periodo', '<=', $anio." - ".$anio+1)->get();
        //dd($periodos2);
        
        return view('auth.login', ['periodos' => $periodos,'periodos2' => $periodos2]);
    }
    public function login(LoginRequest $request)
    {
        
            if(Auth::check())
            {
                Session::flash('message-error', 'Usuario ya conectado.');
                return Redirect::to('/home');
                $datosBasicos=DatosBasicos::all();
            }
            if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
            {

                $datosBasicos=DatosBasicos::all();
                $nombrePeriodo = Periodos::where('id', $request['periodos'])->first();
                Session::flash('message', 'Bienvenido');
                Session::put('periodoNombre', $nombrePeriodo->periodo);
                Session::put('periodo', $request['periodos']);
                return Redirect::to('/home');
            }
            else{
                return Redirect()->back()->with('message-error-session', 'Datos Incorrectos');
            }
        
    }
    /*
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'pregunta' => $data['pregunta'],
            'respuesta' => $data['respuesta'],
            'tipo' => $data['tipo'],
        ]);
    }
}
