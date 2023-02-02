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
            if(isset($_SESSION['user'])) {
                session_unset();
                session_destroy();
                return $this->render('login', ['messages' => ['Logged out succesfully!']]);
            }

            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        session_start();
        $_SESSION['user'] = $email;
        return $this->render('login', ['messages' => ['Login successful!']]);
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

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render('register', ['messages' => ['Wrong email format.']]);
        }

        if (strlen($password) <= 4) {
            return $this->render('register', ['messages' => ['Password is too short (minimum 5 characters).']]);
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