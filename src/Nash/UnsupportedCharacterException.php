<?php

namespace Nash;

class UnsupportedCharacterException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Message has invalid characters');
    }
}
