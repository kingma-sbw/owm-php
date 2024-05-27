<?php declare(strict_types=1);

require 'inc/lib.php';

$url     = "https://api.openweathermap.org/data/2.5/weather";
$payload = [ 
  'q' => SETTINGS['app']['City'],
  'units' => 'metric',
  'appid' => SETTINGS['app']['AppId']
];

$result = sendGet( $url, $payload, '' );

echo wrap_tag( 'p', 'Temp ' . $result['main']['temp'] );
echo wrap_tag( 'p', 'Beschreibung ' . $result['weather'][0]['description'] );
echo wrap_tag( 'p', 'Feuchtigkeit ' . $result['main']['humidity'] );
echo wrap_tag( 'p', 'Wind ' . $result['wind']['speed'] );
