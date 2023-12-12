<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
    use HasFactory;
    protected $table = 'Recepcionistas';
     // En cada modelo de rol (Administrador, Recepcionista, Socio, Monitor)
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
