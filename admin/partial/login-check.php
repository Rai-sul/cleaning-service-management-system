<?php  
    
    if (!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/admin-login.php');
    }

?>