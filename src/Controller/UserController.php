<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller {
    public function index()
    {
        return $this->render('login');
    }
}