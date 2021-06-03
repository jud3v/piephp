<?php


namespace Core\Router;


class RouteRegistration
{
    private static array $routes = [];

    /**
     * Add route to array.
     * @param $route
     */
    public static function add_routes($route)
    {
        array_push(self::$routes, $route);
    }

    /**
     * Return every routes.
     * @return array
     */
    public static function export_routes(): array
    {
        return self::$routes;
    }
}