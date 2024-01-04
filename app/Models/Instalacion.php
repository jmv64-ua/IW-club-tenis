<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    use HasFactory;
    protected $table = 'instalaciones';
            
    public function reserva()
    {
        return $this->hasMany(Reserva::class)->nullable();
    }

}
