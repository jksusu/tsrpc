<?php

declare(strict_types=1);

namespace TsRpc\Client\DataPack;

/**
 * 数据解编码
 * Interface PackInterface
 * @package TsRpc\Client\DataPack
 */
interface PackInterface
{
    /**
     * 编码
     * @param $data
     * @return string
     */
    public function encode($data): string;

    /**
     * 解码
     * @param string $data
     * @return mixed
     */
    public function decode(string $data);
}