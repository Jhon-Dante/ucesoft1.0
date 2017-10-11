<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mensualidades;
use App\Inscripcion;
use App\Meses;
use App\Pagos;
use App\Periodos;
use Session;
class MensualidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_mes=date('m');
        $anio_actual=date('Y');
        //dd($id_mes);
        //----
        $inicio = substr(Session::get('periodoNombre'),0, 4);
        //dd($inicio); 
        $fin = substr(Session::get('periodoNombre'), 7);
        //dd($fin); 
        //---
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::where('id',$id_periodo)->first();
        $meses=Meses::all();
        $mensualidades=Mensualidades::all();
        $estudiantes=Inscripcion::where('id_periodo',$periodo->id)->get();
        //dd($mensualidades);
        
        $num=0;
        return View('admin.mensualidades.index',compact('num','mensualidades','meses','estudiantes','id_periodo','id_mes','inicio','fin','anio_actual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.mensualidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function contabilidad()
    {
        
    }
    public function store(Request $request)
    {
        //buscando la mensualidad previamente registrada
        $buscar_mens=Mensualidades::find($request->id);
        //buscando el ultimo monto registrado para ese mes
        $pagos=Pagos::where('id_mes',$request->id_mes)->get()->last();

        if ($pagos->id==$buscar_mens->id_pago) {
            # quiere decir que no se ha modificado el monto de esta mes
            $buscar_mens->estado="Cancelado";
            $buscar_mens->save();

        } else {
            # quiere decir que hay que actualizar el id de pago
            $buscar_mens->id_pago=$pagos->id;
            $buscar_mens->estado="Cancelado";
            $buscar_mens->save();

        }
        
        flash('MENSUALIDAD CANCELADA CON ÉXITO!','success');

        return redirect()->route('admin.mensualidades.index');


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
       
    }

    public function buscar($id)
    {
        return $x=\DB::select('select mensualidades.*,meses.mes,datos_basicos.nombres,datos_basicos.apellidos,periodos.periodo from mensualidades,meses,periodos,datos_basicos where mensualidades.id_periodo=periodos.id and mensualidades.id_datosBasicos = datos_basicos.id and mensualidades.id='.$id);
        
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
        //dd($request->all());
        $mensualidad=Mensualidades::find($request->id_mensualidad);
        //dd($request->forma_pago);
        $mensualidad->forma_pago=$request->forma_pago;
        $mensualidad->codigo_operacion=$request->codigo_operacion;

        $mensualidad->save();

        flash('MENSUALIDAD ACTUALIZADA CON ÉXITO!','success');

        return redirect()->route('admin.mensualidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mensualidad=Mensualidades::find($request->id_mensualidad2);

        $mensualidad->estado="Sin Pagar";
        $mensualidad->forma_pago=1;
        $mensualidad->codigo_operacion='';

        $mensualidad->save();

        flash('MENSUALIDAD COLOCADA COMO SIN PAGAR CON ÉXITO!','success');

        return redirect()->route('admin.mensualidades.index');
    }
}
