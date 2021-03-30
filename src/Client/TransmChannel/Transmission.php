<?php

declare(strict_types=1);

namespace TsRpc\Client\TransmChannel;

/**
 * 抽象传输类
 * Class Transmission
 * @package TsRpc\Client\TransmChannel
 */
abstract class Transmission implements TransmissionInterface
{
    /**
     * @var string
     */
    public $host;

    /**
     * @var int
     */
    public $port;

    /**
     * @var int
     */
    public $timeout = 1.0;
}