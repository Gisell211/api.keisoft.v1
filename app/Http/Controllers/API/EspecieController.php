<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
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
            'edad'=> 'required|max:300',
            'raza'=> 'required|max:300',
            'nombre'=> 'required|max:300',
            'genero'=> 'required|max:300',
        ]);
        $especie= Especie::create($request ->all());
        return $especie;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especie =Especie::included()->findOrFail($id);
        return $especie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especie $especie)
    {
        $especie->update($request->all());
        return $especie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        $especie->delete();
        return $especie;
    }
}
