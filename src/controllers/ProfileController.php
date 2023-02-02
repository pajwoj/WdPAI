<?php

require_once 'AppController.php';

class ProfileController extends AppController {

    public function profile() {
        if(isset($_SESSION['user'])) {
            return $this->render('profile', ['messages' => [$_SESSION['user']]]);
        }

        else {
            return $this->render('profile', ['messages' => ['Not logged in!']]);
        }
    }
}