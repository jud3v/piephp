<?php

namespace Controller;

use Core\Controller;

class AppController extends Controller {

    public function index($id)
    {
        dump($id);
        return $this->render('index');
    }
}