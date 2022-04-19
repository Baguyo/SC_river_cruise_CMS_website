<?php require_once "admin/includes/db.php" ?>
<?php 

$important_info = array();
$health_guide = array();
$transport_guide = array();


$fetch_all_carousel = $connection->query("SELECT * FROM guide_page");
while($row = $fetch_all_carousel->fetch_assoc()){
    if(!is_null($row['health_guide'])){
        // echo $row['health_guide']. "<br> <br>";
        $health_guide[] = $row;
    }elseif(!is_null($row['transport_guide'])){
        $transport_guide[] = $row;
    }elseif(!is_null($row['important_info'])){
        $important_info[] = $row;
    }
     
}
?>
<?php require_once "includes/header.php" ?>

<?php require_once "includes/navigation.php" ?>

        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <div class="custom-wrapper" id="guides">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center mt-2 text-white">San Carlos river cruise Bacungan health and transportation guides.</h1>
                    </div>
                    <div class="col-lg-6">

                        <?php
                                            if(isset($health_guide)){
                        ?>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-white">HEALTH AND SAFETY GUIDES</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    
                                        
                                        <?php 
                                        
                                                for($i = 0; $i < count($health_guide); $i++){
                                                    $health_guide_id = $health_guide[$i]['id'];
                                                    echo "<li class='list-group-item'>";
                                                        echo "<div class='row'>";
                                                            echo "<div class='col-lg-2'>";
                                                                echo "<i class='far fa-check-circle'></i>";
                                                            echo "</div>";

                                                            echo "<div class='col-lg-10'>";
                                                                echo "<p>". str_replace(array('\r\n', '\r', '\n', '\n\r'), "<br>", $health_guide[$i]['health_guide']) ."</p>";
                                                                if(isset($_SESSION['login'])){
                                                                    if($_SESSION['login']){
                                                                        echo "<a class='btn btn-info' href='admin/guide-page.php?section=healthAsafety&source=edit_guide&id=$health_guide_id'> EDIT  </a>";
                                                                    }
                                                                }
                                                            echo "</div>";
                                                        echo "</div>";
                                                    echo "</li>";
                                                }
                                            
                                        ?>
                                    
                                  </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6">
                        
                    <?php
                                            if(isset($important_info)){                        
                        ?>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-white">IMPORTANT INFO</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">

                                            
                                        <?php 
                                                for($i = 0; $i < count($important_info); $i++){
                                                    $important_info_id = $important_info[$i]['id'];
                                                    echo "<li class='list-group-item'>";
                                                        echo "<div class='row'>";
                                                            echo "<div class='col-lg-2'>";
                                                                echo "<i class='far fa-check-circle'></i>";
                                                            echo "</div>";

                                                            echo "<div class='col-lg-10'>";
                                                                echo "<p>". str_replace(array('\r\n', '\r', '\n', '\n\r'), "<br>", $important_info[$i]['important_info']) ."</p>";
                                                                if(isset($_SESSION['login'])){
                                                                    if($_SESSION['login']){
                                                                        echo "<a class='btn btn-info' href='admin/guide-page.php?section=healthAsafety&source=edit_guide&id=$important_info_id'> EDIT  </a>";
                                                                    }
                                                                }
                                                            echo "</div>";
                                                        echo "</div>";
                                                    echo "</li>";
                                                }
                                            
                                        ?>
                                    
                                  </ul>
                            </div>
                        </div>
                        <?php } ?>

                        <?php
                                            if(isset($important_info)){
                        ?>
                        
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-white">TRANSPORTATION GUIDES</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php
                                                for($i = 0; $i < count($transport_guide); $i++){
                                                    $transport_guide_id = $transport_guide[$i]['id'];
                                                    echo "<li class='list-group-item'>";
                                                        echo "<div class='row'>";
                                                            echo "<div class='col-lg-2'>";
                                                                echo "<i class='far fa-check-circle'></i>";
                                                            echo "</div>";

                                                            echo "<div class='col-lg-10'>";
                                                            
                                                                echo "<p>". str_replace(array('\r\n', '\r', '\n', '\n\r'), "<br>", $transport_guide[$i]['transport_guide']) ."</p>";
                                                                if(isset($_SESSION['login'])){
                                                                    if($_SESSION['login']){
                                                                        echo "<a class='btn btn-info' href='admin/guide-page.php?section=healthAsafety&source=edit_guide&id=$transport_guide_id'> EDIT  </a>";
                                                                    }
                                                                }
                                                            echo "</div>";
                                                        echo "</div>";
                                                    echo "</li>";
                                                }
                                            
                                        ?>
                                    
                                  </ul>
                            </div>
                        </div>
                            
                        <?php } ?>
                        
                          </div>
                    </div>
                </div>
                
            </div>
            
        </div>

        
        

        <?php require_once "includes/footer.php" ?>