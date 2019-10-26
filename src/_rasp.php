<?php

use GuzzleHttp\Client;
use Monolog\Logger;
use ParagonIE\ConstantTime\Base64UrlSafe;
use ParagonIE\MonologQuill\QuillHandler;
use ParagonIE\Quill\Quill;
use ParagonIE\Sapient\CryptographyKeys\SigningPublicKey;
use ParagonIE\Sapient\CryptographyKeys\SigningSecretKey;
use RASPHP\RASPHP;

(function(RASPHP $rasphp){
    // Create a Quill for writing data to the Chronicle instance
    $quill = new Quill(
        'http://localhost/chronicle/public/chronicle/publish',
        'mgOGOmFQzJby5v6bXpYQksFC1payA2PK',
        new SigningPublicKey(Base64UrlSafe::decode('Wl51XMhZMOBj7OQmQZAfOJb6ivur4mRzbSWGXGvaoV8=')),
        new SigningSecretKey(Base64UrlSafe::decode('B0IfjH-jvJ3b9TWCI89RbCQjAvbQjp024RR8RpxZddd-QFfscpnJdnUKRr-SnQZ-OGJrwAv95Z6I-WRKf-FIxg==')),
        new Client()
    );
    $log = new Logger('security');
    $handler = new QuillHandler($quill, Logger::ALERT);
    $log->pushHandler($handler);
    $rasphp->setLogger($log);
})(new RASPHP('signatures.php', RASPHP::MODE_PROTECT));