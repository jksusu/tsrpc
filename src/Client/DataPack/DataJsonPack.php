<?php

declare(strict_types=1);

namespace TsRpc\Client\DataPack;

/**
 * Json方式编码解码
 * Class DataJsonPack
 * @package TsRpc\Client\DataPack
 */
class DataJsonPack implements PackInterface
{
    /**
     * json方式解码
     * @param string $data
     * @return array
     */
    public function decode(string $data): array
    {
        return json_decode($data, true);
    }

    /**
     * json方式编码
     * @param $data
     * @return string
     */
    public function encode($data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}