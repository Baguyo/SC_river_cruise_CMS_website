
<?php require_once "includes/header.php" ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>    

<?php 
    $fetch_home_page_intro_num = $connection->query("SELECT * FROM home_page_intro");
    $home_page_intro_num = $fetch_home_page_intro_num->num_rows;

    $fetch_home_page_features_num = $connection->query("SELECT * FROM home_page_features WHERE icon != ' ' AND description != ' ' ");
    $home_page_features_num = $fetch_home_page_features_num->num_rows;

    $fetch_home_page_features_img_num = $connection->query("SELECT * FROM home_page_features_img WHERE img_name != ' ' AND img_caption != ' ' ");
    $home_page_features_img_num = $fetch_home_page_features_img_num->num_rows;

    $fetch_home_page_reviews_num = $connection->query("SELECT * FROM home_page_reviews WHERE author != ' ' AND review != ' ' ");
    $home_page_reviews_num = $fetch_home_page_reviews_num->num_rows;

    $select_kayaking_services = $connection->query("SELECT kayaking_services FROM service_page_kayaking");
    $kayaking_row = $select_kayaking_services->fetch_assoc();
    $kayaking_services = explode('\r\n', $kayaking_row['kayaking_services'] );

    $select_raft_services = $connection->query("SELECT raft_crusing_services FROM service_page_raft_crusing");
    $raft_row = $select_raft_services->fetch_assoc();
    $raft_services = explode('\r\n', $raft_row['raft_crusing_services'] );

    $select_firefly_services = $connection->query("SELECT firefly_watching_services FROM service_page_firefly_watching");
    $firefly_row = $select_firefly_services->fetch_assoc();
    $firefly_services = explode('\r\n', $firefly_row['firefly_watching_services'] );

    $all_services = array_merge($kayaking_services, $raft_services, $firefly_services);

    $select_galery_page = $connection->query("SELECT * FROM gallery_page");
    $num_gallery_image = $select_galery_page->num_rows;
?>
    <div class="wrapper">
        
        <?php require_once "includes/navigation.php" ?>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <?php 
                                        $guide_page_num_guides = $connection->query("SELECT * FROM guide_page");
                                        $num_guides = $guide_page_num_guides->num_rows;
                                    ?>
                                    <div class="card text-center">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="card-title ">Guide page </h5>
                                        </div>
                                        <div class="card-body text-dark">
                                            <p>
                                                Number of guides: <span class="p-2 badge badge-success rounded-circle"> <?= $num_guides ?> </span>
                                            </p>
                                            
                                                <a href="guide-page.php?section=healthAsafety&source=add_guide" class="text-dark " title="add">
                                                    <i class='fas fa-plus fa-lg mr-2' class=""></i>
                                                </a>
                                                /
                                                <a href="guide-page.php?section=healthAsafety&source=view_guide" class="text-dark " title="view">
                                                    <i class='fas fa-eye fa-lg ml-2'></i>
                                                </a>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-3">

                                <div class="card text-center">
                                        <div class="card-header bg-warning text-white">
                                            <h5 class="card-title ">Gallery page </h5>
                                        </div>
                                        <div class="card-body text-dark">
                                            <p>
                                                Number of image: <span class="p-2 badge badge-warning text-white rounded-circle"> <?= $num_gallery_image ?> </span>
                                            </p>
                                            
                                                <a href="gallery-page.php?source=add" class="text-dark " title="add">
                                                    <i class='fas fa-plus fa-lg mr-2' class=""></i>
                                                </a>
                                                /
                                                <a href="gallery-page.php?source=view" class="text-dark " title="view">
                                                    <i class='fas fa-eye fa-lg ml-2'></i>
                                                </a>
                                            
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 mb-3">
                                    <?php 
                                        $select_num_staff_about_page = $connection->query("SELECT * FROM about_page_staff");
                                        // $staff_row = $select_num_staff_about_page->fetch_assoc();
                                        $num_of_staff = $select_num_staff_about_page->num_rows;
                                    ?>
                                    <div class="card text-center">
                                        <div class="card-header bg-info text-white">
                                                    <h5 class="card-title text-decoration-underline">About page </h5>
                                                </div>
                                                <div class="card-body text-dark">
                                                    <p>
                                                        Number of staff: <span class="p-2 badge badge-info text-white rounded-circle"> <?= $num_of_staff ?> </span>
                                                    </p>
                                                    
                                                        <a href="about-page.php?section=staff&source=add_staff" class="text-dark " title="add">
                                                            <i class='fas fa-plus fa-lg mr-2' class=""></i>
                                                        </a>
                                                        /
                                                        <a href="about-page.php?section=staff&source=view_staff" class="text-dark " title="view">
                                                            <i class='fas fa-eye fa-lg ml-2'></i>
                                                        </a>
                                                    
                                                    
                                                </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['San Carlos river cruise data', 'Count'],
                        <?php 
                            $element_text = ['HP all carousel', 'HP all features', 'HP all features img', 'HP all reviews', 'Kayaking services', 'Raft cruising services', 'Firefly services'];
                            $element_value = [$home_page_intro_num, $home_page_features_num, $home_page_features_img_num, $home_page_reviews_num, count($kayaking_services), count($raft_services), count($firefly_services)];

                            for($i = 0; $i < count($element_text); $i++){
                                echo "['{$element_text[$i]}'" . "," . "$element_value[$i] ],";
                            }
                        ?>
                        
                        ]);

                        var options = {
                        chart: {
                            title: 'HP stands for Home page',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                    </script>
                </div>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

                            
            </div>
        </div>

    </div>



    
<?php  require_once "includes/footer.php" ?>
<script>
    $(document).ready(function () {
        
        <?php 
        
            $select_not_mailed_stmt = $connection->query("SELECT * FROM admin_reservation WHERE Mailed = 'No' ");
            while($row = $select_not_mailed_stmt->fetch_assoc()){

                echo "toastr.warning(' {$row['email']} not been mailed ');";

            }

        ?>

    });
</script>