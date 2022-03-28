<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('pelicula.index')->with('peliculas',$peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peliculas = new Pelicula();
        $peliculas->Codigo = $request->get('Codigo');
        $peliculas->Nombre = $request->get('Nombre');
        $peliculas->Categoria = $request->get('Categoria');
        $peliculas->Cantidad = $request->get('Cantidad');
        $peliculas->Precio = $request->get('Precio');
        $peliculas->save();

        return redirect('/peliculas');
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
        $pelicula = Pelicula::find($id);
        return view('pelicula.edit')->with('pelicula',$pelicula);
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
        $pelicula=Pelicula::find($id);

        $pelicula = new Pelicula();
        $pelicula->Codigo = $request->get('Codigo');
        $pelicula->Nombre = $request->get('Nombre');
        $pelicula->Categoria = $request->get('Categoria');
        $pelicula->Cantidad = $request->get('Cantidad');
        $pelicula->Precio = $request->get('Precio');

        $peliculas->save();

        return redirect('/peliculas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();
        return redirect('/peliculas');
    }
}
