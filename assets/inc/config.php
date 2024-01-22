<?php 
 
// Product Details  
// Static for now
$productName = "Application";
$productId = "00";
$productPrice = 2; 
$currency = "usd"; 

define('STRIPE_API_KEY', 'sk_test_51OVRG8GvRicPy0MgNNhaddts2U0eTBk7UFzV6Z0cPmvlWLrwaf3io8eSvGROI8CB7jBTTmJMUxh2QutsWUpY8OFj00bXrYxO5T'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51OVRG8GvRicPy0MgyZAd7PmXAdAdTYrm4ztxdPrVYRgS9G1BnvkfBelcDdpZ2OymuWENDFAIoL6lRfFARj2JzdMG003vJs2FYJ'); 
define('STRIPE_SUCCESS_URL', 'http://uz-univers/assets/inc/success.php'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'http://uz-univers/?id=index'); //Payment cancel URL 
    
// Database configuration    
// define('DB_HOST', 'MySQL_Database_Host');   
// define('DB_USERNAME', 'MySQL_Database_Username'); 
// define('DB_PASSWORD', 'MySQL_Database_Password');   
// define('DB_NAME', 'MySQL_Database_Name'); 
 
?>