<?php 
    session_start(); 
    $_SESSION['admin-logout'] = "<div class='success-message'>Logout Successful</div>";
    session_destroy(); 

    header('location:' . 'admin-login.php');
?>