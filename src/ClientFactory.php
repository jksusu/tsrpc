<?php

declare(strict_types=1);

namespace TsRpc;

use TsRpc\Client\TransmChannel\TcpChannel;
use TsRpc\Client\PathGen\PathGen;
use TsRpc\Client\DataAssembly\DataAssembly;
use TsRpc\Client\DataPack\DataJsonPack;

abstract class ClientFactory
{
    /**
     * @var string
     */
    protected $service;

    /**
     * @var resource
     */
    protected $pathGen;

    /**
     * @var resource
     */
    protected $dataAssembly;

    /**
     * @var resource
     */
    protected $dataPack;


    public function __construct(string $service)
    {
        $this->service = $service;
        $this->pathGen = new PathGen();
        $this->dataAssembly = new DataAssembly();
        $this->dataPack = new DataJsonPack();
    }

    public function __call($name, $arguments)
    {
        $path = $this->pathGen->genPath($this->service, $name);
        $pack = $this->dataPack->encode($this->dataAssembly->sendDataAssembly([$path, $arguments, uniqid()]));

        $tcpClient = new TcpChannel();
        $tcpClient->send($pack);
        $recv = $tcpClient->recv();

        $deRecv = $this->dataPack->decode($recv);

        return $this->dataAssembly->recvDataAssembly($deRecv);
    }
}