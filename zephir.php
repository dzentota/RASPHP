<?php

$program = <<<EOF
namespace Acme;

class Greeting
{
    public static function sayHello() -> void
    {
        echo "Hello, World!";
    }
}
EOF;

$retval = zephir_parse_file($program, '(eval code)');

var_dump($retval);