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

        return View('admin.pagos_monto.index', compact('meses','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'));
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
        //
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
