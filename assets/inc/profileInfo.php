<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['userId'];
    $name = $_SESSION['userName'];
    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, "UTF-8");
    $introTitle = htmlspecialchars($_POST["introTitle"], ENT_QUOTES, "UTF-8");
    $introText = htmlspecialchars($_POST["introText"], ENT_QUOTES, "UTF-8");

    require $_SERVER['DOCUMENT_ROOT'] . '/assets/classes/dbhClasses.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/assets/classes/profileInfoClasses.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/assets/classes/profileInfoController.php';
    $profileInfo = new ProfileInfoContr($id, $name);

    $profileInfo->updateProfileInfo($about, $introTitle, $introText); 

    header('Location: /?id=profile');
}