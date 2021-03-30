<?php

declare(strict_types=1);

namespace TsRpc\Client\DataAssembly;

/**
 * 遵循JSON-RPC 2.0协议的数据组装器
 * @link https://www.jsonrpc.org/specification
 * Class DataAssembly
 * @package TsRpc\Client\DataAssembly
 */
class DataAssembly implements DataAssemblyInterface
{
    /**
     * 待发送数据组装
     * @param $data
     * @return array
     */
    public function sendDataAssembly($data)
    {
        [$method, $params, $id] = $data;
        return [
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => $id
        ];
    }

    /**
     * 接收数据组装
     * @param $data
     * @return array
     */
    public function recvDataAssembly($data)
    {
        [$id, $res] = $data;
        return [
            'jsonrpc' => '2.0',
            'id' => $id,
            'result' => $res,
        ];
    }
}