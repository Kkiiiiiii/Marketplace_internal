<?php

namespace App\Http\Middleware;

use App\Models\Toko;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StatusToko
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Harus login terlebih dahulu.');
        }

        $toko = $user->toko; // pastikan relasi user->toko ada di model User

        if (!$toko) {
            return redirect()->route('buka-toko')->with('error', 'Anda belum memiliki toko.');
        }

        if ($toko->status !== 'aktif') {
            return redirect()->route('buka-toko')->with('error', 'Toko Anda belum disetujui admin.');
        }

        return $next($request);
    }

}
