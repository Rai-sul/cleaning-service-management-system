<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Manage Appoinment</h1>
        <table class="tbl-full">
        <tr>
            <th>ID</th>
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
                $sql = "SELECT * FROM appointment";
                $res = mysqli_query($conn, $sql); 
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $service_title = $rows['service'];
                        $price = $rows['price'];
                        $price_des = $rows['price_des'];
                        $measure = $rows['measure'];
                        $total = $rows['total'];
                        $appoinment_on = $rows['appointment_on'];
                        $appoinment_made = $rows['appointment_made'];
                        $customer_name = $rows['customer_name'];
                        $customer_contact = $rows['customer_contact'];
                        $customer_email = $rows['customer_email'];
                        $customer_address = $rows['customer_address'];
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
                                <a href="update-appoinment.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
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