<?php
session_start();
require 'dbh.php';
require 'functions.php';

if (isset($_POST['apply_submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    // Process Passport Image
    $passport_image = processImage('passport_image', 'passport');

    // Process Diploma Image
    $diploma_image = processImage('diploma_image', 'diploma');

    // Process Optional Certificates Image
    $certificates_image = isset($_FILES['certificates_image']) ? processImage('certificates_image', 'certificates') : null;

    // Insert the data into the 'appeals' table in your database
    $sql = "INSERT INTO appeals (full_name, email, passport_image, diploma_image, certificates_image)
            VALUES ('$full_name', '$email', '$passport_image', '$diploma_image', '$certificates_image')";
    $query = $dbh->prepare($sql)->execute();

    $balance = intval(getUserBalance($_SESSION['userId']));
    // $paymentAmount = intval($checkout_session->amount_total) / 100;
    $paymentAmount = 2;
    
    if ($balance >= $paymentAmount) {
        updateUserBalance($_SESSION['userId'], $balance, (-1) * $paymentAmount);
        header('Location: /?paymentsuccess');
        exit();
    } else {
        // Redirect or display success message
        header('Location: paymentInit.php');
        exit();
    }
}

// Function to process image uploads
function processImage($inputName, $imageType)
{
    $file = $_FILES[$inputName];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExploded = explode('.', $fileName);
    $fileActualName = $imageType . '_' . uniqid();
    $fileActualExt = strtolower(end($fileExploded));
    $allowed = array('jpg', 'jpeg', 'png', 'webp');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize <= 200000) {
                $fileRootPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $fileActualName . '.' . $fileActualExt;
                $filePath = str_replace($_SERVER['DOCUMENT_ROOT'] . '/', '', $fileRootPath);

                // Check if the file exists
                foreach ($allowed as $a) {
                    $fileCandidate = str_replace($fileActualExt, $a, $fileRootPath);
                    if (file_exists($fileCandidate)) {
                        unlink($fileCandidate);
                    }
                }
                move_uploaded_file($fileTmpName, $fileRootPath);

                return $filePath;
            } else {
                alert("Your file is too big!");
            }
        } else {
            alert("There was an error uploading your file!");
        }
    } else {
        alert("You cannot upload files of this type!");
    }
}
?>