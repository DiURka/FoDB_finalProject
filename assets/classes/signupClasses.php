<?php

class Signup extends Dbh {
    
    protected function setUser($name, $pwd, $email, $fname, $lname, $bday, $gen, $ctz) {
        $stmt = $this->connect()->prepare('INSERT INTO users (nick, pass, mail, first_name, last_name, birth_day, sex, citizenship) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $hashedPwd, $email, $fname, $lname, $bday, $gen, $ctz))) {
            $stmt = null;
            header('Location: /?id=registration?error=stmtfailed');
            exit();
        }

        session_start();
        $_SESSION['emptyInput'] = false;
        $_SESSION['incorrectName'] = false;
        $_SESSION['incorrectEmail'] = false;
      	$_SESSION['invalidPwd'] = false;
        $_SESSION['incorrectRePass'] = false;
        $_SESSION['nameTaken'] = false;
        $_SESSION['signedUp'] = true;

        $stmt = null;
    }



    protected  function checkUser($name, $email) {
        $stmt = $this->connect()->prepare('SELECT nick FROM users WHERE nick = ? OR mail = ?;');

        if(!$stmt->execute(array($name, $email))) {
            $stmt = null;
            header('Location: /?id=registration?error=stmtfailed');
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function getUserId($name) {
        $stmt = $this->connect()->prepare('SELECT id FROM users WHERE nick = ?;');
    
        if(!$stmt->execute(array($name))) {
            $stmt = null;
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

}