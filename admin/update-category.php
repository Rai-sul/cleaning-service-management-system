<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM category WHERE Id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['Title'];
                    $active = $row['Active'];
                    $current_image = $row['Image_Name'];
                } else {
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                        if ($current_image != ""){
                            echo "<img src='" . SITEURL . "images/category/" . $current_image . "' width='150px'>";
                        }
                        ?>
                    </td>
                    <tr>
                        <td>New Image</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                            <input  <?php if($active=="No"){echo "checked";} ?>  type="radio" name="active" value="No"> No
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="submit" name="submit" value="Update" class="btn-primary">
                        <input type="submit" name="cancle" value="Cancle" class="btn-danger">
                        </td>
                    </tr>
            </table>
        </form>
    </div>
</div>

<?php 

    if(isset($_POST['submit'])){
        $title = $_POST['title'];


        // For update active status
        // if(isset($_POST['active'])){
        //     $active = $_POST['active'];
        // } else {
        //     $active = "No";
        // }


        // For update active status
        $active=$_POST['active'];

        // For update image
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                $ext = end(explode('.', $image_name));
                $image_name = "Profile_Category_" . rand(000, 999) . '.' . $ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/" . $image_name;
                $upload = move_uploaded_file($source_path, $destination_path);

                // remove the previous current image
                $path = "../images/category/".$current_image;
                //REmove the Image
                $remove = unlink($path);
            } else {
                $image_name = $current_image;
                
            }
        }

        $sql2 = "UPDATE category SET Title='$title', Image_Name='$image_name', Active='$active' WHERE Id=$id";
        $res2 = mysqli_query($conn, $sql2);
        if($res2 == true){
            $_SESSION['update'] = "<div class='success'>Category updated successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to update category</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    if(isset($_POST['cancle'])){
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>

<?php include('partial/footer.php') ?>
