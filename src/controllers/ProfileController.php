<?php

require_once 'AppController.php';
require_once 'src/repositories/TrainRepository.php';

class ProfileController extends AppController {

    private $trainRepository;

    public function __construct()
    {
        parent::__construct();
        $this->trainRepository = new TrainRepository();
    }

    public function profile() {
        if(isset($_SESSION['user'])) {
            return $this->render('profile', ['messages' => [$_SESSION['user']]]);
        }

        else {
            return $this->render('profile', ['messages' => ['Not logged in!']]);
        }
    }
}