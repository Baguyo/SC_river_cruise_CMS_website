<?php 

    $get_all_date_reservation = $connection->query("SELECT * FROM admin_reservation WHERE date_of_arrival != ' ' ");
    $dates = array();
    while($row = $get_all_date_reservation->fetch_assoc()){
        $dates[] = $row['date_of_arrival'];
    }

?>


<div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-4">
                        <h5>Site map</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">About us</a>
                            </li>
                            <li class="nav-item">
                                <a href="services.html" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="contactUs.html" class="nav-link">Contact us</a>
                            </li>
                            
                        </ul>
                    </div> -->
                    <div class="col-lg-6">
                        <h5>Contact Information</h5>
                        <ul class="list-unstyled">
                            <?= isset($row_info['contact_number']) ? "<li> +". $row_info['contact_number'] ."</li>" : ""?>
                            <?= isset($row_info['email']) ? "<li> ". $row_info['email'] ."</li>" : ""?>
                            
                        </ul>

                        <h5>
                            <a href="about.html" class="text-white">About us</a>
                            <?php 
                                $get_history_stmt = $connection->query("SELECT history_description FROM about_page WHERE id = 1");
                                $history = $get_history_stmt->fetch_assoc();
                            ?>
                        </h5>
                        <p> <?= substr( $history['history_description'], 0, 250) ?>
                            .. <a href="about.php" class="text-white"> Read more</a>
                        </p>

                    </div>
                    <div class="col-lg-6">
                        <h5>Like us on facebook</h5>
                        <div class="fb-page" data-href="https://www.facebook.com/SanCarlosRiverCruiseCBST" data-tabs="timeline" data-width="500" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SanCarlosRiverCruiseCBST" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SanCarlosRiverCruiseCBST">San Carlos River Cruise Bacungan</a></blockquote></div>
                        <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSanCarlosRiverCruiseCBST&tabs=timeline&width=320&height=250px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="320" height="250px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
            <p>Designed by group of Emerson S. Baguyo</p>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="O4zknAIX"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="js/script.js"></script>
        <script>
            $(document).ready(function () {

                

                $("#datepicker").datepicker({
                    datesDisabled: [ <?= "'" . implode("','", $dates) . "'" ?> ],
                });
                $("#datepicker").hide();

                $(".date-picker-btn").click(function (e) { 
                    e.preventDefault();
                    $("#datepicker").toggle(500);
                    // console.log("hey");
                });
            });
        </script>
    </body>
</html>
