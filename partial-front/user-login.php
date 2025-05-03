<?php  
    
    if (!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'services.php');
    }

?>