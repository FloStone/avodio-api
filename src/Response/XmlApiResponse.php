<?php

namespace FloStone\Avodio\Api\Response;

use Psr\Http\Message\ResponseInterface;

class XmlApiResponse extends ApiResponse
{
    /**
     * @var string $type
     */
    protected $type = "xml";

    /**
     * @var array $namespaces
     */
    protected $namespaces = [
        "xsi" => "http://www.w3.org/2001/XMLSchema-instance",
        "sup" => "http://www.himsa.com/ProductInformation/Supply",
        "rr" => "http://www.himsa.com/ProductInformation/RICReceiver",
        "pi" => "http://www.himsa.com/ProductInformation",
        "info" => "http://www.himsa.com/ProductInformation/Information",
        "hasp" => "http://www.himsa.com/ProductInformation/HearingAidSparePart",
        "haa" => "http://www.himsa.com/ProductInformation/HearingAidAccessory",
    ];

    public function __construct(ResponseInterface $response, string $url)
    {
        $original = (string)$response->getBody();
        $data = simplexml_load_string(preg_replace("/[a-z]+:/", "", $original));
        parent::__construct($response->getStatusCode(), $original, $data, $url);
    }
}