<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // En el modelo 'Monitor'
    public function calendario()
    {
        return $this->belongsTo(Calendario::class)->nullable(); 
    }

}
