<?php
    session_start();
    require 'assets/inc/dateTime.php';

    $id = (int)$_GET['id'];
    $userId = (int)$_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $userComment = $_POST["userComment"];
	$rating = $_POST["rate"];
	$_SESSION['ratingSet'] = true;

    $sql = "SELECT * FROM universities WHERE id = $id";
    $query = $dbh -> prepare($sql);
    $res = $query -> execute($_GET);
    $post = $query -> fetch(PDO::FETCH_ASSOC);
    
	$price_l = intval($post['price_l']);
	$price_f = intval($post['price_f']);
	$price= intval($price_l / $rate);
	$price_l < 1000000 ? $currency_l = "USD" : $currency_l = "UZS";
	$price_lFormatted = number_format($price_l, 0, '.', ' ');
	$price_f < 1000000 ? $currency_f = "USD" : $currency_f = "UZS";
	$price_fFormatted = number_format($price_f, 0, '.', ' ');
	$priceFormatted = number_format($price, 0, '.', ' ');

    $sqli = "SELECT * FROM ratings WHERE id_university = $id";
    $ratings = mysqli_query($conn, $sqli);

    $sqli = "SELECT * FROM ratings WHERE id_user = $userId AND id_university = $id";
    $userRates = mysqli_query($conn, $sqli);
    $userRate = mysqli_fetch_assoc($userRates);

    $sqli = "SELECT * FROM admission WHERE id_university = $id";
    $faculties = mysqli_query($conn, $sqli);
    $facultiesNumber = mysqli_num_rows($faculties);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['userId'])) {
        $sql = ("SELECT id_user FROM ratings WHERE id_user = $userId AND id_university = $id");
        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
            if (floatval($rating) >= 0 && floatval($rating) <= 5) {
                if($rowcount == 0) {
                    require_once('addComment.php');
                } else {
                    require_once('editComment.php');
                }
            }
             else {
                $_SESSION['ratingSet'] = false;
            }
        }
        } else {
            $_SESSION['prompt'] = true;
            header('Location: /?id=login');
        }
        mysqli_close($conn);
    }

    session_start();
    
    if (isset($_SESSION['ratingSet']) && $_SESSION['ratingSet'] == false) {?>
        <div class="prompt text-bg-info">
            <span>Please select <code> rating </code> to submit...</span>
        </div>
        <?php
        $_SESSION['ratingSet'] = true;
    } elseif (isset($_SESSION['reviewSent']) && $_SESSION['reviewSent'] == true) {?>
        <div class="prompt text-bg-success">
            <span>Submitted successfully!</span>
        </div>
        <?php
        $_SESSION['reviewSent'] = false;
    } elseif (isset($_SESSION['reviewUpdated']) && $_SESSION['reviewUpdated'] == true) {?>
        <div class="prompt text-bg-success">
            <span>Updated successfully!</span>
        </div>
        <?php
        $_SESSION['reviewUpdated'] = false;
    } elseif (isset($_SESSION['reviewDeleted']) && $_SESSION['reviewDeleted'] == true) {?>
        <div class="prompt text-bg-success">
            <span>Deleted successfully!</span>
        </div>
        <?php
        $_SESSION['reviewDeleted'] = false;
    } elseif (isset($_SESSION['reviewError']) && $_SESSION['reviewError'] == true) {?>
        <div class="prompt text-bg-danger">
            <span>Oops something went wrong!</span>
        </div>
        <?php
        $_SESSION['reviewError'] = false;
    }
?>