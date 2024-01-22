<?php
    $update = [
        'id' => $id,
        'userId' => $userId,
        'rating' => $rating,
        'comment' => $userComment,
        'c_date' => "$date"
    ];

    $sql = "UPDATE ratings SET rating = :rating, comment = :comment, comment_date = :c_date WHERE id_user = :userId AND id_university = :id";
    $query = $dbh -> prepare($sql);
    $result = $query -> execute($update);
    if ($result == true) {
        session_start();
        $_SESSION['reviewUpdated'] = true;
    } else {
        session_start();
        $_SESSION['reviewError'] = true;
    }
    // Redirect using JavaScript after displaying prompts
    echo '<script>window.location.href = window.location.href;</script>';
    exit;
?>