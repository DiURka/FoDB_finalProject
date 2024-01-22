<?php
    // header("Content-Type: application/json"); // Set the Content-Type header
    require('dbh.php');
    $rId = $_GET['rId'];

    $sql = "DELETE FROM ratings WHERE id=$rId;";
    $query = $dbh -> prepare($sql);
    $result = $query -> execute();

    if ($result == true) {
        session_start();
        $_SESSION['reviewDeleted'] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        session_start();
        $_SESSION['reviewError'] = true;
    }
    
    // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     $reviewId = intval($_POST["reviewId"]);
        
    //     // Add your database connection code here
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "root";
    //     $dbname = "unitopuz_univers";
        
    //     $conn = new mysqli($servername, $username, $password, $dbname);
        
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     }
        
    //     // Use a prepared statement for deleting the comment
    //     $sql = "DELETE FROM ratings WHERE id = ?";
        
    //     // Create a prepared statement
    //     $stmt = $conn->prepare($sql);
        
    //     if ($stmt) {
    //         // Bind the value of $reviewId to the prepared statement
    //         $stmt->bind_param("i", $reviewId);
            
    //         // Execute the prepared statement
    //         if ($stmt->execute()) {
    //             // Return a JSON response indicating success
    //             echo json_encode(["success" => true]);
    //         } else {
    //             // Return a JSON response indicating failure
    //             echo json_encode(["success" => false, "message" => "Failed to delete the comment"]);
    //         }
            
    //         // Close the prepared statement
    //         $stmt->close();
    //     } else {
    //         // Return a JSON response indicating failure
    //         echo json_encode(["success" => false, "message" => "Invalid query params"]);
    //     }
        
    //     $conn->close();
    // } else {
    //     // Return a JSON response for invalid request method
    //     echo json_encode(["success" => false, "message" => "Invalid request method."]);
    // }
?>