<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';
    // En el modelo 'Actividad'
    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
