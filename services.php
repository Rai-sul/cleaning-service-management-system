<?php include('partial-front/header.php') ?>

<section class="container">
      <div class="section-title">
        <h2>Book Cleaning Services</h2>
        <p>Make an appointment to our most popular and highly rated cleaning services</p>
      </div>
      <?php

          $sql="SELECT * FROM service WHERE Active = 'Yes'";
          $res=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($res);
          if ($count>0){
            ?>
            <div class="services">
            <?php
            while($rows=mysqli_fetch_assoc($res)){
              $ID = $rows['Id'];
              $service_title = $rows['Title'];
              $price = $rows['Price'];
              $price_des = $rows['Price_des'];
              $discription = $rows['Description'];
              $image_name = $rows['Image_Name'];
              ?>
              
                <div class="service-card">
                  <img src="images/services/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" class="service-img" />
                  <div class="service-content">
                    <h3>Regular <?php echo $service_title; ?> Cleaning</h3>
                    <div class="service-meta">
                      <div class="service-price">TK. <?php echo $price; ?><span><?php echo $price_des; ?></span></div>
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
                      Complete home cleaning including dusting, vacuuming, mopping, and
                      sanitizing all surfaces.
                    </p>
                    <a href="booking.php?id=<?php echo $ID; ?>" class="btn btn-primary">Book Now</a>
                  </div>
                </div>   
                <?php          
            }
          }
      ?>

        </div>
    </section>

<?php include('partial-front/footer.php') ?>