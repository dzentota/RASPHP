<?php

namespace RASPHP;

use PHPSQLParser\PHPSQLParser;

class RASPHP
{
    const SECTION = 'section';

    public static function getQuerySignature(string $query): array
    {
        $parsed = static::getParsedQuery($query);
        $result = [];
        foreach ($parsed as $section => $item) {
            switch ($section) {
                case 'SELECT':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'OPTIONS':
                    $result[] = $item;
                    break;
                case 'INTO':
                    $result[] = $item;
                    break;
                case 'FROM':
                    $result[] = self::unsetValues($item, ['expr_type', 'table', 'join_type']);
                    break;
                case 'WHERE':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'GROUP':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'HAVING':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'ORDER':
                    $result[] = self::unsetValues($item, ['expr_type']);
                    break;
                case 'LIMIT':
                    $result[] = array_keys($item);
                    break;
            }
        }
        return $result;
    }

    protected static function unsetValues(array $data, array $keys): array
    {
        $data = self::walk_recursive_remove($data, function ($item, $key) use ($keys) {
            if (!in_array($key, $keys)) {
                return true;
            }
        });
        return $data;
    }

    protected static function walk_recursive_remove (array $array, callable $callback) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $array[$k] = self::walk_recursive_remove($v, $callback);
            } else {
                if ($callback($v, $k)) {
                    unset($array[$k]);
                }
            }
        }

        return $array;
    }

    public static function getParsedQuery(string $query): array
    {
        $parser = new PHPSQLParser();
        return $parser->parse($query);
    }
}