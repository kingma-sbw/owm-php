<?php declare(strict_types=1);

define( 'SETTINGS', parse_ini_file('settings.ini', true));
/**
 * Wrap a text in a tag
 * @param string $tag Tag to wrap arount text
 * @param string $text Text to wrap tag around
 * @param ?string $class optional class or classes string
 * @param ?string $id optional id string
 * @return string
 */
function wrap_tag( string $tag, string $text, ?string $class = null, ?string $id = null ): string
{
  return
    "<$tag" .
      // if class is set include a class="" section
    ( $class ? " class=\"$class\"" : '' ) .

      // if id is set include a id="" section
    ( $id ? " id=\"$id\"" : '' ) .

    ">$text</$tag>";
}
/**
 * Send a get request
 *
 * @param  $url 
 * @param  $payload
 * @param  $authorization
 */
function sendGet( string $url, array $payload, string $authorization ): array|bool
{
  $opts = [ 
    'http' => [ 
      'method' => 'GET',
      'header' => [ 
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: ' . $authorization
      ]
    ]
  ];

  $context = stream_context_create( $opts );
  // we don-t want warnings, hence the @
  $result = @file_get_contents( $url . '?' . http_build_query( $payload ), false, $context );

  if( $result = json_decode( $result, true ) ) {
    return $result;
  } else {
    return false;
  }
}
;