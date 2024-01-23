<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'instalacion_id',
        'user_id',
        'nombre',
        'precio',
        'descripcion',
        'fechaI',
        'fechaFin',
        'urlphoto'
    ];

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
