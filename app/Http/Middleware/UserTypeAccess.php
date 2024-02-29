<?php

namespace App\Http\Middleware;

use App\Models\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userTypes): Response
    {
        // Get the authenticated user
        $user = $request->user();

        // Convert $userTypes strings to their respective IDs
        $userTypeIds = collect($userTypes)->map(function ($userType) {
            return UserType::where('name', $userType)->value('id');
        });

        // Check if the user is authenticated and has the required user type
        if ($user && $userTypeIds->contains($user->user_type_id)) {
            return $next($request);
        }

        // If user does not have the required user type, throw 401
        abort(401, 'Unauthorized.');
    }
}
