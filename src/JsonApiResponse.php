<?php

namespace FloStone\Avodio\Api;

use Psr\Http\Message\ResponseInterface;

class JsonApiResponse
{
    /**
     * @var string|null
     */
    public $json = null;

    public function __construct(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 200)
        {
            $json = $response->getBody();
            $this->json = $json;
            $array = json_decode($json, JSON_OBJECT_AS_ARRAY);

            foreach ($array as $key => $value)
            {
                $this->$key = $value;
            }
        }
    }
}