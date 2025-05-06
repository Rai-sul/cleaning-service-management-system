<?php include('partial-front/header.php'); ?>
    <!-- Hero Section -->
    <section class="hero">
      <div class="container">
        <h1>Professional Cleaning Services at Your Fingertips</h1>
        <p>
          Book expert cleaners for your home or office. Satisfaction guaranteed.
        </p>
        <a href="services.php" class="btn btn-primary">Get Started</a>
      </div>
          <!-- Search Section Starts-->
    <br><br><br>
    <div class="container">
      <div class="search-container">
        <form action="search-service.php" method="POST" class="search-bar">
          <input type="text" name="search_inp" class="search-input" placeholder="What cleaning service do you need?" />
          <button name="submit" class="search-btn">
            <i class="fas fa-search"></i> Search
          </button>
        </form>
      </div>
    </div>
    <!-- Search Section Ends-->

    </section>


















    <!-- Service Categories Section Starts Here -->
    <section class="container">
      <div class="section-title">
        <h2>Top Cleaning Service Categories</h2>
        <p>Choose from our wide range of professional cleaning services</p>
      </div>

      <div class="categories">
        <?php 
          $sql = "SELECT * FROM category WHERE Active = 'Yes' LIMIT 4";
          $res=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($res);
          if ($count>0){
            while($rows=mysqli_fetch_assoc($res)){
              $ID = $rows['Id'];
              $title = $rows['Title'];
              $image_name = $rows['Image_Name'];
              ?>
              <div class="category-card">
              <div class="box-4 float-container"> 
                <!-- box-4 for image & float-container for position  -->
                <?php  
                  if($image_name != ""){
                    ?>
                    <img src="images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?> Cleaning" class="category-img">
                  <?php 
                  } else{
                    echo "No image";
    
                  }    
                ?>
              </div>
              <div class="category-content">
                <h3><?php echo $title; ?> Cleaning</h3>
                <p>Complete cleaning solutions for your <?php echo $title; ?></p>
                <a href="category-services.php?category_title=<?php echo $title; ?>" class="btn btn-outline">View Services</a>
              </div>
              <div class="clearfix"></div>
          </div>
          <?php
            }
          }
        ?>
      </div>
    </section>

    <!-- Service Categories Section Ends Here -->






















    <!-- Top Services Section Starts-->

    <?php

    ?>
    <section class="container">
      <div class="section-title">
        <h2>Top Cleaning Services</h2>
        <p>Our most popular and highly rated cleaning services</p>
      </div>
      <?php

          $sql="SELECT * FROM service WHERE Active = 'Yes' order by Price LIMIT 4";
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
                      <div class="service-price">TK. <?php echo $price; ?><span> <?php echo  $price_des; ?></span></div>
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
                    <a href="user_info.php?id=<?php echo $ID; ?>" class="btn btn-primary">Book Now</a>
                  </div>
                </div>   
                <?php          
            }
          }
      ?>

        </div>
    </section>

    <!-- Top Services Section Ends-->

    <?php include('partial-front/footer.php') ?>

