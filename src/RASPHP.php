<?php

namespace RASPHP;

use PHPSQLParser\PHPSQLParser;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class RASPHP implements LoggerAwareInterface
{
    const MODE_LEARN = 'learn';
    const MODE_PROTECT = 'protect';
    const MODE_REPORT = 'report';

    private $storageFile;
    private $mode;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct($storageFile, $mode = self::MODE_LEARN)
    {
        $this->storageFile = $storageFile;
        $this->mode = $mode;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function isLearningMode(): bool
    {
        return $this->mode === self::MODE_LEARN;
    }

    public function isProtectingMode(): bool
    {
        return $this->mode === self::MODE_PROTECT;
    }

    public function getQuerySignature(string $query): array
    {
        $parsed = $this->getParsedQuery($query);
        $result = [];
        foreach ($parsed as $section => $item) {
            switch ($section) {
                case 'SELECT':
                    $result[] = $this->unsetValues($item, ['expr_type']);
                    break;
                case 'OPTIONS':
                    $result[] = $item;
                    break;
                case 'INTO':
                    $result[] = $item;
                    break;
                case 'FROM':
                    $result[] = $this->unsetValues($item, ['expr_type', 'table', 'join_type']);
                    break;
                case 'WHERE':
                    $result[] = $this->unsetValues($item, ['expr_type']);
                    break;
                case 'GROUP':
                    $result[] = $this->unsetValues($item, ['expr_type']);
                    break;
                case 'HAVING':
                    $result[] = $this->unsetValues($item, ['expr_type']);
                    break;
                case 'ORDER':
                    $result[] = $this->unsetValues($item, ['expr_type']);
                    break;
                case 'LIMIT':
                    $result[] = array_keys($item);
                    break;
            }
        }
        return $result;
    }

    protected function unsetValues(array $data, array $keys): array
    {
        $data = $this->walk_recursive_remove($data, function ($item, $key) use ($keys) {
            if (!in_array($key, $keys)) {
                return true;
            }
        });
        return $data;
    }

    protected function walk_recursive_remove(array $array, callable $callback)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $array[$k] = $this->walk_recursive_remove($v, $callback);
            } else {
                if ($callback($v, $k)) {
                    unset($array[$k]);
                }
            }
        }

        return $array;
    }

    public function getParsedQuery(string $query): array
    {
        $parser = new PHPSQLParser();
        return $parser->parse($query);
    }

    public function saveQuerySignature(array $signature, $compact = false)
    {
        $hash = $this->getSignatureHash($signature);
        if (file_exists($this->storageFile)) {
            $signatures = require $this->storageFile;
        } else {
            if ($compact) {
                $signatures[] = $hash;
            } else {
                $signatures[$hash] = $signature;
            }
        }
        file_put_contents($this->storageFile, '<?php return ' . var_export($signatures, true) . ';');
    }

    public function isKnownSignature(array $signature): bool
    {
        $signatures = [];
        if (file_exists($this->storageFile)) {
            $signatures = require $this->storageFile;
        }
        $hash = $this->getSignatureHash($signature);
        return isset($signatures[$hash]);
    }

    public function logEvent(string $message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    /**
     * @param array $signature
     * @return string
     */
    protected function getSignatureHash(array $signature): string
    {
        $serialized = json_encode($signature);
        $hash = sha1(strtolower($serialized));
        return $hash;
    }

}