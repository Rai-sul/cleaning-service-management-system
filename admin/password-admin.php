<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <!-- Getting id from manage-admin.php file -->
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $query="SELECT * FROM admin WHERE Id='$id'";
                $res=mysqli_query($conn, $query);
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id=$rows['Id'];
                    $username=$rows['User_Name'];
                }
            }
        ?>

        <form action="" method="POST" class="form-style">
            <table class="tbl-full">
                <tr>
                    <td>Current Username:</td>
                    <td>
                        <input type="text" name="current_username" placeholder="Your Current Username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Your Current Password" class="input-field">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password" class="input-field">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="input-field">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
        
        $current_username=$_POST['current_username'];
        $current_password=$_POST['current_password'];
        $new_password=$_POST['new_password'];
        $confirm_password=$_POST['confirm_password'];

        $sql="SELECT * FROM admin WHERE User_Name='$current_username' AND Password='$current_password'";
        $res=mysqli_query($conn, $sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            if($new_password==$confirm_password)
            {
                $sql2="UPDATE admin SET
                Password='$new_password'
                WHERE User_Name='$current_username'  
                ";
                $res2=mysqli_query($conn, $sql2);
                if($res2==TRUE)
                {
                    $_SESSION['change-password']="<div class='success'>Password Changed Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    $_SESSION['change-password']="<div class='error'>Failed to Change Password.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['change-password']="<div class='error'>New Password and Confirm Password did not match.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else
        {
            $_SESSION['change-password']="<div class='error'>Current Username or Password did not match.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partial/footer.php') ?>