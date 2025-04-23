<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Admin Signup</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Full Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                <tr>

                    <td>Email</td>
                    <td><input type="text" name="email" placeholder="Enter Email"></td>
                </tr>

                <tr>

                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>  
                                <tr>

                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>  
                <tr>

                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>  
                <tr>

                    <td>Select Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="sumbit" value="Signup" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['signup'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $confirm_password = md5($_POST['confirm_password']);
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];


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
                    $destination_path = "../images/profile/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                } 
                else 
                {
                    // Don't upload
                    $image_name = "";
                }

                if ($password == $confirm_password) {
                    // SQL query to insert the admin
                    $sql = "INSERT INTO admin SET
                    full_name='$full_name',
                    username='$username',
                    email='$email',
                    password='$password'";
                    
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        // Signup successful
                        echo "Signup Successful";
                        header('location:'.SITEURL.'admin/admin-login.php');
                    } else {
                        // Signup failed
                        echo "Signup Failed";
                        header('location:'.SITEURL.'admin/admin-signup.php');
                    }
                } else {
                    // Passwords do not match
                    echo "Passwords do not match";
                }

            }