<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VerifyUserRelatedLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            throw new NotFoundHttpException();
        }

        $routeInfoHash = $request->get('hash');

        $currentRoute = Route::getCurrentRoute();
        $userRouteInfoHash = hash_user_url(route($currentRoute->getName(), $currentRoute->parameters()), Auth::user());

        if ($routeInfoHash !== $userRouteInfoHash) {
            throw new NotFoundHttpException();
        }

        return $next($request);

    }
}
