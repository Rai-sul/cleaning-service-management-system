<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <?php  
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM admin WHERE Id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $username = $rows['User_Name'];
                        $full_name = $rows['Full_Name'];
                        $email = $rows['Email'];
                        $current_image = $rows['Image_Name'];
                    }
                } else {
                    $current_image = ""; // Initialize to avoid undefined variable warning
                }
            } else {
                $current_image = ""; // Initialize to avoid undefined variable warning
            }
        ?>

        <form action="" method="POST" class="form-style" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Current Name:</td>
                    <td>
                        <input type="text" name="current_name" value="<?php echo htmlspecialchars($full_name); ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>New Name:</td>
                    <td>
                        <input type="text" name="new_name" placeholder="Your New Username">
                    </td>
                </tr>

                <tr>
                    <td>Current Username:</td>
                    <td>
                        <input type="text" name="current_username" value="<?php echo htmlspecialchars($username); ?>" readonly >
                    </td>
                </tr>

                <tr>
                    <td>New Username:</td>
                    <td>
                        <input type="text" name="new_username" placeholder="Your New Username">
                    </td>
                </tr>

                <tr>
                    <td>Current Email</td>
                    <td>
                        <input type="text" name="current_email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                </tr>

                <tr>
                    <td>New Email</td>
                    <td>
                        <input type="text" name="new_email" placeholder="Your New Email">
                    </td>
                </tr>

                <tr>
                    <td>Current Image</td>
                    <?php 
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
                                <td>
                                <img src="<?php echo SITEURL; ?>images/profile/<?php echo $current_image; ?>" width="150px">
                                </td>
                                <?php
                                
                            }
                            else
                            {
                                //Display Message
                                $current_image="";
                            }
                        ?>
                </tr>
                <tr>
                    <td>Update Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
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
    if (isset($_POST['submit'])) {
        $current_name = $_POST['current_name'];
        $new_name = $_POST['new_name'];
        $current_username = $_POST['current_username'];
        $new_username = $_POST['new_username'];
        $current_email = $_POST['current_email'];
        $new_email = $_POST['new_email'];

        //**************** */ Need to focus on below portion ****************

        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                $ext = end(explode('.', $image_name));
                $image_name = "Profile_Category_" . rand(000, 999) . '.' . $ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/profile/" . $image_name;
                $upload = move_uploaded_file($source_path, $destination_path);
                // remove the previous current image
                $path = "../images/profile/".$current_image;
                //REmove the Image
                $remove = unlink($path);
            } else {
                $image_name = $current_image;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/profile/" . $image_name;
                $upload = move_uploaded_file($source_path, $destination_path);
            }
        }

        //**************** */ Need to focus on above portion ****************

        if($new_name == "")
        {
            $new_name = $current_name;
        }
        if($new_username == "")
        {
            $new_username = $current_username;
        }
        if($new_email == "")
        {
            $new_email = $current_email;
        }


        $sql2 = "UPDATE admin SET
            Full_Name='$new_name',
            User_Name='$new_username',
            Image_Name='$image_name',
            Email = '$new_email'
            WHERE Id=$id";

        $res2 = mysqli_query($conn, $sql2);

        if ($res2 == true) {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
    if(isset($_POST['cancle']))
    {
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>

<?php include('partial/footer.php') ?>