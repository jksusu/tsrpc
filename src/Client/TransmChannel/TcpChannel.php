<?php

declare(strict_types=1);

namespace TsRpc\Client\TransmChannel;

use TsRpc\Client\Exception\TcpConnectionException;

/**
 * tcp发送包
 * Class TcpChannel
 * @package TsRpc\Client\TransmChannel
 */
class TcpChannel extends Transmission
{
    /**
     * @var resource
     */
    protected $client = null;

    public function __construct(string $host = '', int $port = 80, float $timeout = 1.0)
    {
        $this->host = $host;
        $this->port = $port;
        $this->timeout = $timeout;
    }

    public function send(string $data)
    {
        $this->connect();
        $send = stream_socket_sendto($this->client, $data);
        if (!$send) {
            throw new TcpConnectionException('fail stream_socket_sendto() data');
        }
    }

    public function recv()
    {
        stream_set_blocking($this->client, false);

        return stream_socket_recvfrom($this->client, 1500);
    }

    protected function connect(): void
    {
        $client = stream_socket_client('tcp://' . $this->host . ':' . $this->port, $code, $message, $this->timeout);
        if ($client === false) {
            throw new TcpConnectionException($message, $code);
        }

        $this->client = $client;
    }

    public function __destruct()
    {
        if (!is_null($this->client)) {
            stream_socket_shutdown($this->client, STREAM_SHUT_RDWR);
            $this->client = null;
        }
    }
}