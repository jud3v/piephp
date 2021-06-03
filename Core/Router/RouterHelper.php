<?php

namespace Core\Router;

class RouterHelper {
    /**
     * Check if required data exists or if array as 2 value
     * @param array $data
     * @return bool
     */
    public static function check_required_data(array $data): bool
    {
        if (isset($data['controller']) && isset($data['action'])
            || count($data) === 2) {
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @return string
     */
    public static function get_controller_name(string $name): string
    {
        return 'Controller\\'.ucfirst($name).'Controller';
    }

    /**
     * @param string $url
     * @param string $controller
     * @param string $method
     * @param bool $dynamic
     */
    public static function add_route_to_three(string $url, string $controller, string $method, bool $dynamic) :void
    {
        RouteRegistration::add_routes(
            [
                'url' => $url,
                'controller' => $controller,
                'method' => $method,
                'dynamic' => $dynamic
            ]
        );
    }

    /**
     * @param $url
     * @param $pattern
     * @return array|void
     */
    public static function parse_url_parameter($url, $pattern): array
    {
        if (preg_match('/.*/', $url)){
            return [
                'url' => str_replace('?','', preg_replace($pattern, '', $url)),
                'parameter' => strlen(preg_replace($pattern, '', $url)) > 0
                    ? preg_replace($pattern, '', $url)
                    : '',
            ];
        }
    }
}