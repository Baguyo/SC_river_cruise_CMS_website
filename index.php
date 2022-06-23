<?php require_once "admin/includes/db.php" ?>
<?php require_once "admin/includes/function.php" ?>
<?php session_start() ?>
<?php ob_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bacungan River Cruise</title>
        <link rel = "icon" href="images/logo.png" type = "image/x-icon">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/regular.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" >

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/main.css">
        <style>
            <?php 
                $fetch_all_query = "SELECT * FROM home_page_intro";
                $stmt_select_carousel_intro = $connection->query($fetch_all_query);
                $all_data = array();
                while($row = $stmt_select_carousel_intro->fetch_assoc()){

                    $all_data[] = $row;
                    echo ".". str_replace(" ",'', $row['intro_heading']). "{
                        background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.2)), url(images/$row[intro_image]);
                        padding: 15% 0 20%;
                        background-attachment: fixed;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;   
                    }";
                }
                // $stmt_select_carousel_intro->close();
            ?>
            

            

        </style>
    </head>
    <body>
        
    <?php 

        $data_to_active = array_shift($all_data);        
        
    ?>

        <?php require_once "includes/navigation.php" ?>
        

        <!-- MESSAGE PLUGIN -->
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div>


        <!-- calendar datepicker start here -->
        <div class="date-picker-icon">
             <a href="" class="btn btn-primary date-picker-btn" title="View calendar reservation">
                <i class="fas fa-calendar-check fa-lg"></i>
             </a>   
         </div>

         <div class="date-picker-container">
             <div id="datepicker" class="bg-white">                 
                <h5>Calendar reservation</h5>
             </div>
         </div>
         <!-- calendar datepicker end here -->




        <div class="home-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="home-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">

                                <div class="carousel-item active  text-center <?= str_replace(" ",'', $data_to_active['intro_heading']) ?>">
                                    <h1>
                                        <?= $data_to_active['intro_heading'] ?>
                                    </h1>
                                    <p class="caption"> <?= $data_to_active['intro_sub_heading'] ?> </p>
                                    <div class="carousel-caption">
                                        <a href="<?= $data_to_active['intro_button_link'] ?>">
                                              <button class="btn text-white" style="background-color:<?=$data_to_active['intro_button_color']?>">
                                            <?= $data_to_active['intro_button_name'] ?>
                                            <span>
                                                <?= htmlspecialchars_decode($data_to_active['intro_button_icon']) ?>
                                                <!-- <i class="fas fa-dove"></i> -->
                                            </span>
                                        </button>
                                        </a>
                                        <?php 
                                            if(isset($_SESSION['login'])){
                                                if($_SESSION['login']){
                                                    echo "<a href='admin/home-page.php?section=intro&source=edit_caro&id=$data_to_active[id]' class='btn btn-info ml-2'> EDIT <i class='fas fa-pen'></i>  </a>";
                                                }
                                            }
                                            
                                        ?>
                                    </div>
                                </div>

                                <?php 

                                    for ($i=0 ; $i < count($all_data) ; $i++) {
                                        $id = $all_data[$i]['id'];
                                ?>
                                    <div class="carousel-item  text-center <?= str_replace(" ",'', $all_data[$i]['intro_heading']) ?>">
                                    <h1>
                                        <?= $all_data[$i]['intro_heading'] ?>
                                    </h1>
                                    <p class="caption"> <?= $all_data[$i]['intro_sub_heading'] ?> </p>
                                    <?php 
                                        if(!empty($all_data[$i]['intro_button_link']) && !empty($all_data[$i]['intro_button_color']) &&  !empty($all_data[$i]['intro_button_name'])){
                                    ?>
                                    <div class="carousel-caption">
                                        <a href="<?= $all_data[$i]['intro_button_link'] ?>">
                                              <button class="btn text-white" style="background-color:<?=$all_data[$i]['intro_button_color']?>">
                                            <?= $all_data[$i]['intro_button_name'] ?>
                                            <span>
                                                <?= htmlspecialchars_decode($all_data[$i]['intro_button_icon']) ?>
                                                
                                                <!-- <i class="fas fa-dove"></i> -->
                                            </span>
                                        </button>
                                        </a>
                                        </a>
                                        <?php 
                                        if(isset($_SESSION['login'])){
                                            if($_SESSION['login']){
                                                echo "<a href='admin/home-page.php?section=intro&source=edit_caro&id=$id' class='btn btn-info ml-2'> EDIT <i class='fas fa-pen'></i>  </a>";   
                                            }
                                        }
                                            
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>



                                        
                                <?php

                                    }

                                ?>
                            

                                <a href="#home-carousel" role="button" class="carousel-control-prev" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                  <a href="#home-carousel" role="button" class="carousel-control-next" data-slide="next">
                                      <span class="carousel-control-next-icon"></span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>                
                
                
                <!-- QUICK RESERVATION STARTS HERE -->
                <div class="reserve_form d-flex justify-content-center">
                    
                    <form class="form-inline"  action="" method="post" id="quickReservation">

                        <div class="input-group col-lg-3 col-md-6 col-sm-12">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input" placeholder="Full name" name="name" id="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                          </div>

                        <div class="input-group col-lg-3 col-md-6 col-sm-12">
                          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                          <input type="email" class="form-control input" placeholder="example@email.com" id="email" required name="email">
                        </div>

                        <div class="input-group col-lg-3 col-md-6 col-sm-12">
                          <!-- <label>
                              <i class="fa fa-phone"></i>
                          </label> -->
                          <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                          <input type="number" class="form-control input contact_number" placeholder="Contact number" id="contact_number" required name="contact_number">
                          
                        </div>
                        
                        <div class="input-group col-lg-3 col-md-6 col-sm-12">
                            <!-- <label>
                                <i class="fa fa-user"></i>
                            </label> -->
                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                            <input type="number" class="form-control input" placeholder="Number of guest" id="number_of_guest" required name="number_of_guest">
                            
                          </div>

                          

                          <div class="form-group col-lg-6 col-md-6 col-sm-12">
                              <select class="form-control" name="type_of_service" id="type_of_service" required  style="width: 100%;">
                                  <option value="">--SELECT--</option>
                                  <option value="River Cruise 500 per pax minimum of 10 - with food">River Cruise 500 per pax minimum of 10 -with food </option>
                                  <option value="River Cruise 200 per pax minimum of 10 - without food " >River Cruise 200 per pax minimum of 10 - without food </option>
                                  <option value="Kayaking 150 per hour">Kayaking 150 per hour</option>
                                  <option value="Firefly watching 600 per pax minimum of 10 (floating) minimum of 6 (boat)- with food">Firefly watching 600 per pax minimum of 10 (floating) minimum of 6 (boat)-with food</option>
                                  <option value="Firefly watching 250 per pax minimum of 10 (floating) minimum of 6 (boat)- without food">Firefly watching 250 per pax minimum of 10 (floating) minimum of 6 (boat)-without food</option>
                              </select>
                          </div>

                          <div class="input-group col-lg-3 col-md-3 col-sm-12">
                            <!-- <label>
                                <i class="fa fa-calendar"></i>
                            </label> -->
                            <div class="input-group date datepicker-custom">
                            <input type="text" class="form-control" placeholder="Date of Arrival" id="date_of_arrival" required name="date_of_arrival" autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="my-addon">
                                    <i class="fas fa-calendar-check fa-lg"></i>
                                    </span>
                                </div>
                            </div>
                            
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-12 mt-2">
                            <button type="submit" class="btn btn-primary col-lg-6" >Book reservation</button>
                          </div>

                          
                      </form>
                    </div>

                <!-- QUICK RESERVATION ENDS HERE -->

            </div>
        </div>
        
        

        <div class="home-description" id="features">
            <div class="container">
                <div class="row ">

                    <!-- GET FEATURES -->
                    <?php  
                        $get_all_features = $connection->query("SELECT * FROM home_page_features");

                        $all_features = array();

                        while($row = $get_all_features->fetch_assoc()){
                            $all_features[] = $row;
                        }

                        $features_heading = array_shift($all_features);

                    ?>  

                    <div class="col-lg-6 description-title col-md-6 my-auto">
                        <h1>
                            <?= isset($features_heading) ? $features_heading['heading'] : ""  ?>
                        </h1>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/home-page.php?section=features&source=add_feat' class='btn btn-info'> <span> EDIT <i class='fas fa-pen'></i> </span> </a>";
                                }
                            }
                        ?>
                        
                    </div>

                    <div class="col-lg-6 description-icon col-md-6">
                        <div class="row">

                            <?php 

                                for($i = 0; $i < count($all_features); $i++){
                                    $features_id = $all_features[$i]['id'];
                                    echo " <div class='col-lg-6 icon-block col-md-6' > ";
                                        echo htmlspecialchars_decode($all_features[$i]['icon']);
                                        echo "<p>". $all_features[$i]['description'] ."</p>";
                                        if(isset($_SESSION['login'])){
                                            if($_SESSION['login']){
                                                echo "<a class='btn btn-info' href='admin/home-page.php?section=features&source=edit_feat&id=$features_id'> EDIT   </a>";
                                            }
                                        }
                                        
                                    echo "</div>";
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-activities" id="features_img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <?php 
                            $features_image_stmt =$connection->query("SELECT * FROM home_page_features_img");
                            $all_features_img  = array();

                            while($row = $features_image_stmt->fetch_assoc()){
                                $all_features_img[] = $row;
                            }

                            $features_img_heading = array_shift($all_features_img);

                        ?>

                        <h1><?= isset($features_img_heading) ? $features_img_heading['heading'] : "" ?>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/home-page.php?section=features_img&source=add_feat_img' class='btn btn-info'> <span> EDIT <i class='fas fa-pen'></i> </span> </a>";
                                }
                            }
                        ?>
                        </h1>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="row">

                            <?php 

                                for($i = 0; $i < count($all_features_img); $i++){
                                        $features_img_id = $all_features_img[$i]['id'];
                                    echo "<div class='col-lg-6'>";
                                    echo     "<div class='card card-animation'>";
                                    echo        "<div class='card-body'>";
                                    echo             "<img src='images/".$all_features_img[$i]['img_name'] . "'" ."alt='' class='img-responsive' height='150px' width='100%'>";
                                    echo             "<p>". $all_features_img[$i]['img_caption'] ."</p>";
                                                        if(isset($_SESSION['login'])){
                                                            if($_SESSION['login']){
                                                                echo "<a href='admin/home-page.php?section=features&source=edit_feat_img&id=$features_img_id' class='btn btn-info text-center'> EDIT <i class='fas fa-pen'></i> </a>";
                                                            }
                                                        }
                                    echo         "</div>";
                                    echo     "</div>";
                                    echo "</div>";
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonials" id="reviews">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 title">

                        <?php

                            $get_all_reviews_stmt = $connection->query("SELECT * FROM home_page_reviews");
                            $all_reviews = array();
                            while($row = $get_all_reviews_stmt->fetch_assoc()){
                                $all_reviews[] = $row;
                            }

                            $reviews_heading = array_shift($all_reviews);
                                
                        ?>

                        <small>People say about us</small>
                        <h1 class="caption"><?= isset($reviews_heading) ? $reviews_heading['heading'] : "" ?></h1>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/home-page.php?section=reviews&source=add_review' class='btn btn-info'> <span> EDIT <i class='fas fa-pen'></i> </span> </a>";
                                }
                            }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <div id="my-carousel2" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">

                                <?php
                                    // $reviews_to_active = array_shift($all_reviews);

                                    // echo "<div class='carousel-item active'>";
                                    // echo    "<p class='caption'>". $reviews_to_active['review'] ."</p>";
                                    // echo    "<p>". $reviews_to_active['author'] . "</p>";
                                    
                                    // echo "</div>";


                                    for($i = 0; $i < count($all_reviews) ; $i++){
                                        $reviews_id = $all_reviews[$i]['id'];

                                        if($i == 0){
                                            echo "<div class='carousel-item active'>";
                                        echo    "<p class='caption'>". $all_reviews[$i]['review'] ."</p>";
                                        echo    "<p>". $all_reviews[$i]['author'] . "</p>";
                                                if(isset($_SESSION['login'])){
                                                    if($_SESSION['login']){
                                                        echo "<a href='admin/home-page.php?section=reviews&source=edit_review&id=$reviews_id' class='btn btn-info '> EDIT  </a>";
                                                    }
                                                }
                                        echo "</div>";

                                        }else{

                                        
                                        echo "<div class='carousel-item'>";
                                        echo    "<p class='caption'>". $all_reviews[$i]['review'] ."</p>";
                                        echo    "<p>". $all_reviews[$i]['author'] . "</p>";
                                                if(isset($_SESSION['login'])){
                                                    if($_SESSION['login']){
                                                        echo "<a href='admin/home-page.php?section=reviews&source=edit_review&id=$reviews_id' class='btn btn-info '> EDIT  </a>";
                                                    }
                                                }
                                        echo "</div>";
                                        }
                                    }

                                ?>

                                
                                
                                <!-- <div class="carousel-item">
                                    <p class="caption">very beautiful place for tourist..</p>
                                    <i class="far fa-user"></i>
                                    <p>Clarita Skjolingstad</p>
                                </div>
                                <div class="carousel-item">
                                    <p class="caption">definitely i will recommended this totaly adventures of River Cruising at Bacungan San Carlos PPp.</p>
                                    <i class="far fa-user"></i>
                                    <p>Aries H Gobont</p>
                                </div> -->
                                <a href="#my-carousel2" role="button" class="carousel-control-prev" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                  <a href="#my-carousel2" role="button" class="carousel-control-next" data-slide="next">
                                      <span class="carousel-control-next-icon"></span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        

        
        
<?php require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {

        $(".datepicker-custom").datepicker({
            datesDisabled: [ <?= "'" . implode("','", $dates) . "'" ?> ],
            autoclose: true,
                });

      $("#quickReservation").submit(function (e) { 
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
            url: "reservation.php",
            dataType: 'script',
            contentType : false,
            processData: false,
            data: service_form,
            beforeSend: function(){
              $("body").append(div_box);

            },  
            success: function (response) {
                
                if(response == "success"){
                  
                  $("#background_loader").remove();
                  
                  window.location.href = "success.html";
                }else{
                  $("#background_loader").remove();
                  
                  alert("PLease try again");
                }
            }
          });
        }
        
        
      });

        
      window.addEventListener("scroll", function(){
    
    let homeNav = document.querySelector("#navbar")
    if(this.window.scrollY > 30){
        homeNav.classList.remove("navbar-dark");
        homeNav.classList.add("navbar-scroll");
        homeNav.classList.add("navbar-light");
        
        
    }else{
        homeNav.classList.remove("navbar-scroll");
        homeNav.classList.remove("navbar-light");
        homeNav.classList.add("navbar-dark");

    }
    
    descriptionBlockAnimation();
    homeActivitiesAnimation();
    
})
// let homeNav = document.querySelector("#navbar")
// var innerWidth = window.innerWidth;
// if(innerWidth <= 768){
//     homeNav.classList.remove("fixed-top")
//     homeNav.classList.remove("navbar-dark")
//     homeNav.style.backgroundColor = "white";
//     homeNav.style.color= "black";
//     homeNav.classList.add("navbar-light")
// }








function descriptionBlockAnimation(){
    let content = document.querySelector(".description-icon");
    let contentPosition = content.getBoundingClientRect().top;
    let descriptionTitle = document.querySelector(".description-title");
    let screenPosition = window.innerHeight;
    if(contentPosition < screenPosition){
        content.classList.add('animation');
        descriptionTitle.style.animation = "entrance 500ms ease-in";
    }
    else{
        content.classList.remove('animation');
        descriptionTitle.style.animation = null;
    }
}

function homeActivitiesAnimation(){
    let homeActivities = document.querySelector(".home-activities");
    let homeActivitiesPosition = homeActivities.getBoundingClientRect().top;
    let cards = document.querySelectorAll(".card-animation");
    let screenPosition = window.innerHeight;
    if(homeActivitiesPosition < screenPosition){
        // for(let x = 0; x <=cards.length; x+=1){
        //     setInterval(() => {
        //         cards[x].classList.add("animation");            
        //     }, 1000);
        // }        
            var x = 0;
            setInterval(() => {
                if(x < cards.length){
                    cards[x].classList.add("animation");            
                }                
                x++;
            }, 700);
            
    }
    else{
            for(let x = 0; x <cards.length; x+=1){
                cards[x].classList.remove('animation');
            }
    }

}
// let cards = document.querySelectorAll(".card-animation");
// for(let x = 0; x <=cards.length; x+=1){
//     cards[x].classList.add("animation");    
// }
// cards[0].classList.add("animation");

// var inputs = document.querySelectorAll(".input");
//     for(var x = 0; x<=inputs.length; x++){
//         inputs[x].addEventListener("click", function(){
//             changePlaceholder(this);
//         })
//     }



        
    });
</script>
