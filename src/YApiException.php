<?php

namespace Cblink\YApi;

use Exception;

/**
 * Class YApiException
 * @package Cblink\YApi
 */
class YApiException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 400);
    }
}
