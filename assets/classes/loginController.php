<?php

class LoginContr extends Login{

    private $name;
    private $pwd;

    public function __construct($name, $pwd) {
        $this->name=$name;
        $this->pwd=$pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            header('Location: /?id=login');
            session_start();
            $_SESSION['empty'] = true;
            exit();
        }

        $this->getUser($this->name, $this->pwd);
    }
    private function emptyInput() {
        $result;
        if (empty($this->name) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
}