<?php
    $sql = "INSERT INTO ratings (id, id_university, rating, id_user, comment, comment_date, name_user) VALUES (NULL, $id, $rating, $userId, '$userComment', '$date', '$userName')";
    $query = $dbh -> prepare($sql);
    $result = $query -> execute();
    
    if ($result == true) {
        session_start();
        $_SESSION['reviewSent'] = true;
    } else {
        session_start();
        $_SESSION['reviewError'] = true;
    }
    // Redirect using JavaScript after displaying prompts
    echo '<script>window.location.href = window.location.href;</script>';
    exit;
?>