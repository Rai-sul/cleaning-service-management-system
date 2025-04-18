<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Service</h1>
        <br><br>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $sql="SELECT * FROM service WHERE Id=$id";
                $res=mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['Title'];
                    $description=$row['Description'];
                    $price=$row['Price'];
                    $price_description=$row['Price_des'];
                    $image_name=$row['Image_Name'];
                    $current_image=$image_name;
                    $category_title=$row['Category_Title'];
                    $active_status=$row['Active'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-services.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-services.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" name="description" value="<?php echo $description; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Price Description</td>
                    <td>
                        <input type="text" name="price_description" value="<?php echo $price_description; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td><img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" width="150px"></td>
                </tr>
                <tr>
                    <td>Select New Image</td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Category Title</td>
                    <td> 
                        <input type="text" name="category_title" value="<?php echo $category_title; ?>">
                    </td> 
                </tr>

                <tr>
                    <td>Active Status</td>
                    <td> 
                        <input <?php if($active_status=="Yes"){echo "checked";} ?> type="radio" name="active_status" value="Yes"> Yes
                        <input <?php if($active_status=="No"){echo "checked";} ?> type="radio" name="active_status" value="No"> No
                    </td> 
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Service" class="btn-primary">
                        <input type="submit" name="cancle" value="Delete Service" class="btn-danger">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $price_description = $_POST['price_description'];
        $category_title = $_POST['category_title'];
        $active_status = $_POST['active_status'];

        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
        {
            $image_name=$_FILES['image']['name'];
            $ext=end(explode('.',$image_name));
            $image_name="Service__".rand(000,999).'.'.$ext;
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/services/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);

            // Accessing the path to delete the image
            $path = "../images/services/" . $current_image;

            // Remove the Image
            $remove = unlink($path);
            }
        else
        {
            $image_name=$current_image;
        }

        $sql2="UPDATE service SET 
            Title='$title',
            Description='$description',
            Price='$price',
            Price_des='$price_description',
            Image_Name='$image_name',
            Active='$active_status',
            Category_Title='$category_title '
            WHERE Id=$id
        ";

        $res2=mysqli_query($conn, $sql2);
        if($res2==true)
        {
            $_SESSION['update']="<div class='success'>Service updated successfully</div>";
            header('location:'.SITEURL.'admin/manage-services.php');
        }
        else
        {
            $_SESSION['update']="<div class='error'>Failed to update service</div>";
            header('location:'.SITEURL.'admin/manage-services.php');
        }
    }
    if(isset($_POST['cancle']))
    {
        header('location:'.SITEURL.'admin/manage-services.php');
    }

?>

<?php include('partial/footer.php') ?>