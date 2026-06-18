<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParticipantMiddleware
{
    /**
     * Garante que o usuário logado tenha perfil de participante.
     * Se não estiver autenticado, redireciona para login.
     * Se for de outro perfil, retorna para a home com aviso.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'participant') {
            return redirect()->route('home')
                ->with('error', 'Acesso restrito a participantes.');
        }

        return $next($request);
    }
}