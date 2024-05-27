<?php declare(strict_types=1);

require 'inc/lib.php';

$appid = '155008ab7ad5b4128ed6470f5f569707';
$city  = 'Romanshorn';


$url     = "https://api.openweathermap.org/data/2.5/weather";
$payload = [ 
  'q' => $city,
  'units' => 'metric',
  'appid' => $appid
];

$result = sendGet( $url, $payload, '' );

echo wrap_tag( 'p', 'Temp ' . $result['main']['temp'] );
echo wrap_tag( 'p', 'Beschreibung ' . $result['weather'][0]['description'] );
echo wrap_tag( 'p', 'Feuchtigkeit ' . $result['main']['humidity'] );
echo wrap_tag( 'p', 'Wind ' . $result['wind']['speed'] );
