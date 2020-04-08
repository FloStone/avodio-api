<?php

namespace FloStone\Avodio\Api\Exception;

use Throwable;

class AvodioApiAuthException extends AvodioApiException
{
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}