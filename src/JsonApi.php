<?php

namespace FloStone\Avodio\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use FloStone\Avodio\Api\Response\JsonApiResponse;

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
        try
        {
            return new JsonApiResponse(parent::get(), $this->getFullUrl());
        }
        catch( ClientException $e)
        {
            return new JsonApiResponse($e->getResponse(), $this->getFullUrl());
        }
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
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->params['page'] = $page;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->params;
    }
}