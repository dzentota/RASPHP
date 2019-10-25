<?php

use function Patchwork\redefine;
use function Patchwork\relay;

ini_set('display_errors',1);
error_reporting(E_ALL);

redefine('mysqli_query', function($link, $query, ...$params) {
    echo 'patched', PHP_EOL;
    $result = relay();
    return $result;
});

# These will use SQLite instead: