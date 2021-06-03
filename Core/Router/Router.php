<?php

namespace Core\Router;


use Error;
use Exception;

class Router extends RouterErrorHandler {

    private static array $_routes;

    /**
     * @param string $url
     * @param array $route [controller, action]
     * @return void
     */
    public static function connect(string $url, array $route) :void
    {
        $dynamic = false;
        if (! RouterHelper::check_required_data($route)){
            return;
        }

        if (preg_match('/\/:.*\//',$url)) {
            $url = RouterHelper::parse_url_parameter($url, '/\/:.*\//')['url'];
            $dynamic = true;
        }

        self::$_routes[$url] = $route;
        $controller = RouterHelper::get_controller_name(self::$_routes[$url][0]);
        $method = self::$_routes[$url][1];


        self::check_requirement_or_fail($controller, $method);
        RouterHelper::add_route_to_three($url, $controller, $method, $dynamic);
        dump(RouteRegistration::export_routes());
    }

    /**
     * Get the url and return the array of controller and method to execute.
     * @param string $url
     * @return array|void
     */
    public static function get(string $url) :array
    {
        $data = RouterHelper::parse_url_parameter($url, '/\?.*/');

        if (isset($data['url'])){
            $url = $data['url'];
        }

        self::check_url_exist($url);

        try {
            $controller = RouterHelper::get_controller_name(self::$_routes[$url][0]);
            $method = self::$_routes[$url][1];
        } catch (Exception $e){
            throw new Error("La route [$url] n'existe pas");
        }

        return [
            'controller' => new $controller(),
            'method' => $method,
        ];
    }
}