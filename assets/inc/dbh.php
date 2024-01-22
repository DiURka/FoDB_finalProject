<?php

// dbData
$serverName = 'localhost';
$dbName = 'unitopuz_univers';
$encoding = 'utf8';
$dbUserName = 'root';
$dbPassword = 'root';

// PDO connect
try { 
    $dbh = new PDO("mysql:host=$serverName; dbname=$dbName; charset=$encoding", $dbUserName, $dbPassword);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessege() . "<br/>";
    exit();
    die();
}

// Procedual connect
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
    die();
}

