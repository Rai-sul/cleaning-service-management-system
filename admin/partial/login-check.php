<?php  
    session_start(); // Start the session
    if (!isset($_SESSION['user'])){
        header('location:'.SITEURL.'admin/admin-login.php');
    }
?>