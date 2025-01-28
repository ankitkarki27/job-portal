<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // If the user is not logged in, redirect them to the login page
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the authenticated user's role
        $authUserRole = Auth::user()->role;

        // Log the role information
        Log::info('RoleManager Middleware Check:', [
            'authenticated_user_role' => $authUserRole,
            'required_role' => $role,
        ]);

        // Role-based access logic
        if ($role == 'admin' && $authUserRole == 1) {
            return $next($request);
        }

        if ($role == 'applicant' && $authUserRole == 2) {
            return $next($request);
        }

        if ($role == 'company' && $authUserRole == 3) {
            return $next($request);
        }

        // If role does not match, redirect to the appropriate dashboard
        switch ($authUserRole) {
            case 1:
                return redirect()->route('admin.home');
            case 2:
                return redirect()->route('applicant.home');
            case 3:
                return redirect()->route('company.home');
            default:
                return redirect()->route('login');
        }
    }
}
