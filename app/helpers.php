<?php

use App\Models\TemporalLink;

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
