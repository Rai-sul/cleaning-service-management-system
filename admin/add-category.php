<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter Category"></td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
            </table>
        </form>
    </div>
</div>

<?php  
    if (isset($_POST['submit'])) {
        if (empty($_POST['title']) || empty($_POST['active'])) {
            header('Location: add-category.php');
            echo ' Please Fill in the Blanks ';
        }
        else{
            $title = $_POST['title'];
            $active = $_POST['active'];
            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") 
        {
            // Upload image
            // To upload image we need image name, source path and destination path
            $image_name = $_FILES['image']['name'];
            // Auto rename image
            // Get Extension (jpg, png, gif, etc) e.g."Home1.jpg"
            $ext = end(explode('.', $image_name));

            // Rename the image
            $image_name = "Service_Category_" . rand(000, 999) . '.' . $ext; // e.g."Service_Category_876.jpg"

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/" . $image_name;
            $upload = move_uploaded_file($source_path, $destination_path);
        } 
        else 
        {
            // Don't upload
            $image_name = "";
        }

        $sql="INSERT into category SET
        Title = '$title',
        Image_Name = '$image_name',
        Active = '$active'";

        $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($res == TRUE) {
            $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
            // Redirect Page to Manage Admin
            header("location:" . SITEURL . 'admin/manage-category.php');
        } else {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            // Redirect Page to Add Admin
            header("location:" . SITEURL . 'admin/add-category.php');
        }

        }

    }
    
?>

<?php include('partial/footer.php') ?>