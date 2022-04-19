<?php require_once "admin/includes/db.php" ?>
<?php 
    $get_history_stmt = $connection->query("SELECT id, history_caption, history_heading, history_description, history_image FROM about_page WHERE id = 1 LIMIT 1");
    $history_row = $get_history_stmt->fetch_assoc();

    $get_project_founder_stmt = $connection->query("SELECT project_founder_heading, project_founder_description, project_founder_image FROM about_page WHERE id = 1 LIMIT 1");
    $project_founder_row = $get_project_founder_stmt->fetch_assoc();

    $get_tour_guides = $connection->query("SELECT * FROM about_page_staff");

    $all_tour_guides_row = array();
    while($row = $get_tour_guides->fetch_assoc()){
        $all_tour_guides_row[] = $row;
    }

    $tour_guide_to_active = array_shift($all_tour_guides_row);

?>
<?php require_once "includes/header.php" ?>

<?php require_once "includes/navigation.php" ?>
        
        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <?php 
            if($history_row['history_description'] != ""):
        ?>

        <div class="about-title">
            <div class="container">
                <p class="caption"> <?= $history_row['history_caption'] ?> </p>
                <h1> <?= $history_row['history_heading'] ?> </h1>
            </div>
        </div>

        
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.441113098493!2d118.72596871428136!3d9.897170077513094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33b57e827b5149b9%3A0x90a48222658076b3!2sSan%20Carlos%20River%20Cruise!5e0!3m2!1sen!2sph!4v1638413163613!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->

        <div class="about-content" id="history">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="images/<?= $history_row['history_image'] ?> " alt="" class="img-responsive" height="250px" width="100%">
                    </div>
                    <div class="col-lg-6">
                        <p> <?= $history_row['history_description'] ?> </p>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/about-page.php?section=about&source=history' class='btn btn-info'> EDIT <i class='fas fa-pen'></i> </a>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>

        <div class="about-tour-guides" id="staff">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>MEET OUR <span>TOUR GUIDES</span> </h1>
                        <p class="caption">
                            Our tourist guides are kind, hospitable with enthusiasm and energy. They ensure that itineraries are met and that customers are being informed in an entertaining manner. They are also responsible for ensuring the safety of the group following the safety guidelines.

                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="my-about-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">

                                    <?php 
                                        if(isset($tour_guide_to_active)){
                                    ?>

                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="images/<?= $tour_guide_to_active['staff_image'] ?>" alt="" class="img-responsive" width="100%" height="350px">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h2> <?= $tour_guide_to_active['name'] ?> </h2>
                                                <p class="caption"> <?= $tour_guide_to_active['description'] ?> </p>

                                                <?php 
                                                    if(isset($_SESSION['login'])){
                                                        if($_SESSION['login']){
                                                            $tour_guide_active_id = $tour_guide_to_active['id'];
                                                            echo "<a href='admin/about-page.php?section=staff&source=edit_staff&id=$tour_guide_active_id' class='btn btn-info'> EDIT <i class='fas fa-pen'></i> </a>";
                                                        }
                                                    }
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <?php for($i = 0; $i < count($all_tour_guides_row); $i++): ?>

                                    <div class="carousel-item ">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="images/<?= $all_tour_guides_row[$i]['staff_image'] ?>" alt="" class="img-responsive" width="100%" height="350px">
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h2> <?= $all_tour_guides_row[$i]['name'] ?> </h2>
                                                <p class="caption"> <?= $all_tour_guides_row[$i]['description'] ?> </p>
                                                <?php 
                                                    if(isset($_SESSION['login'])){
                                                        if($_SESSION['login']){
                                                            $tour_guide_id = $all_tour_guides_row[$i]['id'];
                                                            echo "<a href='admin/about-page.php?section=staff&source=edit_staff&id=$tour_guide_id' class='btn btn-info'> EDIT <i class='fas fa-pen'></i> </a>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endfor; ?>

                                    <a href="#my-about-carousel" role="button" class="carousel-control-prev" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                      <a href="#my-about-carousel" role="button" class="carousel-control-next" data-slide="next">
                                          <span class="carousel-control-next-icon"></span>
                                      </a>
                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div>                
                    
                </div>
            </div>
        </div>

        
        <?php if(!empty($project_founder_row['project_founder_heading']) && !empty($project_founder_row['project_founder_description']) && !empty($project_founder_row['project_founder_image']) ):?>

        <div class="sponsor" id="founder">
            <div class="container">
                <h1 class="text-center"> <?= $project_founder_row['project_founder_heading'] ?></h1>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="images/<?= $project_founder_row['project_founder_image'] ?>" alt="" class="img-responsive" height="350px" width="100%">
                    </div>
                    <div class="col-lg-6">
                        <p class="caption text-justify"> <?= $project_founder_row['project_founder_description'] ?> </p>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/about-page.php?section=about&source=founder' class='btn btn-info'> EDIT <i class='fas fa-pen'></i> </a>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>

        <div class="about-location" id="location">
            <div class="container">
                <div class="location-title" >
                    <h1>OUR LOCATION</h1>
                    <p class="caption">San Carlos, Puerto Princesa, Palawan</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d435508.94956320565!2d118.73864531426675!3d9.851386994840427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33b57e827b5149b9%3A0x90a48222658076b3!2sSan%20Carlos%20River%20Cruise!5e0!3m2!1sen!2sph!4v1638673075390!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

        


      
       <?php require_once "includes/footer.php" ?>