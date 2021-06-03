<?php

use Core\Router\Router;

Router::connect('/:id', ['app', 'index']);
Router::connect('/user', ['user', 'index']);