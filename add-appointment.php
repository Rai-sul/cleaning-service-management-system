<?php include('partial-front/header.php'); ?>
<?php
    if(isset($_POST['submit'])){
        $id=$_POST['SID'];
        $uid=$_POST['UID'];
        echo 'Uid', $uid;
        echo 'id', $id;
    }



    if(isset($_POST['confirm'])){
        $id = $_POST['SID'];
        $uid = $_POST['UID'];


        $appoinment = $_POST['appointment'];
        $measure = $_POST['measure'];
        $appoinment_dat = $_POST['appoinment_dat'];
        $Price = $_POST['Price'];

   
        $_SESSION['booked-service'] = "Service booked successfully!";

        $sql2="INSERT INTO appointment SET
        appointment_on = '$appoinment',
        measure = '$measure',
        total = '$Price',
        appointment_made = '$appoinment_dat',
        status = 'Appoint',
        s_id = '$id',
        u_id = '$uid'
        ";
    
        $res2 = mysqli_query($conn,$sql2);
        header('location: index.php');
    }
    if(isset($_POST['delete'])){
        header('location: index.php');
    }
    
?>
<?php include('partial-front/footer.php') ?>