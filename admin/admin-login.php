<?php include('../config/constant.php')  ?>
<html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
</html>

<div class="main-content">
    <div class="wrapper">
        <h1>Admin Login</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-full">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="login" value="Login" class="btn-primary">
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <p>Don't have an account? signUp Here</p>
                        <input type="submit" name="signup" value="Signup" class="btn-primary">
                        </td>
                </tr>

            </table>
        </form>

        <?php
            if (isset($_POST['login'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                // SQL query to check if the user exists
                $sql = "SELECT * FROM admin WHERE User_Name='$username' AND Password='$password'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    // User exists and login successful
                    $_SESSION['user'] = $username; // Store username in session variable
                    header('location:'.SITEURL.'admin/index.php');
                } 
            }

            if (isset($_POST['signup'])){
                header('location:'.SITEURL.'admin/admin-signup.php');
            }

        
        ?>
    </div>
</div>
