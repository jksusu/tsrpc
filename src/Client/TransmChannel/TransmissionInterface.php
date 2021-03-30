<?php

declare(strict_types=1);

namespace TsRpc\Client\TransmChannel;
/**
 * 数据传输器接口
 * Interface TransmissionInterface
 * @package TsRpc\Client\TransmChannel
 */
interface TransmissionInterface
{
    public function send(string $data);

    public function recv();
}