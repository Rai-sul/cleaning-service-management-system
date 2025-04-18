<?php include('partial-front/header.php'); ?>

<section class="container">
      <div class="section-title">
        <h2>Top Cleaning Service Categories</h2>
        <p>Choose from our wide range of professional cleaning services</p>
      </div>

      <div class="categories">
        <?php 
          $sql = "SELECT * FROM category WHERE Active = 'Yes'";
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
                    <!-- style="width: 100%; height: 200px; object-fit: cover; -->
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

<?php include('partial-front/footer.php'); ?>