<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the user's role from the database
        $userRole = Auth::user()->role;

        // Check if the user's role matches the required role
        if ($role === 'admin' && $userRole === 'admin') {
            return $next($request);
        } elseif ($role === 'applicant' && $userRole === 'applicant') {
            return $next($request);
        } elseif ($role === 'company' && $userRole === 'company') {
            return $next($request);
        }

        // Redirect if the role does not match
        return redirect()->route('dashboard');
    }
}
