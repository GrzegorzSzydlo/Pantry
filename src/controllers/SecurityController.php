<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController {
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){

        $userRepository = new UserRepository();


        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $userRepository->getUser($email);

        if(!$user)
        {
            return $this->render('login', ['messages' => ['User not exist']]);
        }

        if($user ->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ['messages'=> ['Wrong password!']]);
        }

        //return $this->render('main');
        $url ="http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/main");

    }

    public function registration()
    {
        if(!$this ->isPost())
        {
            return $this ->render('registration');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];

        if ($password !== $confirmPassword){
            return $this -> render('registration',['messages' => ['Please provide proper password']]);
        }

        $user = new User($name, $surname,md5($password), $email);
        $this ->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);

    }
}
