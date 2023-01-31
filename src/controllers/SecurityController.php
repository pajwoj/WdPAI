<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repositories/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['No user with email: ' + $email]]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        else {
            return $this->render('login', ['messages' => ['Login successful!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        $user = $this->userRepository->getUser($email);

        if ($user) {
            return $this->render('register', ['messages' => ['An user with this email already exists.']]);
        }

        if ($password !== $passwordConfirm) {
            return $this->render('register', ['messages' => ['Passwords do not match.']]);
        }

        else {
        $user = new User($email, password_hash($password, PASSWORD_BCRYPT));
        $this->userRepository->addUser($user);
        return $this->render('register', ['messages' => ['Registration successful, you can log in.']]);
        }

    }
}