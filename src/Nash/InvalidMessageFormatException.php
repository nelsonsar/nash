<?php

namespace Nash;

class InvalidMessageFormatException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('Invalid message format');
    }
}
