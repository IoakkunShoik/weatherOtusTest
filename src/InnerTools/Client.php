<?php
declare(strict_types=1);

namespace Iosh\WeatherOtusTest\InnerTools;

class Client
{
    private \GuzzleHttp\Client $client;
    private string $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'https://api.openweathermap.org/']);
    }

    public function getOnecallWeather($latitude, $longitude, $exclude = null)
    {
        return $this->client->get('data/3.0/onecall?lat={lat}&lon={lon}&exclude={part}', $this->makeRequestData(['query' => [
            'lat' => $latitude,
            'lon' => $longitude,
            'exclude' => $exclude
        ]]));
    }

    private function makeRequestData($requestData)
    {
        $requestData['query']['appid'] = $this->apiKey;
        return $requestData;
    }
}