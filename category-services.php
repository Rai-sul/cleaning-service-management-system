<?php include('partial-front/header.php'); ?>

<?php
if (isset($_GET['category_title'])) {
    $title = $_GET['category_title'];
    ?>
    <section class="container">
        <div class="section-title">
            <h2>Top Cleaning Services</h2>
            <p>Our most popular and highly rated cleaning services</p>
        </div>

        <?php
        $sql = "SELECT * FROM service WHERE Category_Title='$title'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            ?>
            <div class="services">
                <?php
                while ($rows = mysqli_fetch_assoc($res)) {
                    $ID = $rows['Id'];
                    $service_title = $rows['Title'];
                    $price = $rows['Price'];
                    $price_des = $rows['Price_des'];
                    $discription = $rows['Description'];
                    $image_name = $rows['Image_Name'];
                    ?>
                    <div class="service-card">
                        <img src="images/services/<?php echo $image_name; ?>" alt="<?php echo $service_title; ?> Cleaning" class="service-img" />
                        <div class="service-content">
                            <h3>Regular <?php echo $service_title; ?> Cleaning</h3>
                            <div class="service-meta">
                                <div class="service-price">
                                    <?php echo $price; ?><span><?php echo  " ",$price_des; ?></span>
                                </div>
                                <div class="service-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <p class="service-desc">
                                Complete home cleaning including dusting, vacuuming, mopping, and sanitizing all surfaces.
                            </p>
                            <a href="user_info.php?id=<?php echo $ID; ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else{
            echo "No Service Available Right Now";
        }
        ?>
    </section>
    <?php
} else {
    
    header('location:' . SITEURL . 'index.php');

}
?>

<?php include('partial-front/footer.php'); ?>
