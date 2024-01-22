<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //data
    $name = htmlspecialchars($_POST["userName"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["userPass"], ENT_QUOTES, 'UTF-8');

    // classes instantiating
    include "../classes/dbhClasses.php";
    include "../classes/loginClasses.php";
    include "../classes/loginController.php";
    $login = new LoginContr($name, $pwd);

    // error handlers and user login
    $login->loginUser();

    // back to front page
    header('Location: /');
}
?>