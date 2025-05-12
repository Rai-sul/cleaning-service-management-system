<?php 
    include('partial/menu.php');
    if(isset($_GET['id']) || isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/category/".$image_name;
           
            $remove = unlink($path);

        }
        $sql="DELETE FROM category WHERE Id=$id";
        $res=mysqli_query($conn, $sql);
        header("location:".SITEURL.'admin/manage-category.php');
    }
        

    include('partial/menu.php');
?>