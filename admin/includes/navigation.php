<nav class="navbar navbar-expand-md navbar-dark fixed-top">
            <a class="navbar-brand" style="color: #FFBF0F" href="../index.php">
                <h1>SC river cruise</h1>
            </a>
            
            
                <ul class="navbar-nav ml-auto top-nav">
                
                    <li class="nav-item ">
                        <a class="nav-link mr-2" href="profile.php" title="profile">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link mr-2" href="../logout.php" title="Logout">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </a>
                    </li>

                
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
                    </li> -->
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars "></span>
                    </button>
                </ul>
            

                <div id="my-nav" class="collapse navbar-collapse side-nav ">
                    <nav class="navbar-nav  flex-column vertical-nav">
                    
                        <li class="nav-item component">
                          <a class="nav-link " href="index.php" >
                            <i class="fas fa-cubes"></i>    
                          Dashboard</a>
                        </li>

                        <li class="nav-item component">
                          <a class="nav-link " href="booking.php" >
                            <i class="fas fa-book-open"></i>    
                          SC Booking</a>
                        </li>

                        <li class="nav-item component">
                          <a class="nav-link " href="queries.php" >
                            <i class="fas fa-phone-volume"></i>    
                          SC QUERIES</a>
                        </li>
                        
                        <!-- HOME-PAGE -->
                        <li class="nav-item component">
                            <a href="#home-page" data-toggle="collapse" class="dropdown-toggle nav-link " aria-expanded="false">
                                <i class="fas fa-house-user"></i>
                                Home page
                            </a>

                            <ul class="collapse list-unstyled sub-component " id="home-page">

                                <li class='nav-item'>
                                    <a href="#intro-section" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Introduction section
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="intro-section">
                                        <li class="nav-item">
                                            <a href="home-page.php?section=intro&source=add_caro" class="nav-link" >Add carousel </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="home-page.php?section=intro&source=view_caro" class="nav-link" >View carousel list</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class='nav-item'>
                                    <a href="#home-features" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Features section
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="home-features">
                                        <li class="nav-item">
                                            <a href="home-page.php?section=features&source=add_feat" class="nav-link" >Add features </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="home-page.php?section=features&source=view_feat" class="nav-link" >View features list</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class='nav-item'>
                                    <a href="#image-features" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Image features section
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="image-features">
                                        <li class="nav-item">
                                            <a href="home-page.php?section=features_img&source=add_feat_img" class="nav-link" >Add image </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="home-page.php?section=features_img&source=view_feat_img" class="nav-link" >View image list</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class='nav-item'>
                                    <a href="#reviews-section" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Guest reviews section
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="reviews-section">
                                        <li class="nav-item">
                                            <a href="home-page.php?section=reviews&source=add_review" class="nav-link" >Add review </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="home-page.php?section=reviews&source=view_review" class="nav-link" >View review list</a>
                                        </li>
                                    </ul>
                                </li>
    
                            </ul>
                        </li>
                        
                    
                        <!-- SERVICES PAGE -->
                        <li class="nav-item component">
                            <a href="#service-page" data-toggle="collapse" class="dropdown-toggle nav-link " aria-expanded="false">
                                <i class="fas fa-coins"></i>
                                Service page
                            </a>

                            
                            <ul class="collapse list-unstyled sub-component " id="service-page">

                                <li class='nav-item'>
                                    <a href="#raft-crusing" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Raft cruising service
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="raft-crusing">
                                        <li class="nav-item">
                                            <a href="service-page.php?type=raft&source=add" class="nav-link" >Add image and info </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="service-page.php?type=raft&source=view" class="nav-link" >View image list</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class='nav-item'>
                                    <a href="#kayaking" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Kayaking service
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="kayaking">
                                        <li class="nav-item">
                                            <a href="service-page.php?type=kayaking&source=add" class="nav-link" >Add image and info </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="service-page.php?type=kayaking&source=view" class="nav-link" >View image list</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class='nav-item'>
                                    <a href="#image-features" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Firefly watching service
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="image-features">
                                        <li class="nav-item">
                                            <a href="service-page.php?type=firefly&source=add" class="nav-link" >Add image and info </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="service-page.php?type=firefly&source=view" class="nav-link" >View image list</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                
    
                            </ul>
                        </li>


                        
                        <!-- GUIDE page -->
                        <li class="nav-item component">
                            <a href="#guide-page" data-toggle="collapse" class="dropdown-toggle nav-link " aria-expanded="false">
                                <i class="fas fa-paste"></i>
                                Guide page
                            </a>

                            <ul class="collapse list-unstyled sub-component " id="guide-page">

                                        <li class="nav-item">
                                            <a href="guide-page.php?section=healthAsafety&source=add_guide" class="nav-link" >Add guide </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="guide-page.php?section=healthAsafety&source=view_guide" class="nav-link" >View guide list</a>
                                        </li>
                                    

                                <!-- <li class='nav-item'>
                                    <a href="#important-info-guides" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Important info
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="important-info-guides">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" >Add guide </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" >View guide list</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class='nav-item'>
                                    <a href="#transportation-guides" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                        Transportation guide
                                    </a>
                                    <ul class="collapse list-unstyled third-component " id="transportation-guides">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" >Add guide </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" >View guide list</a>
                                        </li>
                                    </ul>
                                </li> -->
                                
    
                            </ul>
                        </li>

                        <li class="nav-item component">
                            <a href="#about-page" data-toggle="collapse" class="dropdown-toggle nav-link " aria-expanded="false">
                                <i class="fas fa-users"></i>
                                About page
                            </a>

                            <ul class="collapse list-unstyled sub-component " id="about-page">

                                        <li class="nav-item">
                                            <a href="about-page.php?section=about&source=history" class="nav-link" >Edit History </a>
                                        </li>
                                        <li class='nav-item'>
                                            <a href="#staff_section" data-toggle="collapse" class="dropdown-toggle nav-link" aria-expanded="false">
                                                Staff section
                                            </a>
                                            <ul class="collapse list-unstyled third-component " id="staff_section">
                                                <li class="nav-item">
                                                    <a href="about-page.php?section=staff&source=add_staff" class="nav-link" >Add Staff </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="about-page.php?section=staff&source=view_staff" class="nav-link" >View Staff</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="about-page.php?section=about&source=founder" class="nav-link" >Edit Project founder </a>
                                        </li>                                
    
                            </ul>
                        </li>

                        <li class="nav-item component">
                            <a href="#gallery-page" data-toggle="collapse" class="dropdown-toggle nav-link " aria-expanded="false">
                            <i class="far fa-images"></i>
                                Gallery
                            </a>

                            <ul class="collapse list-unstyled sub-component " id="gallery-page">

                                        <li class="nav-item">
                                            <a href="gallery-page.php?source=add" class="nav-link" >Add image </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="gallery-page.php?source=view" class="nav-link" >View images </a>
                                        </li>                                
    
                            </ul>
                        </li>

                        
                    </nav>
                </div>
        </nav>