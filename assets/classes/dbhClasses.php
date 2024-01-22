<?php
class Dbh {
    protected function connect() {
        try { 
            $serverName = "localhost";
            $dbname = "unitopuz_univers";
            $dbUserName = "root";
            $dbPassword = "root";
            $dbh = new PDO("mysql:host=$serverName; dbname=$dbname; charset=utf8", $dbUserName, $dbPassword);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessege() . "<br/>";
            die();
        }
    }
}