<?php 
    session_start(); // Start the session
    session_destroy(); // Destroy the session to log out the user
    $_SESSION['admin-logout'] = "<div class='success-message'>Logout Successful</div>";
    header('location:' . 'admin-login.php');
?>