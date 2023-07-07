<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    protected $fillable = ['Nombre', 'Numero', 'Duracion', 'FechaLanzamiento', 'Imagen',  'tiempo_visualizacion', 'temporada_id'];

    use HasFactory;

    public function Temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id');
    }

    public function Servidor()
    {
        return $this->hasMany(Servidor::class);
    }
    
}
