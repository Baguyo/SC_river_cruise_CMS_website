<?php
      $page_name = basename($_SERVER['PHP_SELF']);

      $get_info_stmt = $connection->query("SELECT contact_number, email FROM admin_profile");
      $row_info = $get_info_stmt->fetch_assoc();
      
?>
<nav class="navbar navbar-expand-lg <?= ($page_name == "index.php" || $page_name == "") ? "navbar-dark" : "navbar-light"?>  fixed-top " id="<?= ($page_name == "index.php") ? "navbar" : "special_navbar"?>">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                <?= isset($row_info['contact_number']) ? "<small class='mr-2'><i class='fas fa-phone mr-2'></i> +".$row_info['contact_number']."   </small>" :"" ?>
                <?= isset($row_info['contact_number']) ? "<small class='mr-2'><i class='fas fa-envelope mr-2'></i>". $row_info['email'] ."</small>" :"" ?>
                    
                    
                    <h1>San Carlos river cruise</h1>
                    
                </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto " style="font-size: 15px;">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="services.php" class="nav-link <?= ($page_name == "services.php") ? "active" : ''?> ">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="custom_reservation.php" class="nav-link <?= ($page_name == "custom_reservation.php") ? "active" : ''?> ">Custom Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a href="guides.php" class="nav-link <?= ($page_name == "guides.php") ? "active" : ''?> ">Guides</a>
                    </li>
                    <li class="nav-item">
                        <a href="contactUs.php" class="nav-link <?= ($page_name == "contactUs.php") ? "active" : ''?> ">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a href="gallery.php" class="nav-link <?= ($page_name == "gallery.php") ? "active" : ''?> ">Gallery</a>
                    </li>
                    
                    <!-- <li class="nav-item">
                        <a href="about.html" class="nav-link">About us</a>
                    </li> -->
                </ul>
            </div>
            </div>
        </nav>