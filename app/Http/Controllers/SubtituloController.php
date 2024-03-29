<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Subtitulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubtituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    public function crear($id){
         $capitulo = Capitulo::findOrFail($id);
         return view('subtitulos.create', compact('capitulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subtitulo = new Subtitulo();

        $request ->validate([
            'Idioma'=>'required',
            'Url'=>'required',
            'Abreviatura'=>'required',
            'Default'=> 'required',
            'capitulo'=> 'required'
            

        ]);
        

        $subtitulo = Subtitulo::create([
            'Idioma'=>$request->Idioma,
            'Url'=>$request->Url,
            'Abreviatura'=>$request->Abreviatura,
            'Default'=> $request->Default,
            'capitulo_id'=>$request->capitulo
        ]);

        return redirect()->route('subtitulo.show', $subtitulo->capitulo_id)->with('success', 'Idioma creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capitulo = Capitulo::find($id);
        $subtitulo =  $capitulo->Subtitulo;
        return view('subtitulos.index', compact('subtitulo', 'capitulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtitulo = Subtitulo::findOrFail($id);
        $capitulo = $subtitulo->capitulo;
        return view('subtitulos.edit', compact('subtitulo', 'capitulo'));
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
        $subtitulo = Subtitulo::findOrFail($id);

        $request->validate([
            'Idioma' => 'required',
            'Url' => 'required',
            'Abreviatura' => 'required',
            'Default' => 'required',
        ]);
    
        $subtitulo->update([
            'Idioma' => $request->Idioma,
            'Url' => $request->Url,
            'Abreviatura' => $request->Abreviatura,
            'Default' => $request->Default,
        ]);
    
        return redirect()->route('subtitulo.show', $subtitulo->capitulo_id)->with('success', 'Subtítulo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subtitulo = Subtitulo::findOrFail($id);
    $capituloId = $subtitulo->capitulo_id; // Obtener el ID del capítulo antes de eliminar el subtítulo

    $subtitulo->delete();

    return redirect()->route('subtitulo.show', $capituloId)->with('success', 'Subtítulo eliminado exitosamente.');
    }
}
