<?php

declare(strict_types=1);

namespace TsRpc\Client\PathGen;

/**
 * path生成
 * Class PathGen
 * @package TsRpc\Client\DataAssembly
 */
class PathGen
{
    public function genPath($server, $name): string
    {
        return $server . '@' . $name;
    }
}