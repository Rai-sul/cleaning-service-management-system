<?php  
    
    if (!isset($_SESSION['user-admin']))
    {
        header('location:'.SITEURL.'admin/admin-login.php');
    }

?>