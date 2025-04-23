<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <br><br>
        <h1>Manage Category</h1>
        <br><br>
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br /><br /><br />
        <table class="tbl-full styled-table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image Name</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

        <?php 

            $sql="SELECT * FROM category";
            $res=mysqli_query($conn, $sql); 
            $count=mysqli_num_rows($res);
       
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id=$rows['Id'];
                    $title=$rows['Title'];
                    $image_name=$rows['Image_Name'];
                    $active=$rows['Active'];
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" ></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                            <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
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