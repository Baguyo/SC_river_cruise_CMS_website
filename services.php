<?php 
  // if(isset($_POST['date_of_arrival'])){
  //   echo $_POST['date_of_arrival'];
  // }
?>

<?php require_once "includes/header.php" ?>
<?php  
  $kayaking_all_data = array();
  $get_kayaking_services  = $connection->query("SELECT * FROM service_page_kayaking");
  while($row = $get_kayaking_services->fetch_assoc()){
    $kayaking_all_data[] = $row;
  }
  $kayaking_service_info = array_shift($kayaking_all_data);

  $raft_crusing_all_data = array();
  $get_raft_crusing_services  = $connection->query("SELECT * FROM service_page_raft_crusing");
  while($row = $get_raft_crusing_services->fetch_assoc()){
    $raft_crusing_all_data[] = $row;
  }
  $raft_crusing_service_info = array_shift($raft_crusing_all_data);

  $firefly_all_data = array();
  $get_firefly_services  = $connection->query("SELECT * FROM service_page_firefly_watching");
  while($row = $get_firefly_services->fetch_assoc()){
    $firefly_all_data[] = $row;
  }
  $firefly_service_info = array_shift($firefly_all_data);

  // $list_of_services  = array_merge( $kayaking_service_info, $raft_crusing_service_info );
  // var_dump($list_of_services);

  
  $raft_crusing_service = explode('\r\n', $raft_crusing_service_info['raft_crusing_services']);
  $kayaking_service = explode('\r\n', $kayaking_service_info['kayaking_services']);
  $firefly_watching_service = explode('\r\n', $firefly_service_info['firefly_watching_services']);

  $list_all_service = array_merge($raft_crusing_service, $kayaking_service, $firefly_watching_service);
  // var_dump($list_all_service);
  
?>

<?php require_once "includes/navigation.php" ?>

        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <div class="services-title ">
            <div class="container">
                <div class="services-caption">
                    <h1 class="text-dark">Our Services</h1>
                    <hr>
                <!-- <p class="text-center caption text-dark">San Carlos River Cruise is not your ordinary trip. Art, culture, and nature are rolled into one great package. The tour offers an exciting opportunity to explore the amazing mangrove ecosystem.</p> -->
                </div>
            </div>
        </div>

        
        
            <div class="container justify-content-center mt-2 " >
                <div class="col-lg-12 services-block">
                    <ul class="nav nav-pills nav-justified  mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link " id="kayaking_service-tab" data-toggle="pill" href="#kayaking_service" role="tab"
                            aria-controls="kayaking_service" aria-selected="true">Kayaking</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" id="raft_crusing-tab" data-toggle="pill" href="#raft_crusing" role="tab"
                            aria-controls="raft_crusing" aria-selected="false">Raft Crusing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="firefly_service-tab" data-toggle="pill" href="#firefly_service" role="tab"
                            aria-controls="firefly_service" aria-selected="false">Firefly watching</a>
                        </li>
                      </ul>

                      <div class="tab-content pt-2 pl-1" id="pills-tabContent">



                        
                        <div class="tab-pane fade " id="kayaking_service" role="tabpanel" aria-labelledby="kayaking_service-tab">
                        <?php if( $kayaking_service_info['kayaking_description'] != "" && $kayaking_service_info['kayaking_services'] != ""): ?>

                          <div class="card">
                              <div class="card-body bg-light">
                                <div class="row">

                                    <div class="col-lg-6">
                                        
                                        <div id="kayaking-carousel" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">

                                                <?php 
                                                    for($i = 0; $i < count($kayaking_all_data); $i++){
                                                      $kayaking_image = $kayaking_all_data[$i]['kayaking_image_name'];
                                                      if($i == 0){
                                                        echo "<div class='carousel-item active' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$kayaking_image> ";
                                                        echo "</div>";
                                                      }else{
                                                        echo "<div class='carousel-item' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$kayaking_image> ";
                                                        echo "</div>";
                                                      }
                                                    }
                                                ?>

                                            </div>

                                            <a href="#kayaking-carousel" role="button" class="carousel-control-prev" data-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </a>
                                              <a href="#kayaking-carousel" role="button" class="carousel-control-next" data-slide="next">
                                                  <span class="carousel-control-next-icon"></span>
                                              </a>

                                        </div>

                                        
                                        
                                    </div>

                                    <div class="col-lg-6 text-center my-auto">

                                        <p class="mb-4"> <?= $kayaking_service_info['kayaking_description'] ?> </p>

                                        <h6 class="mb-3">
                                            <?= str_replace( array('\r\n', '\n', '\r'), "<br>", $kayaking_service_info['kayaking_services'] ) ?>
                                        </h6>

                                        <?php 
                                          if(isset($_SESSION['login'])){
                                            if($_SESSION['login']){
                                              echo "<a href='admin/service-page.php?type=kayaking&source=add' class='btn btn-info mr-2'> EDIT <i class='fas fa-pen'></i> </a>";
                                            }
                                          }
                                        ?>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service_form">
                                                    Book now
                                        </button>

                                    </div>


                                </div>      
                              </div>

                              
                          </div>
                          <?php else:  ?>
                              <div class="card">
                                <div class="card-body bg-light">
                                  <h1 class="text-center">Sorry service unavailable</h1>
                                </div>
                              </div>
                            <?php endif; ?>
                        </div>
                        



                        

                        <div class="tab-pane fade show active" id="raft_crusing" role="tabpanel" aria-labelledby="raft_crusing-tab">
                        <?php if($raft_crusing_service_info['raft_crusing_description'] != "" && $raft_crusing_service_info['raft_crusing_services'] != "" ) : ?>

                          
                            <div class="card">
                              <div class="card-body bg-light">
                                <div class="row">

                                    <div class="col-lg-6">
                                        
                                        <div id="raft-carousel" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">

                                                <?php 
                                                    for($i = 0; $i < count($raft_crusing_all_data); $i++){
                                                      $raft_image = $raft_crusing_all_data[$i]['raft_crusing_image_name'];
                                                      if($i == 0){
                                                        echo "<div class='carousel-item active' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$raft_image> ";
                                                        echo "</div>";
                                                      }else{
                                                        echo "<div class='carousel-item' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$raft_image> ";
                                                        echo "</div>";
                                                      }
                                                      
                                                      

                                                    }
                                                ?>

                                            </div>

                                            <a href="#raft-carousel" role="button" class="carousel-control-prev" data-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </a>
                                              <a href="#raft-carousel" role="button" class="carousel-control-next" data-slide="next">
                                                  <span class="carousel-control-next-icon"></span>
                                              </a>

                                        </div>

                                        
                                    </div>

                                    <div class="col-lg-6 text-center my-auto">

                                        <p class="mb-4"> <?= $raft_crusing_service_info['raft_crusing_description'] ?> </p>

                                        <h6 class="mb-3">
                                            <?= str_replace( array('\r\n', '\n', '\r'), "<br>", $raft_crusing_service_info['raft_crusing_services'] ) ?>
                                        </h6>

                                        <?php 
                                          if(isset($_SESSION['login'])){
                                            if($_SESSION['login']){
                                              echo "<a href='admin/service-page.php?type=raft&source=add' class='btn btn-info mr-2'> EDIT <i class='fas fa-pen'></i> </a>";
                                            }
                                          }
                                        ?>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service_form">
                                                    Book now
                                        </button>

                                    </div>


                                </div>      
                              </div>
                              


                            </div>
                            <?php else:?>
                              <div class="card">
                                <div class="card-body bg-light">
                                  <h1 class="text-center">Sorry service unavailable</h1>
                                </div>
                              </div>
                            <?php endif; ?>
                            

                          </div>

                        


                        
                          <div class="tab-pane fade " id="firefly_service" role="tabpanel" aria-labelledby="firefly_service-tab">
                            <?php if($firefly_service_info['firefly_watching_description'] != "" && $firefly_service_info['firefly_watching_services'] != ""): ?>   

                              <div class="card">
                              <div class="card-body bg-light">
                                <div class="row">

                                    <div class="col-lg-6">
                                        
                                        <div id="firefly-carousel" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">

                                                <?php 
                                                    for($i = 0; $i < count($firefly_all_data); $i++){
                                                      $firefly_image = $firefly_all_data[$i]['firefly_watching_image_name'];
                                                      if($i == 0){
                                                        echo "<div class='carousel-item active' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$firefly_image> ";
                                                        echo "</div>";
                                                      }else{
                                                        echo "<div class='carousel-item' >";
                                                        echo "<img class='img-responsive' width='100%' height='350px' src=images/$firefly_image> ";
                                                        echo "</div>";
                                                      }
                                                      
                                                      

                                                    }
                                                ?>

                                            </div>

                                            <a href="#firefly-carousel" role="button" class="carousel-control-prev" data-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </a>
                                              <a href="#firefly-carousel" role="button" class="carousel-control-next" data-slide="next">
                                                  <span class="carousel-control-next-icon"></span>
                                              </a>

                                        </div>

                                        
                                    </div>

                                    <div class="col-lg-6 text-center my-auto">

                                        <p class="mb-4"> <?= $firefly_service_info['firefly_watching_description'] ?> </p>

                                        <h6 class="mb-3">
                                            <?= str_replace( array('\r\n', '\n', '\r'), "<br>", $firefly_service_info['firefly_watching_services'] ) ?>
                                        </h6>

                                        
                                        <?php 
                                          if(isset($_SESSION['login'])){
                                            if($_SESSION['login']){
                                              echo "<a href='admin/service-page.php?type=firefly&source=add' class='btn btn-info mr-2'> EDIT <i class='fas fa-pen'></i> </a>";
                                            }
                                          }
                                        ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service_form">
                                                    Book now
                                        </button>
                                                

                                    </div>


                                </div>      
                              </div>
                          
                            
                          </div>
                          <?php else:  ?>
                              <div class="card">
                                <div class="card-body bg-light">
                                  <h1 class="text-center">Sorry service unavailable</h1>
                                </div>
                              </div>
                            <?php endif; ?>
                      </div>
                      
                </div>
            </div>
        
                    

            </div>

            
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="service_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">San Carlos river cruise service form</h5>
                                                        
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" id="" class="sendReservationForm" >
                                                                <div class="form-group">
                                                                    <label for="my-input">Full name</label>
                                                                    <input id="name3" class="form-control input" type="text" name="name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="my-input">Email</label>
                                                                    <input id="email3" class="form-control input" type="email" name="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="my-input">Contact number</label>
                                                                    <input id="contact_number3" class="form-control input" type="number" name="contact_number">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="my-input">Number of guest</label>
                                                                    <input id="number_of_guest3" class="form-control input" type="number" name="number_of_guest">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="my-input">Date of arrival</label>
                                                                    <input id="date_of_arrival3" class="form-control input" type="date" name="date_of_arrival">
                                                                </div>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="type_of_service" id="type_of_service3"  style="width: 100%;">
                                                                          <option value=""> --SELECT-- </option>
                                                                        <?php 
                                                                            foreach ($list_all_service as $key) {
                                                                              echo "<option value='$key'> $key </option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit"  class="btn btn-primary" >Book now</button>
                                                                
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                

<?php require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {
      $(".sendReservationForm").submit(function (e) { 
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

        
    });
</script>