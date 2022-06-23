
<?php require_once "includes/header.php" ?>

<?php
    if(!isset($_GET['id']) || empty($_GET['id'])){
        die();
    }else{
        $to_mail_id = sanitize_input($_GET['id']);
        $get_info_stmt = $connection->prepare("SELECT `name`, email, guest_number, date_of_arrival, type_of_service FROM admin_reservation WHERE id = ?");
        $get_info_stmt->bind_param("i", $to_mail_id);
        $get_info_stmt->bind_result($name, $email, $num_guest, $date_of_arrival, $type_of_service);
        $get_info_stmt->execute();
        $get_info_stmt->fetch();
        
    }
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
                                    <h1 class="text-center">SC BOOKING MAIL </h1>
                                </div>
                                <div class="card-body bg-light">
                                    
                                
                                   <form action="" method="POST" id="booking_mail">
                                       <div class="form-group">
                                           
                                           <label for="my-textarea">Messaage:</label>
                                           <textarea id="mail_message" class="form-control" name="" rows="20">Thank you for advance booking in San Carlos river cruise. We would like to confirm some necessary information
Name: <?= $name?>

Number of pax: <?= $num_guest ?>

Date of arrival: <?= $date_of_arrival ?>

Type of Service: <?= $type_of_service ?>


Before we confirm your reservation we strictly implement a 50% initial payment.
Total payment:
50%:

Gcash Name: 
Gcash Number:
 My Gcash link: 
</textarea>
                                       </div>
                                       <input type="submit" name="submit" value="Send mail" class="btn btn-primary">
                                   </form>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>




<?php  require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {
        $("#booking_mail").submit(function (e) { 
            e.preventDefault();
            toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "30000000000",
  "hideDuration": "0",
  "timeOut": "0",
  "extendedTimeOut": "0",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
            
            var client_email = "<?= $email; ?>";
            var mail_message = $("#mail_message");
            var id = <?= $to_mail_id ?>

            var formData = new FormData();

            formData.append("message", mail_message.val());
            formData.append("email", client_email);
            formData.append("id", id );
            
            $.ajax({
                type: "POST",
                url: "../mail_old.php",
                dataType: 'script',
                contentType : false,
                processData: false,
                data: formData, 
                beforeSend: function(){
                    $("input[type='submit']").attr("disabled", "disabled");
                    
                },  
                success: function (response) {
                    $("input[type='submit']").removeAttr("disabled");
                    if(response == "success"){

                        
                        toastr.success("Mail to " + client_email + " successfully sent.");
                        
                    }else{
                        toastr.warning("Mail to " + client_email + " error try again.");
                    }
                }
            });
            
        });

        
    });
</script>