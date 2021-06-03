<?php

namespace Core\Router;

use Core\Error\CustomError;
use Error;

class RouterErrorHandler {

    /**
     * @param $controller
     * @param $method
     */
    public static function check_requirement_or_fail($controller, $method) :void
    {
        (new CustomError())->register_error();
        if (! class_exists($controller)){
            $controller_name = RouterHelper::get_controller_name($controller);
            throw new Error("The Controller [$controller_name] does not exist");
        }

        if(! method_exists(new $controller, $method)){
            throw new Error("The method [$method] does not exist");
        }
    }

    /**
     * Check if url exist in the url registration else return exception
     * @param $url
     * @return Error|void
     * @noinspection PhpMissingReturnTypeInspection
     */
    public static function check_url_exist($url)
    {
        (new CustomError())->register_error();
        if (! in_array($url, array_keys(RouteRegistration::export_routes()))){
            throw new Error("La route [$url] n'existe pas.");
        }
    }
}