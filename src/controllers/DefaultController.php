<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function main()
    {
        $this->render('main');
    }
    public function registration()
    {
        $this->render('registration');
    }
    public function welcome()
    {
        $this->render('welcome');
    }
}