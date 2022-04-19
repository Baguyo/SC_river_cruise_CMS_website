<?php require_once "admin/includes/db.php" ?>
<?php require_once "includes/header.php" ?>

       <?php require_once "includes/navigation.php" ?>

        <!-- MESSAGE PLUGIN -->
        <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ba8a0a51-425c-45e1-9207-d23c787c4afb"></div> -->

        <div class="custom-wrapper bg-light" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <h1 class="text-center mt-2 text-danger  ">GALLERY
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']){
                                    echo "<a href='admin/gallery-page.php?source=view' class='btn btn-info'> VIEW <i class='fas fa-eye'></i> </a>";
                                }
                            }
                        ?>
                        </h1>
                        
                    </div>

                    <?php 
                        $get_all_image = $connection->query("SELECT * FROM gallery_page");
                        while($row = $get_all_image->fetch_assoc()){
                    ?>  
                            <div class="  item col-lg-3 mb-3">
                                <a href="images/<?= $row['gallery_image_name']?>" class="fancybox" data-fancybox='gallery1' >
                                    <img src="images/<?= $row['gallery_image_name']?>" class="img-responsive" width="100%" height="250px" alt="">
                                </a>
                            </div>
                    <?php }?>
                    </div>
                </div>
                
            </div>
            
            
        </div>

        <?php require_once "includes/footer.php" ?>
        
        

        