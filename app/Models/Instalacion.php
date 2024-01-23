<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    use HasFactory;
    protected $table = 'instalaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo_instalacion',
        'aforo',
        'bloqueado',
        'urlphoto'
    ];
            
    public function reserva()
    {
        return $this->hasMany(Reserva::class)->nullable();
    }

}
