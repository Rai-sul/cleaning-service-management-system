<?php include('partial/menu.php') ?>
<div class="main-content">
    <div class="wrapper">

        <h1>DASHBOARD</h1>
        <br><br>

        <div class="col-4 text-center">

            <?php 
            $sql = "SELECT * FROM category";
            $res=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">

            <?php
            $sql2 = "SELECT * FROM service";
            $res2=mysqli_query($conn, $sql2);
            $count2=mysqli_num_rows($res2);

            ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            Services
        </div>


        <div class="col-4 text-center">
            <?php
            $sql3 = "SELECT * FROM appointment";
            $res3=mysqli_query($conn, $sql3);
            $count3=mysqli_num_rows($res3);

            ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            Appoinments
        </div>


        <div class="col-4 text-center">

            <?php
            $sql4 = "SELECT SUM(total) AS Total FROM appointment WHERE status='Paid'";
            $res4=mysqli_query($conn, $sql4);
            $count4=mysqli_num_rows($res4);

            ?>
            <h1><?php echo $count4; ?></h1>
            <br />
            Reenue  Generated
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<?php include('partial/footer.php') ?>