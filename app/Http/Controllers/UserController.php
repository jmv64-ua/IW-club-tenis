<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
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
    public function Usuarioedit($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'direccion' => 'required',
            'codigo_postal'=>'required',
            'telefono' => 'required',
            'descripcion'  => 'required',
            'resumen '  => 'required',
        ]);

        if (Auth::check()) {
            $usuario = User::find(Auth::user()->id);
            if($request->password != null && $request->Rpassword != null){
                if($request->password == $request->Rpassword ){
                    $usuario->password=Hash::make($request->password);
                }
            }
            else if($request->password == null && $request->Rpassword == null){

            }
            else{
                return redirect()->back()->with('error', 'Contraseñas no coinciden');
            }
            $usuario->email=$request->email;
            $usuario->direccion=$request->direccion;
            $usuario->codigo_postal=$request->codigo_postal;
            $usuario->telefono=$request->telefono;
            $usuario->descripcion=$request->descripcion;
            $usuario->resumen=$request->resumen;

            
        }
        else{
            return redirect()->route('login');
        }
        
    }
}
