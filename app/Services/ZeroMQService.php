<?php

namespace App\Services;

use ZMQ;
use ZMQContext;

class ZeroMQService
{
    private $context;
    private $socket;
    private $clientId;
    private $queryId;

    public function __construct()
    {
        $this->context = new ZMQContext();
        $this->clientId = uniqid("client_");
        $this->socket = $this->context->getSocket(ZMQ::SOCKET_DEALER);
        $this->socket->setSockOpt(ZMQ::SOCKOPT_IDENTITY, $this->clientId);
        $this->socket->connect("tcp://127.0.0.1:5555");
    }

    public function execAsynch($sql)
    {
        $this->queryId = uniqid("query_");
        $payload = msgpack_pack(['id' => $this->queryId, 'query' => $sql]);
        $this->socket->sendmulti(['', $payload]);
    }

    public function aSyncFetch(string $modelClass): array
    {
        $response = $this->socket->recvMulti();
        $payload = msgpack_unpack($response[0]);
        $data = $payload['data'] ?? [];
        $models = [];

        foreach ($data as $item) {
            $model = new $modelClass();
            foreach ($item as $key => $value) {
                if ($key !== 'password') { // Avoid setting the password directly
                    $model->$key = $value;
                }
            }
            $models[] = $model;
        }
        return $models;
    }
}
