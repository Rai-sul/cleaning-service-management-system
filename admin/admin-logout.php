<?php 
    session_start(); // Start the session
    $_SESSION['admin-logout'] = "<div class='success-message'>Logout Successful</div>";
    session_destroy(); // Destroy the session to log out the user

    header('location:' . 'admin-login.php');
?>