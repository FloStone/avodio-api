<?php

namespace FloStone\Avodio\Api\Response;

use Psr\Http\Message\ResponseInterface;

class JsonApiResponse extends ApiResponse
{
    /**
     * @var string $type
     */
    protected $type = "json";

    public function __construct(ResponseInterface $response, string $url)
    {
        $original = (string)$response->getBody();
        $data = json_decode($original, JSON_OBJECT_AS_ARRAY);
        parent::__construct($response->getStatusCode(), $original, $data, $url);
    }
}