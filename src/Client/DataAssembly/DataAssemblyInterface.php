<?php

declare(strict_types=1);

namespace TsRpc\Client\DataAssembly;
/**
 * 数据组装接口
 * Interface DataAssemblyInterface
 * @package TsRpc\Client\DataAssembly
 */
interface DataAssemblyInterface
{
    public function sendDataAssembly($data);

    public function recvDataAssembly($data);
}