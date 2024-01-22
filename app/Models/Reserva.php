<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'fecha_alta',
        'fecha_reserva',
        'instalacion_id',
        'calendario_id',
        'actividad_id',
        'hora_reserva',
        'duracion',
    ];

    // En el modelo 'Reserva'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendario()
    {
        return $this->belongsTo(Calendario::class)->nullable();
    }
    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }
    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }

}
