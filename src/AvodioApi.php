<?php

namespace FloStone\Avodio\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class AvodioApi
{
    const URL = "http://avodio/api/";
    const APP_CLIENT = "app_client";
    const APP_SECRET = "app_secret";

    /**
     * App Client ID
     * @var string $client
     */
    protected $client;

    /**
     * App Secret ID
     * @var string $secret
     */
    protected $secret;

    /**
     * API Url
     * @var null|string $url
     */
    protected $url = null;

    public function __construct($client, $secret)
    {
        $this->client = $client;
        $this->secret = $secret;
    }

    /**
     * Set the URL for the api call
     * @param string $url
     * @param int|null $id
     * @see AvodioApiUrl
     */
    public function setUrl(string $url, $id = null)
    {
        $this->url = $url;

        if ($id)
            $this->url .= "/$id";
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get()
    {
        $url = $this->buildUrl();
        $client = new Client();
        $params = array_merge($this->getAuthParameters(), $this->getParameters());

        return $client->request("GET", $url, [
            "query" => $params
        ]);
    }

    /**
     * @return array
     */
    protected function getAuthParameters()
    {
        return [
            self::APP_CLIENT => $this->client,
            self::APP_SECRET => $this->secret
        ];
    }

    /**
     * @return string
     */
    protected function buildUrl()
    {
        $url = sprintf("%s%s", self::URL, $this->url);

        $authparams = [
            self::APP_CLIENT => $this->client,
            self::APP_SECRET => $this->secret
        ];

        return $url;
    }

    /**
     * @return array
     */
    abstract public function getParameters(): array;
}