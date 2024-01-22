<?php
session_start();
require 'dbh.php';
require 'functions.php';

$id = $_GET['id'] ?? 'index';
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'default';
$isError = isset($_GET['error']) ? $_GET['error'] : 'default';
$userBalance = getUserBalance($_SESSION['userId']);

$orderBy = sortBy($sort);
$filterBy = filterBy($filter);

$countQuery = $dbh->prepare("SELECT COUNT(id) AS total FROM universities WHERE $filterBy");
$countQuery->execute();
$totalResult = $countQuery->fetch(PDO::FETCH_ASSOC);
$total = $totalResult['total'];
$pages = ceil($total / $limit);

//$result = $dbh -> query("SELECT count(id) AS id FROM universities");
//$postsNum = $result -> fetchAll(PDO::FETCH_ASSOC);
//$total = $postsNum[0]['id'];
//$pages = ceil($total / $limit);

$res = $dbh->prepare("SELECT * FROM universities WHERE $filterBy ORDER BY $orderBy[0] $orderBy[1] LIMIT :start, :limit");
$res->bindParam(':start', $start, PDO::PARAM_INT);
$res->bindParam(':limit', $limit, PDO::PARAM_INT);
$res->execute();
$posts = $res->fetchAll(PDO::FETCH_ASSOC);

$exchange = $dbh->prepare("SELECT rate FROM exchange_rates WHERE id=1");
$exchange->execute();
$rate = floatval($exchange->fetchAll(PDO::FETCH_ASSOC)[0]["rate"]);

foreach ($posts as $post) {
    $idPost = $post['id'];
    $rating = get_rating($idPost);
    $dbh->exec("UPDATE universities SET rating = $rating WHERE id=$idPost");
};

if (is_numeric($id)) {
    $viewPost = $dbh -> prepare("SELECT title FROM universities WHERE id=$id");
    $viewPost -> execute();
    $title = $viewPost -> fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    	<link rel="stylesheet" href="assets/libs/bs/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/libs/airdatepicker/air-datepicker.css">
      	<link rel="stylesheet" href="assets/css/main.css">
      	<?php if (!is_numeric($id)) {?>
      	   		<title>UniTop | Uzbekistan universities</title>
		<?} else {?>
      			<link rel="stylesheet" href="assets/libs/jquery/plugins/jquery.rateyo.min.css">
      	        <title>UniTop<?echo " | ".$title[0]['title'];?></title>
        <?}?>
    </head>
    <body data-spy="scroll" data-target="#contentList" data-offset="50">
      	<?
           	
            if ($_SESSION['invalidMessage'] == true) {?>
                <div class="prompt text-bg-danger">
                    <span>Please provide a valid email and message.</span>
                </div>
                <?$_SESSION['invalidMessage'] = false;
            } else if ($_SESSION['messageSent'] == true) {?>
                <div class="prompt text-bg-success">
                    <span>Sent successfully!</span>
                </div>
                <?$_SESSION['messageSent'] = false;
            } else if ($_SESSION['reviewError'] == true) {?>
                <div class="prompt text-bg-danger">
                    <span>Error while processing the request.</span>
                </div>
                <?$_SESSION['reviewError'] = false;
                session_unset();
                session_destroy();
            }
        ?>
        <nav class="navbar">
            <div class="logo">
                <a href="?id=index">
                    <img src="assets/images/logo.png" alt="UniTop-logo">
                </a>
            </div>
            <h1 class="pt-1">
                UniTop
            </h1>
            <?
            if(isset($_SESSION["userId"])) {
            ?>
                <div class="profile pt-1">
                    <div class="dropdown">
                    	<a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>
                          	<div class="nick">
                          		<?=$_SESSION["userName"];?>
                          	</div>
                    	</a> 
                    	<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                            <a href="/?id=payment">
                                <li>
                                    Balance: <?="$" . $userBalance;?>
                                </li>
                            </a>
                            <li><hr class="dropdown-divider"></li>
                            <a href="?id=profile">
                                <li>
                                   Profile
                                </li>
                            </a>
                            <li><hr class="dropdown-divider"></li>
                          	<a href="assets/inc/logout.php">
                        		<li>
                            	  Log Out
                             	</li>
                          	</a>
                    	</ul>
                    </div>
                  	<button type="button" class="navbar-btn light d-inline-flex" data-theme="light">
                        <span class="icon-sun"></span>
                        <span class="icon-moon"></span>
                    </button>
                </div>
            <?
            } else {
            ?>
                <div class="authorization w-100 d-flex justify-content-between align-items-center gap-2">
                    <a href="?id=login">
                        <div class="login w-100 d-flex justify-content-center align-items-center p-2">
                            Log In
                        </div>
                    </a>
                    <a href="?id=registration" class="btn-static signup w-100 d-flex justify-content-center align-items-center p-2">
                        <div>
                            Sign Up
                        </div>
                    </a>
                  	<button type="button" class="navbar-btn light d-inline-flex" data-theme="light">
                        <span class="icon-sun"></span>
                        <span class="icon-moon"></span>
                    </button>
                </div>
            <?
            }
            ?>
        </nav>