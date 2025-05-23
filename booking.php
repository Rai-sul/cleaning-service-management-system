<?php include('partial-front/header.php'); ?>

<?php
  

    if (isset($_SESSION['user_id']) || isset($_SESSION['service_id'])) {
        $Uid = $_SESSION['user_id']; // Retrieve user ID
        $id = $_SESSION['service_id']; // Retrieve service ID

        // echo "User ID: " . $Uid . "<br>";
        // echo "Service ID: " . $id . "<br>";
    } else {
        echo "Session variables are not set.";
    }

    $sql1="UPDATE user SET s_id = '$id' WHERE id = '$Uid'";
    $res1=mysqli_query($conn,$sql1);

    $sql="SELECT s.Title, s.Price, s.Price_des, s.Image_Name, s.Category_Title, 
    s.Active, u.full_name,u.username, u.email,u.phone, u.address 
    FROM service s INNER JOIN user u ON u.s_id = '$id' WHERE u.id = '$Uid' AND s.Id = '$id'";

    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    // echo 'count', $count;
    if ($count==1){
        while($rows=mysqli_fetch_assoc($res)){
        
        
        $service_title = $rows['Title'];
        // echo 'serviceee',$service_title;
        $price = $rows['Price'];
        $price_des = $rows['Price_des'];
        $image_name = $rows['Image_Name'];

        // for user
        $uname = $rows['full_name'];
        $email = $rows['email'];
        $phone = $rows['phone'];
        $address = $rows['address'];
        }
    }

        
    

?>

<section class="container">
    <h1 class="text-center">Fill the Form For Booking an Appoinment</h1>
    <form action="confirm-booking.php" method="post" class="form-style" enctype="multipart/form-data">
        <div>
            <legend><h1 class="text-center">Selected Service</h1></legend>
           
            <h1 class="text-center"><?php echo $service_title; ?></h1>
            <br>
            <!-- <?php echo 'hidden id',$id ?>  -->
            <!-- service id -->
            
            <input type="hidden" name="ID" value="<?php echo $id; ?>">
            <!-- user id -->
            <input type="hidden" name="UID" value="<?php echo $Uid; ?>">
            <table class="tbl-full">  
                        
                        <div class="top-service-img">
                            <?php 
                                if ($image_name!=""){
                                    ?>
                                    <img src="images/services/<?php echo $image_name?>"  alt="<?php echo $image_name ?>" class="img-responsive img-curve">
                                    <br><br>
                                    <?php
                                } 
                                else{
                                    $image_name="";
                                } 
                            ?>
                        </div>
                   
                        <tr>
                            <td><b>Date And Time</b></td>
                            <td><input type="datetime-local" name="appointment" class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Measures</b></td>
                            <td><p class="service-price">Tk.<?php echo $price;?> (<?php echo $price_des;?>)</p><input type="number" name="measure" min="0" placeholder="Your(sq.ft.)/laundry/Car Numbers" required></td>
                        </tr>
                        
                        <tr>
                            <td><b>Full Name</b></td>
                            <td><input type="text" name="full_name" value=<?php echo $uname; ?> class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Phone Number</b></td>
                            <td><input type="tel" name="phone" value=<?php echo $phone; ?> class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><input type="email" name="email" value=<?php echo $email; ?> class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td>
                                <textarea name="address" class="input-responsive" required><?php echo $address; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                
                                <input type="submit" name="submit" class="btn btn-outline">
                                
                            </td>
                        </tr>
            </table>
        </div>
    </form>


</section>





<?php include('partial-front/footer.php') ?>