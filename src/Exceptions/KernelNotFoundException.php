<?php

    namespace Eskirex\Component\Framework\Exceptions;

    use Throwable;

    class KernelNotFoundException extends \Exception
    {
        public function __construct($message = "", $code = 0, Throwable $previous = null)
        {
            parent::__construct($message, $code, $previous);
        }
    }