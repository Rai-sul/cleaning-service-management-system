<?php include('config/constant.php');  ?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    echo $id;

?>

<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
</html>

<body class="loginBody">
    <div class="login-container">
        <h1>Login</h1>
        <br><br>
        <form action="" method="POST">
            <table>
                <tr>
                        <td>Full Name</td>
                        <td><input type="text" name="name" placeholder="Enter Full Name"></td>
                    </tr>
                <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Enter Username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter Password"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" placeholder="Enter Username"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" placeholder="Enter Username"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone" placeholder="Enter Username"></td>
                    </tr>

                    <tr>

                        <td colspan="2">
                            <input type="submit" name="signup" value="Signup" class="btn-primary">
                            </td>
                    </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['signup'])){
                $ID= $_POST['id'];
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
                    // header('location:'.SITEURL.'user_info.php?Uid='.$ID);
                    header('location:'.SITEURL.'services.php');
            }
        }

           
        ?>
    </div>
</body>