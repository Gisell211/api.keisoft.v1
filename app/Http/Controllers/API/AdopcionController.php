<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Adopcion;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adopcion=Adopcion::included()
        ->filter()
        ->sort()
        ->get();
        return $adopcion;
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
            
            'user_id' => 'required|max:255',
            'especie_id' => 'required|max:255',
            'fundacion_id' => 'required|max:255',

           
           
                ]);
            $adopcion=Adopcion::create($request->all());
            return $adopcion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adopcion =Adopcion::included()->findOrFail($id);
        return $adopcion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopcion $adopcion)
    {
        $adopcion->update($request->all());
        return $adopcion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adopcion $adopcion)
    {
        $adopcion->delete();
        return $adopcion;
    }
}
