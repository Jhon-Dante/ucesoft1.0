<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Preinscripcion;
use App\Inscripcion;
use App\Mensualidades;
use App\DatosBasicos;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Representantes;
use App\Auditoria;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $usuario=\Auth::user()->tipo_user;
        $num=0;
        

        if ($usuario == 'Administrador(a)') {
            $preinscripcion=Preinscripcion::all();
            $inscripcion=Inscripcion::all();
            $datosBasicos=DatosBasicos::all();
            $mensualidades=Mensualidades::where('estado','Sin Pagar')->get();

        }
        elseif ($usuario == 'Representante') 
        {
            $mensualidades=Mensualidades::where('estado','Sin Pagar')->get();
            $email=\Auth::user()->email;
            $representante=Representantes::where('email',$email)->first();
            $datosBasicos=DatosBasicos::where('id_representante',$representante->id)->get();
            $inscripcion=Inscripcion::all();
            
            $cont=0;
            foreach ($representante->datos_basicos as $key) {
                foreach ($inscripcion as $key2 ) {
                    foreach ($mensualidades as $key3) {
                        if ($key2->id_datosBasicos == $key->id) {
                            if ($key3->id_inscripcion == $key2->id_datosBasicos) {
                                $mensualidades=Mensualidades::where('estado','Sin Pagar')->where('id_inscripcion',$key2->id)->get();
                            }
                        }
                    }
                }    
            }
        }

        

        
        
        
        return view('home', compact('mensualidades','datosBasicos','inscripcion','preinscripcion','num'));
    }


    public function auditoria()
    {
        $auditoria=Auditoria::all();
        return View('admin.personal.auditoria', compact('auditoria'));
    }
}