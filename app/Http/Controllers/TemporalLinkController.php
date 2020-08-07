<?php


namespace App\Http\Controllers;


use App\Models\TemporalLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TemporalLinkController extends Controller
{
    public function get(TemporalLink $link) {
        $link->update([
            'link' => TemporalLink::generateLink(),
        ]);

        $request = Request::create(route($link->route_name, $link->route_data));
        return Route::dispatch($request)->getContent();
    }
}
