<?php

use App\Models\TemporalLink;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

if (!function_exists('temp_route')) {
    function temp_route(string $name, array $parameters = []) {
        $temporalLink = TemporalLink::query()->create([
            'link' => TemporalLink::generateLink(),
            'route_name' => $name,
            'route_data' => $parameters,
        ]);

        return route('link', ['link' => $temporalLink->link]);
    }
}

if (!function_exists('hash_user_route')) {
    function hash_user_url(string $url, User $user): string
    {
        return md5($url . $user->id);
    }
}

if (!function_exists('user_route')) {
    function user_route(string $name, array $parameters = []) {
        if (!Auth::check()) {
            throw new UnauthorizedHttpException('can\'t create user_route for unauthorized user');
        }
        $route = route($name, $parameters);
        $hash = hash_user_url($route, Auth::user());

        return route($name, $parameters) . '?hash=' . $hash;
    }
}
