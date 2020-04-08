<?php

namespace FloStone\Avodio\Api\Response;

class ApiResponse
{
    /**
     * @var mixed|null
     */
    protected $data = null;

    /**
     * @var int|null
     */
    protected $statusCode = null;

    /**
     * @var string $original
     */
    protected $original = "";

    /**
     * @var null $type
     */
    protected $type = null;

    /**
     * @var null|string $url
     */
    protected $url = null;

    public function __construct($code, $original, $data, $url)
    {
        $this->statusCode = $code;
        $this->original = $original;
        $this->data = $data;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->original;
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }
}