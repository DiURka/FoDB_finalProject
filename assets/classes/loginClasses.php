<?php

class Login extends Dbh {

    protected  function getUser($name, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pass FROM users WHERE nick = ? OR mail = ?;');

        if(!$stmt->execute(array($name, $name))) {
            $stmt = null;
            header('Location: /?id=login?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: /?id=login');
            session_start();
            $_SESSION['incorrect'] = true;
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pass"]);

        if($checkPwd == false) {
            $stmt = null;
            header('Location: /?id=login');
            session_start();
            $_SESSION['incorrect'] = true;
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE nick = ? OR mail = ? LIMIT 1;');

            if(!$stmt->execute(array($name, $name))) {
                $stmt = null;
                header('Location: /?id=login?error=stmtfailed');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["id"];
            $_SESSION["userName"] = $user[0]["nick"];
            $_SESSION["userEmail"] = $user[0]["mail"];
            $_SESSION["userFirstName"] = $user[0]["first_name"];
            $_SESSION["userLastName"] = $user[0]["last_name"];
            $_SESSION["userAge"] = $user[0]["birth_day"];
            $_SESSION["userSex"] = $user[0]["sex"];
            $_SESSION["userCitizenship"] = $user[0]["citizenship"];
            $_SESSION["userLoyalty"] = substr($user[0]["created_at"], 0, 10);
            $_SESSION['prompt'] = false;
            $_SESSION['incorrect'] = false;
            $_SESSION['empty'] = false;

            $stmt = null;
        }
        $stmt = null;
    }
    
}