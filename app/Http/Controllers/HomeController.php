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

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
        $preinscripcion=Preinscripcion::all();
        $inscripcion=Inscripcion::all();
        $mensualidades=Mensualidades::where('estado','Sin Pagar')->get();
        $datosBasicos=DatosBasicos::all();
        return view('home', compact('mensualidades','datosBasicos','inscripcion','preinscripcion'));
    }
}