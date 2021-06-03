<?php

namespace Core\Error;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class CustomError {

    public function register_error()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }
}