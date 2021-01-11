<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('welcome');
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
    public function contact()
    {
        $this->render('contact');
    }
}