<?php include('partial/menu.php'); ?>

<html>
    <head>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
</html>

<?php
  if (isset($_SESSION['admin-login'])) {
      echo "<div class='success-message'>" . $_SESSION['admin-login'] . "</div>";
      unset($_SESSION['admin-login']);
  }
?>


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
            $sql4 = "SELECT SUM(total) FROM appointment WHERE status='Completed'";
            $res4=mysqli_query($conn, $sql4);
            $count=mysqli_num_rows($res4);
            while($rows=mysqli_fetch_assoc($res4)){
                $count4 = $rows['SUM(total)'];
            }

            ?>
            <h1><?php echo $count4; ?></h1>
            <br />
            Revenue  Generated
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<?php include('partial/footer.php') ?>