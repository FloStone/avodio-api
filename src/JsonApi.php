<?php

namespace FloStone\Avodio\Api;

use GuzzleHttp\Exception\GuzzleException;

class JsonApi extends AvodioApi
{
    /**
     * @var array $params
     */
    protected $params = [];

    /**
     * @return JsonApiResponse
     * @throws GuzzleException
     */
    public function get()
    {
        return new JsonApiResponse(parent::get());
    }

    /**
     * @param string|int $key
     * @param string|int $value
     */
    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->params;
    }
}