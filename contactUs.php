<?php require_once "includes/header.php" ?>

        <?php require_once "includes/navigation.php" ?>
        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <div class="contact-wrapper" id="contact">
            <div class="contact-title">
                <div class="container">
                    <div class="services-caption">
                        <h1>Get in touch</h1>
                    <p class="text-center caption">For more inquiries. Send us a message and we'll assist you right away.  </p>
                    </div>
                </div>
            </div>
    
            <div class="contact-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            
    
                            <div class="contact-icons">
                                <div class="row">
                                    <a href="#" class="col-lg-12 col-md-6">
                                        <div>
                                            
                                            <span>   
                                            <?= isset($row_info['contact_number']) ? "<i class='fas fa-phone mr-2'></i> +".$row_info['contact_number']."   " :"" ?>
                
                                            </span>
                                        </div>
                                    </a>
                                    <a href="#" class="col-lg-12 col-md-6">
                                        <div>
                                            <span>
                                            <?= isset($row_info['email']) ? "<i class='fas fa-envelope mr-2'></i>". $row_info['email'] ."" :"" ?>
    
                                            </span>
                                        </div>
                                    </a>
                                    <a href="#footer" class="col-lg-12 col-md-6">
                                        <div>
                                            <i class="fab fa-facebook"></i>
                                            <span>
                                                Like us on facebook
                                            </span>
                                        </div>
                                    </a>
                                    <a href="services.html" class="col-lg-12 col-md-6">
                                        <div>
                                            <i class="fas fa-ship"></i>
                                            <span>
                                                Check our services
                                            </span>
                                        </div>
                                    </a>
                                    <a href="about.html#location" class="col-lg-12">
                                        <div>
                                            <i class="fas fa-compass"></i>
                                            <span>
                                                Our location
                                            </span>
                                        </div>
                                    </a>
    
                                </div>
                                
                            </div>
    

                        </div>
                        <div class="col-lg-6 form-container"> 
                            <form method="post" action="" class="contactForm">
                                <div class="form-group">
                                    <label for="my-input">Name</label>
                                    <input id="" class="form-control" type="text" name="contact_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Email</label>
                                    <input id="" class="form-control" type="email" name="contact_email">
                                </div>
                                <div class="form-group">
                                    <label for="my-textarea">Message</label>
                                    <textarea id="" class="form-control" name="contact_message" rows="3" cols="30"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" id="">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>

        
        

        <?php require_once "includes/footer.php" ?>
        <script>
            $(document).ready(function () {
                $(".contactForm").submit(function (e) { 
                    e.preventDefault();
                    

                    var div_box = "<div id='background_loader'> <div id='loader'> </div>  </div>";

                    let contact_form = new FormData();

                    var contact_name = $("input[name='contact_name']");
                    var contact_email = $("input[name='contact_email']");
                    var contact_message = $("textarea[name='contact_message']");

                    console.log(contact_name.val(), contact_email.val(), contact_message.value);
                    

                    

                    if( isValid(contact_name) && isValidEmail(contact_email) && isValid(contact_message) ){
                        contact_form.append("contact_name", contact_name.val());
                        contact_form.append("contact_email", contact_email.val());
                        contact_form.append("contact_message", contact_message.val());

                        $.ajax({
                            type: "POST",
                            url: "reservation.php",
                            dataType: 'script',
                            contentType : false,
                            processData: false,
                            data: contact_form,
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
                                $("#backgroud_loader").remove;
                                // date_of_arrival.val("");
                                // $("button[type='submit']").removeAttr('disabled');
                                
                                // $('.loader').removeAttr('src');
                                // $('.loader').removeAttr('height');
                                // $('.loader').removeAttr('width');
                                window.location.href = "inquire.html";
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