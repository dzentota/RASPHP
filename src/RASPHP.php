<?php

namespace RASPHP;

use function Patchwork\redefine;
use function Patchwork\relay;
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
        require_once __DIR__ . '/vendor/antecedent/patchwork/Patchwork.php';
        $this->storageFile = $storageFile;
        $this->mode = $mode;

        $this->initModules();
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
        if ($this->isKnownSignature($signature)) {
            return;
        }
        if (file_exists($this->storageFile)) {
            $signatures = require $this->storageFile;
        } else {
            $signatures = [];
        }
        $hash = $this->getSignatureHash($signature);
        if ($compact) {
            $signatures[$hash] = 1;
        } else {
            $signatures[$hash] = $signature;
        }
        file_put_contents($this->storageFile, '<?php return ' . var_export($signatures, true) . ';');
    }

    public function isKnownSignature(array $signature): bool
    {
        if (!file_exists($this->storageFile)) {
            return false;
        }
        $signatures = require $this->storageFile;
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
        return sha1(strtolower($serialized));
    }

    protected function initModules()
    {
        $this->initSqlModule();
    }

    protected function initSqlModule()
    {
//        var_dump(\Patchwork\hasMissed('mysqli_query'));
        $log = $this->logger;
        redefine('mysqli_query', function ($link, $query, ...$params) use ($log) {
            echo 'patched', PHP_EOL;
            $signature = $this->getQuerySignature($query);
            if ($this->isLearningMode()) {
                $this->saveQuerySignature($signature);
            } else {
                if (!$this->isKnownSignature($signature)) {
                    $this->logEvent('Unknown SQL query signature', ['sql' => $query]);
                    if ($this->isProtectingMode()) {
                        die('<h1 style="color:red">[STOP] Blocked by RASPHP</h1>');
                    }
                }
            }
            return relay();
        });
    }

}