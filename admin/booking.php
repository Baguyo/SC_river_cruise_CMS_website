
<?php require_once "includes/header.php" ?>
<?php
    $get_all_booking = $connection->query("SELECT * FROM admin_reservation");

    //CHANGE BOOKING STATUS START HERE
    if(isset($_GET['sts']) && isset($_GET['id'])){
         $change_status_id = sanitize_input($_GET['id']);
         $change_status = sanitize_input($_GET['sts']);

        if($change_status == "Pending"){
            $change_status_stmt = $connection->prepare("UPDATE admin_reservation SET status = 'Success' WHERE id = ?");
        }elseif($change_status == "Success"){
            $change_status_stmt = $connection->prepare("UPDATE admin_reservation SET status = 'Pending' WHERE id = ?");
        }
        
        $change_status_stmt->bind_param("i", $change_status_id);
        $change_status_stmt->execute();
        $change_status_stmt->store_result();

        if($change_status_stmt->affected_rows == 1){
            header("Location: booking.php");
        }        
    }
    //CHANGE BOOKING STATUS END HERE


    //CHANGE BOOKING MAIL STATUS START HERE
    if(isset($_GET['mailsts']) && isset($_GET['id'])){

        $change_mail_status_id = $_GET['id'];
        $change_mail_status = $_GET['mailsts'];

        if($change_mail_status == "Yes"){
            $change_status_stmt = $connection->prepare("UPDATE admin_reservation SET Mailed = 'No' WHERE id = ?");
        }elseif($change_mail_status == "No"){
            $change_status_stmt = $connection->prepare("UPDATE admin_reservation SET Mailed = 'Yes' WHERE id = ?");
        }
        
        $change_status_stmt->bind_param("i", $change_mail_status_id);
        $change_status_stmt->execute();
        $change_status_stmt->store_result();

        if($change_status_stmt->affected_rows == 1){
            header("Location: booking.php");
        }        
        

    }
    //CHANGE BOOKING MAIL STATUS END HERE


  
?>

    
    <div class="wrapper">
        
        <?php require_once "includes/navigation.php" ?>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <div class="card">
                                <div class="card-header bg-warning text-white">
                                    <h1 class="text-center">SC BOOKING </h1>
                                </div>
                                <div class="card-body">
                                    
                                <div class="table-responsive-lg" style="font-size: 13px;">
                                    <table class="table table-bordered table-hover">
                                       <thead>
                                           <tr>
                                               <th>ID</th>
                                               <th>Name</th>
                                               <th>Email</th>
                                               <th>Contact Number</th>
                                               <th>Number of Guest</th>
                                               <th>Date of Arrival</th>
                                               <th>Type of Service</th>
                                               <th>Status</th>
                                               <th>Mailed Status</th>
                                               <th colspan="2" class="text-center">ACTION</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                           
                                                while($row = $get_all_booking->fetch_assoc()){
                                                     ($row['status'] == "Success") ? $status =  "<span class='text-success'> ". $row['status'] . "</span>" : $status =  "<span class='text-danger'> ". $row['status'] . "</span>" ; 
                                                     ($row['Mailed'] == "Yes") ? $mailed =  "<span class='text-success'> ". $row['Mailed'] . "</span>" : $mailed =  "<span class='text-danger'> ". $row['Mailed'] . "</span>" ; 
                                                    echo "<tr>";
                                                        echo "<td>". $row['id'] . "</td>";
                                                        echo "<td>". $row['name'] . "</td>";
                                                        echo "<td>". $row['email'] . "</td>";
                                                        echo "<td>". $row['contact_number'] . "</td>";
                                                        echo "<td>". $row['guest_number'] . "</td>";
                                                        echo "<td>". $row['date_of_arrival'] . "</td>";
                                                        echo "<td>". $row['type_of_service'] . "</td>";
                                                        echo "<td>". $status . " <div> <a href='booking.php?sts={$row['status']}&id={$row['id']}' class=''>Change</a> </div> </td>";
                                                        echo "<td> ". $mailed . " <div> <a href='booking.php?mailsts={$row['Mailed']}&id={$row['id']}' class=''>Change</a> </div> </td>";
                                                        echo "<td> <a href='#' dlt='$row[id]' class='btn btn-danger delete btn-sm'>DELETE</a> </td>";
                                                        echo "<td> <a href='booking_mail.php?id={$row['id']}' class='btn btn-success btn-sm'>MAIL</a> </td>";
                                                        
                                                    echo "</tr>";
                                                }

                                           ?>
                                       </tbody>
                                   </table>
                                </div>
                                   

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- DELETE WAITING CONFIRMATION -->
    <div class="modal fade delete_modal" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h3>Are you sure to delete ?</h3>
      </div>
      <div class="modal-footer">
        <form method="POST" action="">
            <input type="hidden" name="id_delete" value="" class="id_delete">
            <input type="submit" value="DELETE" class="btn btn-danger delete_link_button" name="dlt">
            <button type="button" class="btn btn-primary" data-dismiss="modal">CLOSE</button>    
        </form>
        
      </div>
    </div>
  </div>
</div>


<!-- SUCCESS DELETE -->
<div class="modal fade delete_success" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return location.reload(true)">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h3 class="text-center text-success">DELETED SUCCESSFULLY
            <i class="fas fa-check"></i>
        </h3>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




<?php  require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {
        // $(".delete_carousel").click(function(e){
        //     var id_to_delete = $(this).attr('rel');
        //     $('.carousel_id').attr("value", id_to_delete);
        //     $('.delete_carousel_modal').modal("show");
        // })

        $(".delete").click(function(e){
            e.preventDefault();
          var id_to_delete = $(this).attr('dlt');
          $('.id_delete').attr("value",id_to_delete);
            $('.delete_modal').modal("show");
        })

    });
</script>
<?php 
      if(isset($_POST['dlt'])){
        $reservation_delete_id = sanitize_input($_POST['id_delete']);
        $delete_reservation_stmt = $connection->prepare("DELETE FROM admin_reservation WHERE id = ?");
        $delete_reservation_stmt->bind_param("i", $reservation_delete_id);
        $delete_reservation_stmt->execute();
        $delete_reservation_stmt->store_result();

        if($delete_reservation_stmt->affected_rows == 1){
            echo "
            <script type='text/javascript'>;
            $(document).ready(function () {
                $('.delete_success').modal('show');
                setInterval(function(){
                    $('.delete_success').modal('hide');
                    location.reload(true);
                },4000)                    
            });
            </script>
            ";
        }
    }
?>