<?php

use Core\Core;

define('BASE_URI',
    str_replace('\\','/',
        substr(__DIR__,
        strlen($_SERVER['DOCUMENT_ROOT']))
    )
);

require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));
require_once(implode(DIRECTORY_SEPARATOR, ['vendor', 'autoload.php']));
$app = new Core();
$app->run();