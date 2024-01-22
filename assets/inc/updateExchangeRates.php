<?php
// Set the response headers to indicate JSON content type
header('Access-Control-Allow-Origin: assets/inc/proxy.php');
header('Content-Type: application/json');

// Require the dbh.php file to establish the database connection
require 'dbh.php';

// Ensure that the script only responds to POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405); // Method Not Allowed
  exit();
}

// Receive the JSON data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Prepare and execute the SQL query to update the exchange rates in the database
$stmt = mysqli_prepare($conn, 'UPDATE exchange_rates SET rate = ? WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'di', $rate, $id);

// Initialize a response array
$response = array();

foreach ($data as $exchangeRate) {
  $rate = $exchangeRate['rate'];
  $id = $exchangeRate['id'];
  mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Add a success message to the response
$response['message'] = 'Exchange rates updated successfully';

// Send the JSON response back to JavaScript
echo json_encode($response);
?>