
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

        <div class="container text-center mt-2 " >
            <div class="row">
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
                </div>
            </div>

        </div>

        
            

<?php require_once "includes/footer.php" ?>