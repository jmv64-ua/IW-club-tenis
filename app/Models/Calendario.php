<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{   
    protected $table = 'calendarios';
    use HasFactory;
    public function actividad()
    {
        return $this->belongsTo(Actividad::class)->nullable();
    }

    public function monitor()
    {
        return $this->belongsTo(Monitor::class)->nullable();
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class)->nullable();
    }

}
