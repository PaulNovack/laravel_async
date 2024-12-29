<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use ZMQ;
use ZMQContext;

class ZeroMQService
{
    private $context;
    private $socket;
    private $clientId;
    private $queryId;

    private $sql;

    public function __construct()
    {
        $this->context = new ZMQContext();
        $this->clientId = uniqid("client_");
        $this->socket = $this->context->getSocket(ZMQ::SOCKET_DEALER);
        $this->socket->setSockOpt(ZMQ::SOCKOPT_IDENTITY, $this->clientId);
        $this->socket->setSockOpt(ZMQ::SOCKOPT_RCVTIMEO, 5000);
        $this->socket->connect("tcp://127.0.0.1:5555");
    }

    public function execAsynch($sql)
    {
        $this->sql = $sql;
        $this->queryId = uniqid("query_");
        $payload = msgpack_pack(['id' => $this->queryId, 'query' => $sql]);
        $this->socket->sendmulti(['', $payload]);
    }

    public function aSyncFetch(string $modelClass): array
    {
        $response = $this->socket->recvMulti();
        $payload = msgpack_unpack($response[0]);
        if(isset($payload['ERROR:SQLException'])){
            throw new QueryException(
                "ZeroMQServiceMySQLConnection",
                new \Exception($this->sql) ,
                [],
                new \Exception($payload['ERROR:SQLException'])
            );
        }
        // Can add handling for unlikely
        // ERROR:ASYNCSQLSERVERGENERALEXCEPTION
        // and ERROR:ASYNCSQLSERVERUNHANDLEDEXCEPTIONTYPE
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
