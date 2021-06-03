<?php

namespace Core;


class Controller {

    private static $_render;

    protected function render($view, $scope = []) :void
    {
        extract($scope);
        $file = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
                str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        $file = str_replace('\\', '/', $file);
        $layout = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
                'index']) . '.php';
        if (file_exists($file)) {
            ob_start();
            require $file;
            $view = ob_get_clean();
            ob_start();
            require $layout;
            self::$_render = ob_end_flush();
        }
    }
}