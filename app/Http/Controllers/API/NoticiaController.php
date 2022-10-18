<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticia=Noticia::included()
        ->filter()
        ->sort()
        ->get();
        return $noticia;
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
            'nombre'=> 'required|max:300',
            'descripcion'=> 'required|max:300',
        ]);
        $noticia= Noticia::create($request ->all());
        return $noticia;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia =Noticia::included()->findOrFail($id);
        return $noticia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Noticia $noticia)
    {
        $noticia->update($request->all());
        return $noticia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return $noticia;
    }
}
