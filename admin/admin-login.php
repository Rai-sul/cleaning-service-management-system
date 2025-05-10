<?php include('../config/constant.php');  ?>


<html>
    <head>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
</html>

<?php
  if (isset($_SESSION['admin-logout'])) {
      echo "<div class='success-message'>" . $_SESSION['admin-logout'] . "</div>";
      unset($_SESSION['admin-logout']);
  }
?>


<body class="loginBody">
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="" method="POST">
            <!-- <table class="tbl-full"> -->
                <tr>
                    <td><h2>Username</h2></td>
                    <td><input type="text" name="username" placeholder="Enter Username" required></td>
                </tr>
                <tr>
                    <td><h2>Password</h2></td>
                    <td><input type="password" name="password" placeholder="Enter Password" required></td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <input type="submit" name="login" value="Login" class="btn-primary">
                    </td>
                </tr>

            <!-- </table> -->
        </form>

        <?php
            if (isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                // SQL query to check if the user exists
                $sql = "SELECT * FROM admin WHERE User_Name='$username' AND Password='$password'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    // User exists and login successful
                    $_SESSION['user-admin'] = $username ; // Store username in session variable
                    $_SESSION['admin-login'] = "<div class='success-message'>Login Successful</div>";
                    header('location:'.SITEURL.'admin/');
                } 
            }

            if (isset($_POST['signup'])){
                header('location:'.SITEURL.'admin/admin-signup.php');
            }

        
        ?>
    </div>
</body>
