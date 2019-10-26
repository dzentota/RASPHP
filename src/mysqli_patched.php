<?php

use GuzzleHttp\Client;
use function Patchwork\redefine;
use function Patchwork\relay;
use Monolog\Logger;
use ParagonIE\MonologQuill\QuillHandler;
use ParagonIE\Quill\Quill;
use ParagonIE\ConstantTime\Base64UrlSafe;
use ParagonIE\Sapient\CryptographyKeys\{
    SigningSecretKey,
    SigningPublicKey
};

ini_set('display_errors', 1);
error_reporting(E_ALL);
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

redefine('mysqli_query', function ($link, $query, ...$params) use ($log) {
    $rasphp = new \RASPHP\RASPHP('signatures.php', \RASPHP\RASPHP::MODE_PROTECT);
    $rasphp->setLogger($log);
    $signature = $rasphp->getQuerySignature($query);
    if ($rasphp->isLearningMode()) {
        $rasphp->saveQuerySignature($signature);
    } else {
        if (!$rasphp->isKnownSignature($signature)) {
            $rasphp->logEvent('Unknown SQL query signature', ['sql' => $query]);
            if ($rasphp->isProtectingMode()) {
                die('<h1 style="color:red">[STOP] Blocked by RASPHP</h1>');
            }
        }
    }
//    echo json_encode($signature, JSON_PRETTY_PRINT);
    $result = relay();
    return $result;
});