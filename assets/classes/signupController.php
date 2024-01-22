<?php

class SignupContr extends Signup{
    
    private $name;
    private $email;
    private $pwd;
    private $pwdRe;
    private $fname;
    private $lname;
    private $bday;
    private $gen;
    private $ctz;

    public function __construct($name, $email, $pwd, $pwdRe, $fname, $lname, $bday, $gen, $ctz) {
        $this->name=$name;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->pwdRe=$pwdRe;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->bday=$bday;
        $this->gen=$gen;
        $this->ctz=$ctz;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['emptyInput'] = true;
            exit();
        }
        if($this->invalidUid() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['incorrectName'] = true;
            exit();
        }
        if($this->invalidEmail() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['incorrectEmail'] = true;
            exit();
        }
      	if($this->validPwd() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['invalidPwd'] = true;
            exit();
        }
        if($this->pwdMatch() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['incorrectRePass'] = true;
            exit();
        }
        if($this->takenNameCheck() == false) {
            header('Location: /?id=registration');
            session_start();
            $_SESSION['nameTaken'] = true;
            exit();
        }
        $this->setUser($this->name, $this->pwd, $this->email, $this->fname, $this->lname, $this->bday, $this->gen, $this->ctz);
    }

    private function emptyInput() {
        $result;
        if (empty($this->name) || empty($this->email) || empty($this->pwd) || empty($this->pwdRe)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidUid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
  	private function validPwd() {
        $result;
        if (strlen($this->pwd) < 8) {
            $result = false;
        } elseif (!preg_match("/[a-zA-Z]/", $this->pwd)) {
            $result = false;
        } elseif (!preg_match("/[0-9]/", $this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->pwdRe) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function takenNameCheck() {
        $result;
        if (!$this->checkUser($this->name, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    public function fetchUserId($name) {
        $userId = $this->getUserId($name);
        return $userId[0]['id'];
    }

}