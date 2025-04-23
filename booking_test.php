<?php include('partial-front/header.php'); ?>
<?php 
    // Get the value $id from imput hidden type
    // $id=$_POST['id'];
    $id = $_POST['ID'];
    if($id == "") {
        die("ID not provided.");
    }else{
        echo $id;
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

    <form action="" method="POST" class="form-style">
        <table class="tbl-full">

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
                <td><?php echo $address; ?></td>
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

<?php
    if(isset($_POST['confirm'])){
        $sql2="INSERT INTO appointment SET
        service = '$service_title',
        price = '$price',
        price_des = '$price_des',
        appointment_on = '$appoinment',
        measure = '$measure',
        total = '$Price',
        appointment_made = '$appoinment_dat',
        status = 'Appoint',
        customer_name = '$full_name',
        customer_contact = '$phone',
        customer_email = '$email',
        customer_address = '$address'
        ";
    
        $res2 = mysqli_query($conn,$sql2);
    }
    if(isset($_POST['delete'])){
        header('location: services.php');
    }
    
?>
<?php include('partial-front/footer.php') ?>