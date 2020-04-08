<?php

namespace FloStone\Avodio\Api;

use FloStone\Avodio\Api\Exception\AvodioApiException;
use FloStone\Avodio\Api\Response\XmlApiResponse;

class XmlApi extends AvodioApi
{
    public function __construct($client, $secret)
    {
        parent::__construct($client, $secret);
    }

    /**
     * @return XmlApiResponse|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get()
    {
        return new XmlApiResponse(parent::get(), $this->getFullUrl());
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return [];
    }

    /**
     * @param string $url
     * @param null $id
     * @throws AvodioApiException
     */
    public function setUrl(string $url, $id = null)
    {
        if (is_null($id) && ($url != AvodioApiUrl::PRODUCT_CATALOG_EXAMPLE || AvodioApiUrl::RELATIONSHIP_TABLE_EXAMPLE))
            throw new AvodioApiException("Product Catalog ID not set!");

        $this->url = str_replace("{id}", $id, $url);
    }
}