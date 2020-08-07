<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TemporalLink extends Model
{
    protected $fillable = [
        'link',
        'route_name',
        'route_data',
    ];

    protected $casts = [
        'route_data' => 'json',
    ];

    public static function generateLink(): string
    {
        return Str::random(10);
    }
}
