<?php
// console log
function console_log($message) {
  echo
    "<script type='text/javascript'>
      console.log('$message');
    </script>"; 
}

// alert function
function alert($message) { 
	echo
    "<script type='text/javascript'>
      alert('$message');
    </script>"; 
}

// redirect
function redirect($url) {
  echo
    "<script type='text/javascript'>
      window.location.href = '$url';
    </script>"; 
}

// go back
function history_back() {
  echo
    "<script type='text/javascript'>
      window.history.back();
    </script>";
}

// avg rating
function get_rating($rid) {
  require 'dbh.php';
  $sqli = "SELECT * FROM ratings";
  $ratings = mysqli_query($conn, $sqli);
  
  $all_ratings = array();
  foreach ($ratings as $row) {
    if($row['id_university'] == $rid) {
        $all_ratings[] = $row;
    }
  }
  if(!empty($all_ratings)) {
    $total_rating = 0;
    for($i = 0; $i < count($all_ratings); $i++) {
        $total_rating += $all_ratings[$i]['rating'];
    }
    return round($total_rating / count($all_ratings), 1);
  } else return 0;
}

// Get user balance
function getUserBalance($userId) {
  require 'dbh.php';
  $sql = "SELECT * FROM users WHERE id='$userId';";
  $query = $dbh -> prepare($sql);
  $res = $query -> execute();
  $userBalance = $query -> fetchAll(PDO::FETCH_ASSOC)[0]['balance'];
  return $userBalance;
}

// Update user balance
function updateUserBalance($customerId, $customerBalance, $paymentAmount) {
  require 'dbh.php';
  try {
    $dbh->beginTransaction();

    $balanceUpdated = $customerBalance + $paymentAmount;

    $sql = "UPDATE users SET balance=:balanceUpdated WHERE id=:customerId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':balanceUpdated', $balanceUpdated, PDO::PARAM_INT);
    $query->bindParam(':customerId', $customerId, PDO::PARAM_INT);

    if (!$query->execute()) {
        // If the update fails, throw an exception to trigger a rollback
        throw new Exception("Error updating balance for user $customerId");
    }
    $dbh->commit();
  } catch (Exception $e) {
    $dbh->rollBack();
    error_log($e->getMessage());
  }
}

// sorting
function sortBy($sort) {
  switch ($sort) {
    case 'name':
      return array('title', 'ASC');
    case 'rating':
      return array('rating', 'DESC');
    case 'price_asc':
      return array('price', 'ASC');
    case 'price_desc':
      return array('price', 'DESC');
    default:
      return array('id', 'ASC');
  }
}

// filtering
function filterBy($filter) {
  switch ($filter) {
    case 'gov':
      return 'type = "gov"';
    case 'priv':
      return 'type = "priv"';
    default:
      return '1=1';
  }
}

// function emptyInputsSignup($name, $email, $pwd, $pwdRe) {
//     $result;
//     if (empty($name) || empty($email) || empty($pwd) || empty($pwdRe)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
// function invalidUid($name) {
//     $result;
//     if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
// function invalidEmail($email) {
//     $result;
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
// function pwdMatch($pwd, $pwdRe) {
//     $result;
//     if ($pwd !== $pwdRe) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
// function uidExists($conn, $name, $email) {
//     $sql = "SELECT * FROM users WHERE nick = ? OR usersEmail = ?;";
// }