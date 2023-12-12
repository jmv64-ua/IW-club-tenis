<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'Reservas';
    // En el modelo 'Reserva'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendario()
    {
        return $this->belongsTo(Calendario::class)->nullable();
    }

}
