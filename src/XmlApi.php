<?php

namespace FloStone\Avodio\Api;

class XmlApi extends AvodioApi
{
    public function __construct($client, $secret)
    {

        parent::__construct($client, $secret);
    }

    public function get()
    {
        return new XmlApiResponse(parent::get());
    }

    public function getParameters(): array
    {
        return [];
    }

    public function setUrl(string $url, $id = null)
    {
        $this->url = str_replace("{id}", $id, $url);
    }
}