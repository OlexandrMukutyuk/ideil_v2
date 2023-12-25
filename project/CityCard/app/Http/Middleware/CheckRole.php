<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Перевірка, чи у користувача є роль 'admin'
        if ($request->user()->hasRole('admin')) {
            // Якщо так, продовжуємо виконання запиту
            return $next($request);
        }

        // Якщо користувач не має ролі 'admin', можна відправити відповідь з помилкою або перенаправити куди-небудь
        return response('Access denied. You do not have the required role.', 403);
    }
}
