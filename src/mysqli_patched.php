<?php

use function Patchwork\redefine;
use function Patchwork\relay;
use PHPSQLParser\PHPSQLParser;

ini_set('display_errors',1);
error_reporting(E_ALL);

redefine('mysqli_query', function($link, $query, ...$params) {
    $signature = \RASPHP\RASPHP::getQuerySignature($query);
    echo json_encode($signature, JSON_PRETTY_PRINT);
//    echo 'patched', PHP_EOL;
    $result = relay();
    return $result;
});
# These will use SQLite instead: