<?php include('partial/menu.php'); ?>

<?php  
    if (isset($_GET['id']) || isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if ($image_name != "") {

            // Accessing the path to delete the image
            $path = "../images/services/" . $image_name;

            // Remove the Image
            $remove = unlink($path);

            // if ($remove == false) {
            //     header('location:' . SITEURL . 'admin/manage-services.php');
            //     // Stop the Process
            //     die();
            // }
        }
    }
    $sql = "DELETE FROM service WHERE Id=$id";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $_SESSION['ser-del-error'] = "<div class='error-message'>Service can't be Deleted Because users hold the current service!</div>";
        header('location:' . SITEURL . 'admin/manage-services.php');
    }
    header('location:' . SITEURL . 'admin/manage-services.php');
    
?>

<?php include('partial/footer.php') ?>