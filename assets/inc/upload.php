<?php
    session_start();
    require 'dbh.php';
    require 'functions.php';
    $id=$_SESSION['userId'];

    if (isset($_POST['imageSubmit'])) {
        $file = $_FILES['imageFile'] ;
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExploded = explode('.', $fileName);
        $fileActualName = 'profile' . $id;
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

                    $sql = "UPDATE profiles SET image_url='$filePath' WHERE users_id='$id';";
                    $query = $dbh -> prepare($sql) -> execute();

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                } else {
                    alert("Your file is too big!");
                }
            } else {
                alert("There was an error uploading your file!");
            }
        } else {
            alert("You cannot upload files of this type!");
        }
        
        history_back();
        exit();
    }
?>