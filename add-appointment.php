<?php include('partial-front/header.php') ?>
<?php

    if(isset($_POST['confirm'])){
        $service_title = $_POST['service_title'];
        $price = $_POST['price'];
        $price_des = $_POST['price_des'];
        $appoinment = $_POST['appointment'];
        $measure = $_POST['measure'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $appoinment_dat = $_POST['appoinment_dat'];
        $Price = $_POST['Price'];


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
        header('location: index.php');
    }
    if(isset($_POST['delete'])){
        header('location: index.php');
    }

    if(isset($_POST['DELETE'])){
        // header('location: booking.php?id='.$_POST['ID']);
        header('location: category.php');
    }
    
?>
<?php include('partial-front/footer.php') ?>