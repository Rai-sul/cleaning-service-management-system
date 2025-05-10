<?php include('partial-front/header.php'); ?>

<section class="container">
    <div class="section-title">
        <h2>Admin Panel</h2>
        <br>

        <?php
        $sql = "SELECT * FROM admin";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            ?>
            <div class="services">
                <?php
                while ($rows = mysqli_fetch_assoc($res)) {
                    $ID = $rows['Id'];
                    $image_name = $rows['Image_Name'];
                    $full_name = $rows['Full_Name'];
                    $email = $rows['Email'];
                    ?>
                    <div class="service-card">
                        <div class="service-content">
                            <?php
                            if ($image_name != "") {
                                ?>
                                <img src="images/profile/<?php echo $image_name; ?>" class="contact-img">
                                <?php
                            } else {
                                echo "No image";
                            }
                            ?>
                            <div class="contact-info">
                                <br><?php echo $full_name; ?>
                                <p><h3>Admin of Cleaning Service</h3></p>
                                <?php echo $email; ?>


                            </div>

                

                                
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

    </div>
</section>
