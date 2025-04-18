<?php include('partial/menu.php') ?>

<!--- Main Content Starts Here --->
<div class="main-content">
    <div class="wrapper">
        <br><br>
        <h1>Manage Admin</h1>
        <br><br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="tbl-full styled-table">
            <tr>
                <th>Sl no.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            <?php 
                $sql="SELECT * FROM admin";
                $res=mysqli_query($conn, $sql);
                if($res==True){
                    $count=mysqli_num_rows($res);
                    $sn=1;

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['Id'];
                            $full_name=$rows['Full_Name'];
                            $username=$rows['User_Name'];
                            $email=$rows['Email'];
                            $image_name=$rows['Image_Name'];      
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><img src="<?php echo SITEURL; ?>images/profile/<?php echo $image_name; ?>" width="100px" ></td>
                                <td>
                                <a href="password-admin.php?id=<?php echo $id; ?>" class="btn-primary">Password</a>
                                <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                <a href="delete-admin.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                                </td>       
                            </tr>
                            <?php       
                        }
                    }
                }
            ?>
        </table>
    </div>
</div>

<!--- Main Content Ends Here --->

<?php include('partial/footer.php') ?>