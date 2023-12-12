<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    use HasFactory;
     // En cada modelo de rol (Administrador, Recepcionista, Socio, Monitor)
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
