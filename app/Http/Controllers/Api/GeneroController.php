<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function view(){
        
        $Genero = Genero::all();
        $Sinopsis = $Genero;
        return response()->json([
            "status" => "ok",
            "result"=> 
                $Genero
                

        ]);
    }

    public function listgenero($id)
{
    try {
        $genero = Genero::findOrFail($id);
        $animes = $genero->animes()->orderBy('YearLanzamiento', 'desc')->get();

        return response()->json([
            "status" => "ok",
            "genero" => $genero->Nombre, // Agrega el nombre del género
            "result" => $animes
        ]);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "404",
                "error_msg" => "No encontrado"
            )
        ], 404);
    }
}
}