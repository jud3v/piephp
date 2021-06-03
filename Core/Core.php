<?php

namespace Core;

use Core\Router\Router;

class Core {

    public function run()
    {
        include "src/routes.php";
        $app = Router::get($_SERVER['REQUEST_URI']);
        if ($app !== false) {
            $controller = $app['controller'];
            $method = $app['method'];
            return (new $controller())->$method();
        } else {
            echo "404 Not Found";
        }
    }
}