<?php
include 'assets/inc/navbar.php';
if ($id == 'index' && $page == 1) {
    include 'assets/inc/header.php';
}
if (is_numeric($id)) {
    include 'assets/inc/review.php';
    include 'assets/inc/contentList.php';
    include 'assets/pages/view.php';
} else {
    switch ($id) {
        case 'registration': include 'assets/pages/registration.php'; break;
        case 'login': include 'assets/pages/login.php'; break;
        case 'profile': include 'assets/pages/profile.php'; break;
        case 'settings': include 'assets/inc/profileSettings.php'; break;
        case 'payment': include 'assets/inc/payment.php'; break;
        // case 'success': include 'assets/inc/success.php'; break;
        case 'search': include 'assets/inc/searched.php'; break;
        case 'about': include 'assets/pages/aboutUs.php'; break;
        case 'privacy': include 'assets/pages/privacyPolicy.php'; break;
        case 'cookies': include 'assets/pages/cookies.php'; break;
        case 'terms': include 'assets/pages/useTerms.php'; break;
        case 'disclaimer': include 'assets/pages/disclaimer.php'; break;
        default: include 'assets/inc/index.php'; break;
    }
}
if ($id == 'index') {
    include 'assets/inc/pagination.php';
}
include 'assets/inc/footer.php';
?>