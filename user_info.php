<?php include('config/constant.php');  ?>

<?php
    if(isset($_GET['id'])){
        $ser_id=$_GET['id'];
        // echo $ser_id; //service id
    }
    // if (isset($_SESSION['service_id'])) {
    //     $ser_id = $_SESSION['service_id']; // Retrieve service ID
    //     echo "Service ID: " . $ser_id . "<br>";
    // }
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
            <input type="submit" name="login" value="Login">
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="user-signup.php?id=<?php echo $ser_id; ?>" class="btn btn-primary">Sign Up Here</a></p>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);  
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res); 
        if ($count == 1) {
           
            $row = mysqli_fetch_assoc($res); 
            $ID = $row['id']; 
        } else {
            echo "<div style='color: red; margin-top: 10px;'>Invalid Username or Password</div>";
        }
    
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            

            $_SESSION['user'] = $username;
            $_SESSION['user_id'] = $ID; // Store user ID in session variable
            $_SESSION['service_id'] = $ser_id; // Store service ID in session variable
            header('location:' . SITEURL . 'booking.php');
            exit(); 
        } else {
            echo "<div style='color: red; margin-top: 10px;'>Invalid Username or Password</div>";
        }
    }
        
        ?>
    </div>
    </div>
    
</body>



