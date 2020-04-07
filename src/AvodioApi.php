<?php

namespace FloStone\Avodio\Api;

use GuzzleHttp\Client;

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

    public function get()
    {
        $url = $this->buildUrl();
        $client = new Client();
        $response = $client->request("GET", $url, [
            'query' => [
                self::APP_CLIENT => $this->client,
                self::APP_SECRET => $this->secret
            ]
        ]);
        dd($response);
    }

    protected function buildUrl()
    {
        return sprintf("%s%s", self::URL, $this->url);
    }
}