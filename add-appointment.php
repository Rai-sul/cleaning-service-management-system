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

        // $sql3 = "UPDATE appointment SET s_id = '$id', u_id = '$uid'";
        // $res3=mysqli_query($conn,$sql3);

        // $sql="SELECT * FROM service s INNER JOIN appointment a ON a.s_id = s.Id inner join user u ON u.id = a.u_id WHERE a.s_id = '$id' AND a.u_id = '$uid'";
        // $res=mysqli_query($conn,$sql);
        // $count=mysqli_num_rows($res);
        // echo 'count', $count;
        // if ($count==1){
        //     while($rows=mysqli_fetch_assoc($res)){
        //         $service_title = $rows['Title'];
        //         $price = $rows['Price'];
        //         $price_des = $rows['Price_des'];
        //     }
        // }


        $appoinment = $_POST['appointment'];
        $measure = $_POST['measure'];
        $appoinment_dat = $_POST['appoinment_dat'];
        $Price = $_POST['Price'];

   
        $_SESSION['booked-service'] = "Service booked successfully!";




      

        // $sql3 = "INSERT INTO top_ser (service_id, count)
        //     SELECT s_id, COUNT(*) AS count
        //     FROM appointment
        //     GROUP BY s_id
        //     ON DUPLICATE KEY UPDATE count = VALUES(count)";


        // $res3 = mysqli_query($conn, $sql2);



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

    // if(isset($_POST['DELETE'])){
    //     // header('location: booking.php?id='.$_POST['ID']);
    //     header('location: category.php');
    // }
    
?>
<?php include('partial-front/footer.php') ?>