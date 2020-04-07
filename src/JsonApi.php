<?php

namespace FloStone\Avodio\Api;

class JsonApi extends AvodioApi
{
    public function __construct(string $client, string $secret)
    {
        parent::__construct($client, $secret);
    }
}