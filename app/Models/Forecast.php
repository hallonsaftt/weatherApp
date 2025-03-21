<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'temperature', 'date', 'weather_type', 'probability'];


            const WEATHERS = ['rainy', 'snowy', 'sunny', 'cloudy'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
