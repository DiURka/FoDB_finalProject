<?php
header('Access-Control-Allow-Origin: *');

$targetUrl = 'https://cbu.uz/oz/';

$ch = curl_init($targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($ch);

if (curl_errno($ch)) {
  // Handle cURL error
  echo 'Failed to fetch data: ' . curl_error($ch);
  curl_close($ch);
  exit();
}

curl_close($ch);

echo $data;
?>