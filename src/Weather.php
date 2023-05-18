<?php
declare(strict_types=1);

namespace Iosh\WeatherOtusTest;

use Iosh\WeatherOtusTest\InnerTools\Client;

class Weather
{
    /**
     * @var mixed
     */
    private string $apiKey;

    public function __construct($apiKey)
    {
        $this->client = new Client($apiKey);
    }

    public function getWeather($latitude, $longitude): string
    {
        $response = $this->client->getOnecallWeather($latitude, $longitude);
        return $response->getBody()->getContents();
    }
}
