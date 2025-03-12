<?php

namespace App\Http;

class ForecastHelper
{

    public static function getIconByWeatherType(?string $weatherType): string
    {

        if (is_null($weatherType)) {
            return 'bi bi-question-circle-fill';
        }

        switch ($weatherType) {
            case 'rainy':
                return 'bi bi-cloud-snow-fill';
            case 'sunny':
                return 'bi bi-brightness-high-fill';
            case 'snowy':
                return 'bi bi-snow';
            case 'cloudy':
                return 'bi bi-cloud-sun-fill';
            default:
                return 'bi bi-question-circle-fill';
        }
    }
}
