<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): JsonResponse
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);
 
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
 
            return response()->json('Usuário Logado');
        }
 
        return response()->json('Erro com suas credencias', 422);
    }
}