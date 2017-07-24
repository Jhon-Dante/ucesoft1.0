<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cursos;

use Laracasts\Flash\Flash;

use App\Http\Requests\CursosRequest;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $cursos=Cursos::all();
        return View('admin.cursos.index',compact('cursos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursosRequest $request)
    {
        $this->validate($request, [
        'cargo' => 'required'
         ]);

        dd($request->all());

/*        if(!empty($request->curso)){

            $cursos=Cursos::where('curso',$request->curso)->get();
            //dd(count($cursos));
            if (count($cursos)==0) {
                $cursos=Cursos::create(['curso' => $request->curso]);
                if($cursos){
                    flash("Se ha registrado  de forma exitosa!", 'success');
                }else{
                    flash("Disculpe, no se pudo realizar el registro", 'error');
                }
            }

        }
        
        $cursos=Cursos::all();
        return View('admin.cursos.index',compact('cursos'));
*/    }

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
        $curso=Cursos::find($id);
        //dd($curso);

        return View('admin.cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursosRequest $request, $id)
    {
        
        if(!empty($request->curso)){

            $cursos=Cursos::where('curso',$request->curso)->where('id','<>',$id)->get();
            //dd(count($cursos));
            if (count($cursos)==0) {
                $cursos=Cursos::find($id);
                $cursos->curso=$request->curso;
                $cursos->save();

                
                    flash("Se ha actualizado de forma exitosa!", 'success');
                
                
            }

        }
        $num=0;
        $cursos=Cursos::all();
        return View('admin.cursos.index',compact('cursos','num'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
