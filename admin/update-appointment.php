<?php include('partial/menu.php'); ?>

<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT status FROM appointment WHERE s_id=$id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        echo $count;

        if ($count == 1) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $status = $rows['status'];
            }
        }
    }
 ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Update Appointment Status</h1>
        <table class="tbl-full">
            <form action="" method="POST" class="form-style">
                <tr>
                    <td>
                        <h1>Current Status</h1>
                    </td>
                    <td>
                        <input type="text" name="status" value="<?php echo $status; ?>"readonly><br><br>

                    </td>
                </tr> 
                    <td>
                        <h1>Update Status</h1>
                    </td>
                 
                    <td>
                        <select name="dropdown">
                            <option value="">--- Select ---</option>
                            <option value="Appoint">Appoint</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Complete</option>
                            <option value="Cancelled">Cancle</option>
                        </select>                       
                    </td>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="submit" class="btn-primary">
                        </td>
                        <td>
                            <input type="submit" name="cancle" value="Delete" class="btn-danger">
                        </td>                      
                    </tr>

            </form>
        </table>

    </div>
</div>

<?php 
    if (isset($_POST['submit'])) {
        echo "Submit button clicked";
        $selected = $_POST['dropdown'];
        echo $selected;
        if (!$selected == "") {
            $sql = "UPDATE appointment SET status='$selected' WHERE s_id=$id";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                header( 'location: manage-appoinment.php');
            }
        }
        else {
            echo "Failed to update status";
            header( 'location: manage-appoinment.php');
        }
    }

    if (isset($_POST['cancle'])) {
        header( 'location: manage-appoinment.php');
    }
?>

