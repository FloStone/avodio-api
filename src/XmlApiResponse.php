<?php

namespace FloStone\Avodio\Api;

use Psr\Http\Message\ResponseInterface;

class XmlApiResponse
{
    /**
     * @var string $xml
     */
    public $xml;

    public function __construct(ResponseInterface $response)
    {
        $this->xml = (string)$response->getBody();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->xml;
    }
}