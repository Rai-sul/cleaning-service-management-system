<?php include('partial/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Services</h1>
        <br><br>
        <a href="add-services.php" class="btn-primary">Add Services</a>
        <br /><br /><br />

        <table class="tbl-full">   
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>price</th>
                <th>Price Description</th>
                <th>Image</th>
                <th>Category Title</th>
                <th>Active Status</th>
                <th>Actions</th>
            </tr> 
            <?php 
                $sql="SELECT * FROM service";
                $res=mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['Id'];
                        $title=$rows['Title'];
                        $description=$rows['Description'];
                        $price=$rows['Price'];
                        $price_description=$rows['Price_des'];
                        $image_name=$rows['Image_Name'];
                        $category_title=$rows['Category_Title'];
                        $active_status=$rows['Active'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $price_description; ?></td>
                                <td><img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" width="100px" ></td>
                                <td><?php echo $category_title; ?></td>
                                <td><?php echo $active_status; ?></td>
                                <td>
                                    <a href="update-services.php?id=<?php echo $id; ?>" class="btn-secondary">Edit</a>
                                    <a href="delete-service.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete  </a>
                                </td>
                            </tr> 
                        <?php
                    }
                }
            
            ?>  
        </table>
    </div>
</div>

<?php include('partial/footer.php') ?>