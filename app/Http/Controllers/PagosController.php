<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagos;
use App\Meses;
use Session;
use App\Http\Requests;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_periodo=Session::get('periodo');
        $meses=Meses::all();

        $mes_actual=date('m');
        $anio_actual=date('Y');
            //dd($id_mes);
            //----
            $inicio = substr(Session::get('periodoNombre'),0, 4);
            //dd($inicio); 
            $fin = substr(Session::get('periodoNombre'), 7);
            //dd($fin); 
            //---

        $enero=Pagos::where('id_periodo',$id_periodo)->where('id_mes',1)->get()->last();
        $febrero=Pagos::where('id_periodo',$id_periodo)->where('id_mes',2)->get()->last();
        $marzo=Pagos::where('id_periodo',$id_periodo)->where('id_mes',3)->get()->last();
        $abril=Pagos::where('id_periodo',$id_periodo)->where('id_mes',4)->get()->last();
        $mayo=Pagos::where('id_periodo',$id_periodo)->where('id_mes',5)->get()->last();
        $junio=Pagos::where('id_periodo',$id_periodo)->where('id_mes',6)->get()->last();
        $julio=Pagos::where('id_periodo',$id_periodo)->where('id_mes',7)->get()->last();
        $agosto=Pagos::where('id_periodo',$id_periodo)->where('id_mes',8)->get()->last();
        $septiembre=Pagos::where('id_periodo',$id_periodo)->where('id_mes',9)->get()->last();
        $octubre=Pagos::where('id_periodo',$id_periodo)->where('id_mes',10)->get()->last();
        $noviembre=Pagos::where('id_periodo',$id_periodo)->where('id_mes',11)->get()->last();
        $diciembre=Pagos::where('id_periodo',$id_periodo)->where('id_mes',12)->get()->last();

        return View('admin.pagos_monto.index', compact('meses','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','mes_actual','anio_actual','inicio','fin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_periodo=Session::get('periodo');
        $pagos=Pagos::where('id_periodo',$id_periodo)->get();

        if (count($pagos)>0) {
            flash("NO ES POSIBLE CREAR NUEVOS MONTOS PUES YA EXISTEN PARA ESTE PERIODO!", 'error'); 
                return redirect()->back();
        } else {
            
            return View('admin.pagos_monto.create',compact('anio'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_periodo=Session::get('periodo');
        for ($i=1; $i <=12 ; $i++) { 
            
        $pagos=Pagos::create(['id_mes' => $i,
                        'monto' => $request->monto,
                        'id_periodo' => $id_periodo]);

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
    public function edit(Request $request,$id)
    {
        $id_periodo=Session::get('periodo');
        $pago=Pagos::find($request->key);
        $mes=$pago->id_mes;
        if ($mes<9) {
            for ($i=$mes; $i < 9; $i++) { 
                $pago=Pagos::where('id_mes',$i)->where('id_periodo',$id_periodo)->first();
                $pago->monto=$request->monto_nuevo;
                $pago->save();
        
            }
        } else {
            if ($mes>=9 and $mes<=12) {
                $c=0;
                for ($i=$mes; $i <= 12; $i++) { 
                    $pago1=Pagos::where('id_mes',$i)->where('id_periodo',$id_periodo)->first();

                    $pago1->monto=$request->monto_nuevo;
                    $pago1->save();
                }

                //dd($c);
                for ($i=1; $i < 9; $i++) { 
                    $pago2=Pagos::where('id_mes',$i)->where('id_periodo',$id_periodo)->first();
                    $pago2->monto=$request->monto_nuevo;
                    $pago2->save();
                }
            } 
        }
            
        flash("MONTO ACTUALIZADO CON ÉXITO!", 'success'); 
                return redirect()->back();
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
