<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
{
    private $urlapi= 'https://ebisu.firstrow2.com/api';
    private $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTh9.SkPVgHiPlhtLmwgNCWM6bAeFEiYz-x4ljMMrWLdUGeM';
    public function PasarelaDePago(){

        if (Auth::check()) {
            $usuario =Auth::user();
            return view ('recargaSalgo',[ 'usuario' => $usuario
            
            ]);
        }
        else{
            return redirect()->route('login');
        }


        
    }

    public function post(Request $request)
{
    $url = $this->urlapi.'/transactions';

    try {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post($url, [
            "concept" => "Recarga de saldo de: " .Auth::user()->id ,
            "amount" => $request->monto_recarga,
            "receipt_number" => "000000".Auth::user()->id,
            "payment" => [
                "type" => "credit_card",
                "values" => [
                    "Visa_user" => $request->nombre_tarjeta,
                    "credit_card_number" => $request->numero_tarjeta,
                    "credit_card_expiration_month" => $request->mes,
                    "credit_card_expiration_year" => $request->anyo,
                    "credit_card_csv" => $request->codigo_seguridad,
                ]
            ]
        ]);

        // Verifica si la respuesta de la API indica que la transacción fue aceptada
        if ($response->json('state') === 'accepted') {
            $usuario = User::find(Auth::user()->id);
            $usuario->saldo = $usuario->saldo + $request->monto_recarga;
            $usuario->save();
            
            // Si la transacción fue aceptada, redirige con un mensaje de éxito
            return redirect()->back()->with('success', '¡El pago fue exitoso!');
        } else {
            // Si la transacción no fue aceptada, redirige con un mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema con la transacción.');
        }
    } catch (\Exception $e) {
        // Si ocurre una excepción durante la solicitud, redirige con un mensaje de error
        return redirect()->back()->with('error', 'Error al procesar la solicitud. Inténtelo de nuevo.');
    }
}

}
