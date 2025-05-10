<?php include('config/constant.php');  ?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id']; //service id
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
            <input type="text" name="name" placeholder="Enter Full Name" required>
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="text" name="email" placeholder="Enter Email" required>
            <input type="text" name="address" placeholder="Enter Address" required>
            <input type="text" name="phone" placeholder="Enter Phone" required>
            <input type="submit" name="signup" value="Signup" class="btn-primary">
        </form>

        <?php
            if (isset($_POST['signup'])){
                // $ID= $_POST['id'];
                // echo $ID;
                $full_name= $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $sql ="INSERT INTO user (full_name, username, password, email, address, phone,s_id) VALUES ('$full_name', '$username', '$password', '$email', '$address', '$phone','$id')";
                $res = mysqli_query($conn, $sql);
            
                if($res){
                    $_SESSION['user-signup'] = $username ; // Store username in session variable
                    // $_SESSION['service_id'] = $id;
                    header('location:' . SITEURL . 'user_info.php?id=' . $id);

                    // header('location:'.SITEURL.'services.php');
            }
        }

           
        ?>
    </div>
</body>