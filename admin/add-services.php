<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Service</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">  
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Service Title">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" name="description" placeholder="Desription">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" placeholder="Service Price">
                    </td>
                </tr>
                <tr>
                    <td>Price Description</td>
                    <td>
                        <input type="text" name="price_description" placeholder="Price Description">
                    </td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category Title</td>
                    <td> 
                        <input type="text" name="category_title" placeholder="Category Title">
                    </td> 
                </tr>
                <tr>
                    <td>Active Status</td>
                    <td> 
                        <input type="radio" name="active_status" value="Yes"> Yes
                        <input type="radio" name="active_status" value="No"> No
                    </td> 
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add" class="btn-primary">
                        <input type="submit" name="cancle" value="Delete" class="btn-danger">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $price_description = $_POST['price_description'];
    $category_title = $_POST['category_title'];
    $active_status = $_POST['active_status'];

    // Upload the image if selected
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $image_name = $_FILES['image']['name']; // Get the image name
        // Auto rename our image
        $ext = end(explode('.', $image_name));
        $image_name = "Service_" . rand(000, 999) . '.' . $ext; // Rename the image
        $source_path = $_FILES['image']['tmp_name']; // Get the source path
        $destination_path = "../images/services/" . $image_name;

    
        $upload = move_uploaded_file($source_path, $destination_path);
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO service SET 
        Title='$title',
        Description='$description',
        Price='$price',
        Price_des='$price_description',
        Image_Name='$image_name',
        Category_Title='$category_title',
        Active='$active_status'
    ";

    
    $res = mysqli_query($conn, $sql);


  
    $sql_serviceid = "SELECT Id FROM service WHERE Title='$title'";
    $res_serviceid = mysqli_query($conn, $sql_serviceid);
    $row = mysqli_fetch_assoc($res_serviceid);  
    if ($res_serviceid == true) {
        $ser_id = $row['Id'];
        $sql2 = "INSERT INTO top_ser SET service_id = $ser_id ";
        $res2 = mysqli_query($conn, $sql2);

    }


    
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Service added successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-services.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to add service.</div>";
        header('location:' . SITEURL . 'admin/manage-services.php');
    }
}
if(isset($_POST['cancle'])) {
    header('location:' . SITEURL . 'admin/manage-services.php');
}
?>

<?php include('partial/footer.php') ?>