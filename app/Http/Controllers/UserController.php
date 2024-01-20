<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function Usuario(){

        if (Auth::check()) {
            $usuario =Auth::user();
            return view ('UserInfo',[ 'usuario' => $usuario
            
            ]);
        }
        else{
            return redirect()->route('login');
        }
        
    }
}
