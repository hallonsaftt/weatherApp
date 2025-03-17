<?php

namespace App\Http;

class ForecastHelper
{
    public static function getIconByWeatherType(?string $weatherType): string
    {
        if (is_null($weatherType)) {
            return 'bi bi-question-circle-fill';
        }

        $weatherType = strtolower($weatherType); // Normalizacija

        switch ($weatherType) {
            case 'rain':
            case 'rainy':
                return 'bi bi-cloud-rain-fill';
            case 'clear':
            case 'sunny':
                return 'bi bi-brightness-high-fill';
            case 'snow':
            case 'snowy':
                return 'bi bi-snow';
            case 'clouds':
            case 'cloudy':
                return 'bi bi-cloud-sun-fill';
            default:
                return 'bi bi-question-circle-fill';
        }
    }

    public static function getWeatherButton(?string $weatherType): string
    {
        if (is_null($weatherType)) {
            return '<button class="btn btn-secondary"><i class="bi bi-question-circle-fill"></i> Unknown</button>';
        }

        $iconClass = self::getIconByWeatherType($weatherType);
        return '<button class="btn btn-primary"><i class="' . $iconClass . '"></i> ' . ucfirst($weatherType) . '</button>';
    }
}

