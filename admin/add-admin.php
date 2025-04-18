<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <br><br>
        <h1>Add Admin</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter your email">
                    </td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
if (isset($_POST['submit'])) {
    if (empty($_POST['full_name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        // header("location:" . SITEURL . 'admin/add-admin.php');
        echo ' Please Fill in the Blanks ';

    }else{
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // $Full_Name = $_POST['full_name'];
        // $User_Name = $_POST['username'];
        // $Email = $_POST['email'];
        // $Password = $_POST['password'];

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
        $sql = "INSERT INTO admin SET
        Full_Name = '$full_name',
        User_Name = '$username',
        Password = '$password',
        Email = '$email',
        Image_Name = '$image_name'
    ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        // Redirect Page to Manage Admin
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
        // Redirect Page to Add Admin
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
    }
    
    }

?>

<?php include('partial/footer.php') ?>