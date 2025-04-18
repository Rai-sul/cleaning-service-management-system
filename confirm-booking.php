<?php include('partial-front/header.php') ?>
<?php 
    // Get the value $id from imput hidden type
    if(isset($_POST['submit'])){
        $id=$_POST['ID'];
    }

    $sql="SELECT * FROM service WHERE Id=$id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if ($count==1){
        while($rows=mysqli_fetch_assoc($res)){
        $ID = $rows['Id'];
        $service_title = $rows['Title'];
        $price = $rows['Price'];
        $price_des = $rows['Price_des'];
        $discription = $rows['Description'];
        $image_name = $rows['Image_Name'];
        }
    }
           
    if(isset($_POST['submit'])){
        $appoinment=$_POST['appointment'];
        $appoinment_dat = date("y-m-d h:i:sa");
        $measure=$_POST['measure'];
        $full_name=$_POST['full_name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $Price= $price * $measure;
    }


?>

<section class="container">
    <h1 class="text-center">Confirm Your Booking</h1>

    <form action="add-appointment.php" method="POST" class="form-style">
     
        <table class="tbl-full">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <input type="hidden" name="service_title" value="<?php echo $service_title; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <input type="hidden" name="price_des" value="<?php echo $price_des; ?>">
            <input type="hidden" name="appointment" value="<?php echo $appoinment; ?>">
            <input type="hidden" name="measure" value="<?php echo $measure; ?>">
            <input type="hidden" name="full_name" value="<?php echo $full_name; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="appoinment_dat" value="<?php echo $appoinment_dat; ?>">
            <input type="hidden" name="Price" value="<?php echo $Price; ?>">  

            <tr>
                <td>Service Title: </td>
                <td><?php echo $service_title; ?></td>
            </tr>


            <tr>
                <td>Appointment Date: </td>
                <td><?php echo $appoinment_dat; ?></td>
            </tr>

            <tr>
                <td>Total Bill: </td>
                <td><?php echo $Price; ?></td>

            </tr>

            <tr>
                Customer Details
            </tr>

            <tr>
                <td>Name: </td>
                <td><?php echo $full_name; ?></td>
            </tr>

            <tr>
                <td>Phone no:</td>
                <td><?php echo $phone; ?></td>
            </tr>

            <tr>
                <td>Email: </td>
                <td><?php echo $email; ?></td>
            </tr>

            <tr>
                <td>Address: </td>
            </tr>
            
            <tr>
                    <td colspan="2">

                    <input type="submit" name="confirm" value="CONFIRM" class="btn btn-outline">
                    <input type="submit" name="delete" value="DELETE" class="btn btn-outline">
                </td>
                
            </tr>
        </table>
    </form>

</section>


<?php include('partial-front/footer.php') ?>