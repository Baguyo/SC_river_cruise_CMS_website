<?php require_once "includes/header.php" ?>

        <?php  require_once "includes/navigation.php" ?>

        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <div class="custom-wrapper" id="custom_reservation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        
                    </div>
                    <div class="col-lg-7">
                        <form method="post" action="" class="formTest" id="customReservationForm">
                            <h3 class="titleTest">We are looking forward to accomodate your plans</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="my-input">Name:</label>
                                        <input id="customName" class="form-control input" type="text" name="name" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="my-input">Email</label>
                                        <input id="customEmail" class="form-control input" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="my-input">Contact number:</label>
                                        <input id="custom_contact_number" class="form-control input" type="number" name="contact_number" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="my-input">Number of guest:</label>
                                        <input id="custom_number_of_guest" class="form-control input" type="number" name="number_of_guest" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="my-input">Date of arrival:</label>
                                        <input id="custom_date_of_arrival" class="form-control input" type="date" name="date_of_arrival" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="my-textarea">Plans for custom reservation:</label>
                                        <textarea id="custom_type_of_service" class="form-control input" name="type_of_service" rows="3"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary" id="">Submit reservation</button>
                        </form>
                    </div>
                </div>
            </div>
    
        </div>

        
        

        <?php require_once "includes/footer.php" ?>
        <script>
            $(document).ready(function () {
                $("#customReservationForm").submit(function (e) { 
                    e.preventDefault();

                    var div_box = "<div id='background_loader'> <div id='loader'> </div>  </div>";

                    let service_form = new FormData();

                    var name = $("input[name='name']");
                    var email = $("input[name='email']");
                    var contact_number = $("input[name='contact_number']");
                    var number_of_guest = $("input[name='number_of_guest']");
                    var date_of_arrival = $("input[name='date_of_arrival']");
                    var service = $("select[name='type_of_service']").val();

                    

                    if(isValid(name) && isValidEmail(email) && isValid(contact_number) && isValid(number_of_guest)  && isValid(date_of_arrival)){
                    service_form.append("name", name.val());
                    service_form.append("email", email.val());
                    service_form.append("contact_number", contact_number.val());
                    service_form.append("number_of_guest", number_of_guest.val());
                    service_form.append("date_of_arrival", date_of_arrival.val());
                    service_form.append("type_of_service", service);

                    $.ajax({
                        type: "POST",
                        url: "mail.php",
                        dataType: 'script',
                        contentType : false,
                        processData: false,
                        data: service_form,
                        beforeSend: function(){
                        // $('.loader').attr('src', "images/loader.gif");
                        // $('.loader').attr('height', "50px");
                        // $('.loader').attr('width', "20%");
                        // $("button[type='submit']").attr('disabled', 'disabled');
                        $("body").append(div_box);

                        },  
                        success: function (response) {
                            
                            if(response == "success"){
                            // name.val("");
                            // email.val("");
                            // contact_number.val("");
                            // number_of_guest.val("");
                            $("#background_loader").remove();
                            // date_of_arrival.val("");
                            // $("button[type='submit']").removeAttr('disabled');
                            
                            // $('.loader').removeAttr('src');
                            // $('.loader').removeAttr('height');
                            // $('.loader').removeAttr('width');
                            window.location.href = "success.html";
                            }else{
                            $("#background_loader").remove();
                            
                            alert("PLease try again");
                            }
                            // name.val("");
                            // email.val("");
                            // contact_number.val("");
                            // number_of_guest.val("");
                            // date_of_arrival.val("");
                            // $("button[type='submit']").removeAttr('disabled');
                            
                            // $('.loader').removeAttr('src');
                            // $('.loader').removeAttr('height');
                            // $('.loader').removeAttr('width');
                            // window.location.href = "success.html";
                        
                        }
                    });
                    }
                    
                    
                });

        
    });
        </script>