<?php include('config/constant.php');  ?>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        // echo $id;
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
</html>

<body class="loginBody">
    <div class="login-container">
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="hidden" name="service_id" value="<?php echo $id; ?>">
            <input type="submit" name="login" value="Login">
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="user-signup.php?id=<?php echo $id; ?>" class="btn btn-primary">Sign Up Here</a></p>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $service_id = $_POST['service_id']; // Retrieve the service ID from the hidden input
        // SQL query to check if the user exists
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res); // Count the number of rows returned
        if ($count == 1) {
            // User exists and login successful
            $row = mysqli_fetch_assoc($res); // Fetch the user data
            $ID = $row['id']; // Fetch the user ID
        } else {
            echo "<div style='color: red; margin-top: 10px;'>Invalid Username or Password</div>";
        }
        // $ID= mysqli_fetch_assoc($res)['id']; // Fetch the user ID
    
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            // User exists and login successful

            $_SESSION['user'] = $username; // Store username in session variable
            header('location:' . SITEURL . 'booking.php?id=' . $service_id . '&Uid=' . $ID);
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "<div style='color: red; margin-top: 10px;'>Invalid Username or Password</div>";
        }
    }


    // if (isset($_POST['signup'])){
    //     header('location:'.SITEURL.'user-signup.php');
    // }

        
        ?>
    </div>
    </div>
    
</body>



