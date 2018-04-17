<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mensualidades;
use App\Inscripcion;
use App\Meses;
use App\Pagos;
use App\Periodos;
use App\Personal;
use App\Representantes;
use App\DatosBasicos;
use App\User;
use Session;
use Mail;
class MensualidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsex
     */
    public function index()
    {
        $email=\Auth::user()->email;
        $personal=Personal::where('correo',$email)->first();
        $representante=Representantes::where('email',$email)->first();
        $admin=User::where('email',$email)->first();
        
        if (count($personal)>0 || count($admin)>0 AND count($representante) == 0) {


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
            $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->get();
            // dd(count($inscripcion));
            $pagos=Pagos::all();
            $monto=0;
           
            
           foreach ($mensualidades as $key) {
                foreach ($inscripcion as $key2) {
                    if($key2->id==$key->id_inscripcion AND $key->estado == "Cancelado"){

                        $monto+=$key->pagos->monto;

                        
                    }

                }
               
           }
           $mensualidades2=Mensualidades::where('estado','Sin Pagar')->get();

            
        }elseif(count($representante)>0 AND count($personal) == 0){

            $representante=Representantes::where('email',$email)->first();
            $datosBasicos=DatosBasicos::where('id_representante',$representante->id)->get();
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
            $inscripcion=Inscripcion::all();
            $pagos=Pagos::all();
            $monto=0;
           
           foreach ($representante->datos_basicos as $key) {
                foreach ($inscripcion as $key2 ) {
                    foreach ($mensualidades as $key3) {
                        if ($key2->id_datosBasicos == $key->id) {
                            if ($key3->id_inscripcion == $key2->id) {
                                $mensualidades=Mensualidades::where('id_inscripcion',$key2->id)->get();
                                //dd(count($key3));
                                $inscripcion=Inscripcion::where('id_periodo',$periodo->id)->where('id',$key2->id)->get();
                                $mensualidades2=Mensualidades::where('id_inscripcion',$key2->id)->where('estado','Sin Pagar')->get();
                            }
                        }
                    }
                }    
            }


            $o=0;
        
                
            // dd(count($datosBasicos));
                   foreach ($mensualidades as $key) {
                        foreach ($inscripcion as $key2) {
                            if($key2->id==$key->id_inscripcion AND $key->estado == "Cancelado"){

                                $monto+=$key->pagos->monto;

                                
                            }

                        }
                       
                   }

        }


            // dd(count($mensualidades2));
            $num=0;
            return View('admin.mensualidades.index',compact('num','mensualidades','mensualidades2','meses','estudiantes','id_periodo','id_mes','inicio','fin','anio_actual','monto','inscripcion','datosBasicos'));
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
        // //buscando la mensualidad previamente registrada
        $buscar_mens=Mensualidades::find($request->id);
        $estudiante=$buscar_mens->inscripcion->datosbasicos->nombres." ".$buscar_mens->inscripcion->datosbasicos->apellidos;
        $cedula=$buscar_mens->inscripcion->datosbasicos->nacionalidad.".- ".$buscar_mens->inscripcion->datosbasicos->cedula;
        // //buscando el ultimo monto registrado para ese mes
        $pagos=Pagos::where('id_mes',$request->id_mes)->get()->last();
        $mes=$pagos->meses->mes;

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
        // ---enviando correo




        // $destinatario='imagine.breacker@gmail.com';
        // // $destinatario=$buscar_mens->inscripcion->datosbasicos->representantes->email;
        // //dd($destinatario);
        // $asunto="Confirmación de pago de mensualidad";
        // $contenido="PAGO DE MENSUALIDAD";
        // $data=array("contenido"=> $contenido,"estudiante" => $estudiante,"cedula" => $cedula,"mes" => $mes);

        //     $r=Mail::send('admin.mensualidades.respuesta_correo', $data, function ($message) use ($asunto,$destinatario){
        //         $message->from('colegiourdanetacampoelias@gmail.com');
        //         $message->to($destinatario)->subject($asunto);
        //     });

        // if ($r) {
        //    flash('MENSUALIDAD CANCELADA CON ÉXITO! Y CORREO DE CONFIRMACIÓN ENVIADO!','success');
        // } else {
        //    flash('NO SE PUDO REALIZAR LA CANCELACIÓN DE LA MENSUALIDAD !','error');
        // }
        // flash('MENSUALIDAD CANCELADA CON ÉXITO! PERO NO SE HA PODIDO ENVIAR LA FACTURA AL CORREO DEBIDO A UN ERROR: [host smtp.gmail.com [php_network_getaddresses: getaddrinfo failed: Host desconocido]');
        
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


        $buscar_mens=Mensualidades::find($request->id_mensualidad2);
        $estudiante=$buscar_mens->inscripcion->datosbasicos->nombres." ".$buscar_mens->inscripcion->datosbasicos->apellidos;
        $cedula=$buscar_mens->inscripcion->datosbasicos->nacionalidad.".- ".$buscar_mens->inscripcion->datosbasicos->cedula;
        //buscando el ultimo monto registrado para ese mes
        $pagos=$buscar_mens->pagos->meses->mes;
        $mes=$pagos;


        $mensualidad=Mensualidades::find($request->id_mensualidad2);

        $mensualidad->estado="Sin Pagar";
        $mensualidad->forma_pago=1;
        $mensualidad->codigo_operacion='';

        $mensualidad->save();

        // $destinatario='imagine.breacker@gmail.com';
        // // $destinatario=$buscar_mens->inscripcion->datosbasicos->representantes->email;
        // //dd($destinatario);
        // $asunto="Confirmación de estado de mensualidad";
        // $contenido="PAGO DE MENSUALIDAD COLOCADA COMO SIN PAGAR!";
        // $data=array("contenido"=> $contenido,"estudiante" => $estudiante,"cedula" => $cedula,"mes" => $mes);

        // $r=Mail::send('admin.mensualidades.sinpagar_correo', $data, function ($message) use ($asunto,$destinatario){
        // $message->from('colegiourdanetacampoelias@gmail.com');
        
        //     $message->to($destinatario)->subject($asunto);
        // });
        // if ($r) {
        //    flash('MENSUALIDAD COLOCADA COMO SIN PAGAR CON ÉXITO!! Y CORREO DE CONFIRMACIÓN ENVIADO!','success');
        // } else {
        //    flash('NO SE PUDO REALIZAR LA CANCELACIÓN DE LA MENSUALIDAD !','error');
        // }
        
        
        flash('MENSUALIDAD COLOCADA COMO SIN PAGAR CON ÉXITO!!','success');
        return redirect()->route('admin.mensualidades.index');
        
    }
}
