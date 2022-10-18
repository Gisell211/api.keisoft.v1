<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\Fundacion;
use Illuminate\Http\Request;

class FundacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especie=Especie::included()
        ->filter()
        ->sort()
        ->get();
        return $especie;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:255',
            'direccion' => 'required|max:255',
            'noticias_id' => 'required|max:255',
           
           
                ]);
            $fundacion=Fundacion::create($request->all());
            return $fundacion;
        
            
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fundacion  $fundacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fundacion =Fundacion::included()->findOrFail($id);
        return $fundacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fundacion  $fundacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fundacion $fundacion)
    {
        $fundacion->update($request->all());
        return $fundacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fundacion  $fundacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundacion $fundacion)
    {
        $fundacion->delete();
        return $fundacion;
    }
}
