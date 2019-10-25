<?php

use function Patchwork\redefine;
use function Patchwork\relay;
use PHPSQLParser\PHPSQLParser;

ini_set('display_errors',1);
error_reporting(E_ALL);

redefine('mysqli_query', function($link, $query, ...$params) {
    $parsed = \RASPHP\RASPHP::getQuerySignature($query);
    print_r($parsed);
//    echo 'patched', PHP_EOL;
    $result = relay();
    return $result;
});
# These will use SQLite instead: