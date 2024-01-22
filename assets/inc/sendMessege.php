<?php
require 'dbh.php';


// Validate and sanitize user input
$userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_VALIDATE_EMAIL);
$userMessage = filter_input(INPUT_POST, 'userMessege', FILTER_SANITIZE_STRING);

// Check if the input is valid
if (!$userEmail || !$userMessage) {
    session_start();
    $_SESSION['invalidMessage'] = true;
    // Handle invalid input (e.g., show an error message to the user)
    header('Location: /');
    exit();
}

$sql = "INSERT INTO appeals (id, mail, messege) VALUES (NULL, :userEmail, :userMessage)";
$query = $dbh->prepare($sql);

// Bind parameters to the prepared statement
$query->bindParam(':userEmail', $userEmail);
$query->bindParam(':userMessage', $userMessage);

$res = $query->execute();

if ($res) {
    session_start();
    $_SESSION['messageSent'] = true;
    // Redirect to a success page or show a success message
    header('Location: /');
} else {
    session_start();
    $_SESSION['messageError'] = true;
    // Handle the error (e.g., log it, show an error message)
    header('Location: /');
}
?>