<?php

namespace FloStone\Avodio\Api;

use FloStone\Avodio\Api\Exception\AvodioApiAuthException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class AvodioApi
{
    const URL = "https://www.avodio.de/api/";
    const APP_CLIENT = "app_client";
    const APP_SECRET = "app_secret";

    /**
     * App Client ID
     * @var string|null $client
     */
    protected $client = null;

    /**
     * App Secret ID
     * @var string|null $secret
     */
    protected $secret = null;

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

        $params = $this->getAllParams();

        return $client->request("GET", $url, [
            "query" => $params
        ]);
    }

    protected function getFullUrl()
    {
        return sprintf("%s?%s", $this->buildUrl(), http_build_query($this->getAllParams()));
    }

    /**
     * @return array
     * @throws AvodioApiAuthException
     */
    protected function getAllParams()
    {
        return array_merge($this->getAuthParameters(), $this->getParameters());
    }

    /**
     * @return array
     */
    protected function getAuthParameters()
    {
        if (is_null($this->client))
            throw new AvodioApiAuthException("App Client ID not set!");

        if (is_null($this->secret))
            throw new AvodioApiAuthException("App Secret ID not set!");

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
        return sprintf("%s%s", self::URL, $this->url);
    }

    /**
     * @return array
     */
    abstract public function getParameters(): array;
}