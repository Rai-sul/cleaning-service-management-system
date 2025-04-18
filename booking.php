<?php include('partial-front/header.php') ?>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM service WHERE Id=$id";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if ($count==1){
            while($rows=mysqli_fetch_assoc($res)){
            $ID = $rows['Id'];
            $service_title = $rows['Title'];
            $price = $rows['Price'];
            $price_des = $rows['Price_des'];
            $discription = $rows['Description'];
            $image_name = $rows['Image_Name'];
            }
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
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
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
                            <td><input type="text" name="full_name" placeholder="Enter Your Full Name" class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Phone Number</b></td>
                            <td><input type="tel" name="phone" placeholder="E.g. 018xxxxxxx" class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><input type="email" name="email" placeholder="Enter Your Phone Number" class="input-responsive" required></td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><textarea name="address" row="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea></td>
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