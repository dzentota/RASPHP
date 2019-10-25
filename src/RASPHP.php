<?php

namespace RASPHP;

use PHPSQLParser\PHPSQLParser;

class RASPHP
{
    const SECTION = 'section';

    public static function getQuerySignature(string $query)
    {
        $parsed = static::getParsedQuery($query);
        $result = [];
        foreach ($parsed as $section => $item) {
            switch ($section) {
                case 'SELECT':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'OPTIONS':
                    break;
                case 'INTO':
                    break;
                case 'FROM':
                    break;
                case 'WHERE':
                    break;
                case 'GROUP':
                    break;
                case 'HAVING':
                    break;
                case 'ORDER':
                    break;
                case 'LIMIT':
                    $result[] = [self::SECTION => 'LIMIT', 'items' => array_keys($item)];
                    break;
            }
        }
        return $result;
    }

    protected static function unsetValues(array $data, array $keys): array
    {
        array_walk_recursive($data, function (&$item, $key) use ($keys) {
            if (!in_array($key, $keys)) {
                $item = '';
            }
        });
        return $data;
    }

    public static function getParsedQuery(string $query): array
    {
        $parser = new PHPSQLParser();
        return $parser->parse($query);
    }
}