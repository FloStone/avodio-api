<?php

namespace FloStone\Avodio\Api\Exception;

use Throwable;

class AvodioApiException extends \Exception
{
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}