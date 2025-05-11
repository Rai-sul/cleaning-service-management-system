<?php include('partial/menu.php'); ?>
<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php
  if (isset($_SESSION['Appoint-delete'])) {
      echo "<div class='error-message'>" . $_SESSION['Appoint-delete'] . "</div>";
      unset($_SESSION['Appoint-delete']);
  }
?>


<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Manage Appointment</h1>
        <table class="tbl-full">
        <tr>
            <th>Service ID</th>
            <th>Service-Title</th>
            <th>Price</th>
            <th>Measure</th>
            <th>Total</th>
            <th>Appoinment On</th>
            <th>Appoinment Made</th>
            <th>Customer Name</th>
            <th>Customer Contact</th>
            <th>Customer Email</th>
            <th>Customer Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

            <?php 
                $sql="SELECT s.Id, s.Title, s.price, s.price_des, a.measure, a.total, a.appointment_on, a.appointment_made, a.status, u.id, u.full_name, u.phone, u.email, u.address FROM service s INNER JOIN appointment a ON a.s_id = s.Id inner join user u ON u.id = a.u_id";
                $res = mysqli_query($conn, $sql); 
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['Id'];
                        $uid = $rows['id'];
                        echo 'user id', $uid;
                        
                        $service_title = $rows['Title'];
                        $price = $rows['price'];
                        $price_des = $rows['price_des'];
                        $measure = $rows['measure'];
                        $total = $rows['total'];
                        $appoinment_on = $rows['appointment_on'];
                        $appoinment_made = $rows['appointment_made'];
                        $customer_name =  $rows['full_name'];
                        $customer_contact = $rows['phone'];
                        $customer_email = $rows['email'];
                        $customer_address = $rows['address'];
                        $status = $rows['status'];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $service_title; ?></td>
                            <td>Tk.<?php echo $price ?> (<?php echo $price_des ?>)</td>
                            <td><?php echo $measure; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $appoinment_on; ?></td>
                            <td><?php echo $appoinment_made; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td><?php echo $status; ?></td>
                            <td>
                                <!-- <a href="update-appointment.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a> -->
                                <a href="update-appointment.php?id=<?php echo $id; ?>&u_id=<?php echo $uid; ?>" class="btn-secondary">Update</a>

                                <!-- <a href="delete-appointment.php?id=<?php echo $id; ?>" class="btn-secondary">Delete</a> -->

                            </td>
                        </tr>

                        <?php
                            // $sql3 = "INSERT INTO top_ser (service_id, count)
                            //     SELECT s_id, COUNT(*) AS count
                            //     FROM appointment
                            //     GROUP BY s_id
                            //     ON DUPLICATE KEY UPDATE count = VALUES(count)";


                            // $res3 = mysqli_query($conn, $sql3);
                            $sql3 = "INSERT INTO top_ser (service_id, count)
                                    SELECT s.id, COUNT(a.s_id) AS count
                                    FROM service s
                                    LEFT JOIN appointment a ON s.id = a.s_id
                                    GROUP BY s.id
                                    ON DUPLICATE KEY UPDATE count = VALUES(count)"; 
                            $res3 = mysqli_query($conn, $sql3);


                    }
                }
            ?>
        </table>
    </div>
</div>

<?php include('partial/footer.php') ?>


<!-- WHERE a.s_id = '$id' AND a.u_id = '$uid' -->