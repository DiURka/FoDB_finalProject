<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //data
    $name = htmlspecialchars($_POST["userName"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["userEmail"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["userPass"], ENT_QUOTES, 'UTF-8');
    $pwdRe = htmlspecialchars($_POST["userPassRe"], ENT_QUOTES, 'UTF-8');
    $fname = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars($_POST["surName"], ENT_QUOTES, 'UTF-8');
    $bday = htmlspecialchars($_POST["birthDay"], ENT_QUOTES, 'UTF-8');
    $gen = htmlspecialchars($_POST["genDer"], ENT_QUOTES, 'UTF-8');
    $ctz = htmlspecialchars($_POST["citizenShip"], ENT_QUOTES, 'UTF-8');

    // classes instantiating
    include "../classes/dbhClasses.php";
    include "../classes/signupClasses.php";
    include "../classes/signupController.php";
    $signup = new SignupContr($name, $email, $pwd, $pwdRe, $fname, $lname, $bday, $gen, $ctz);

    // error handlers and user signup
    $signup->signupUser();

    $userId = $signup->fetchUserId($name);
    // profileInfoContr instantiating
    include "../classes/profileInfoClasses.php";
    include "../classes/profileInfoController.php";
    $profileInfo = new ProfileInfoContr($userId, $name);
    $profileInfo->defaultProfileInfo();

    // proceed to login page
    header('Location: /?id=login');

    // if(emptyInputsSignup($name, $email, $pwd, $pwdRe) !== false) {
    //     header('Location: /?id=registration?error=emptyinput');
    //     exit();
    // }
    // if(invalidUid($name) !== false) {
    //     header('Location: /?id=registration?error=invaliduid');
    //     exit();
    // }
    // if(invalidEmail($email) !== false) {
    //     header('Location: /?id=registration?error=invalidemail');
    //     exit();
    // }
    // if(pwdMatch($pwd, $pwdRe) !== false) {
    //     header('Location: /?id=registration?error=passworddismatch');
    //     exit();
    // }
    // if(uidExists($conn, $name, $email) !== false) {
    //     header('Location: /?id=registration?error=usernametaken');
    //     exit();
    // }
    // createUser($conn, $name, $email, $pwd);

//     $sql = "INSERT INTO users (id, nick, mail, pass) VALUES (NULL, :userName, :userEmail, :userPass)";
//     $query = $dbh->prepare($sql);
//     $res = $query->execute($_POST);
//     header('Location: /');
// } else {
//     header('Location: /?id=registration');
}
?>
