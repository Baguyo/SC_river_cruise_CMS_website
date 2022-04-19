<div class="card">
    <div class="card-header text-white bg-info">
        <h1 class="text-center">GALLERY PAGE | view images</h1>
    </div>
    <div class="card-body">
        <?php 

            if(isset($_GET['page'])){
                 $page = sanitize_input($_GET['page']);
            }else{
                $page = "";
            }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * 10) - 10;
            }

            $count_all_images = $connection->query("SELECT * FROM gallery_page");
            $count = $count_all_images->num_rows;
            $count = ceil($count / 10);

            $get_all_image = $connection->query("SELECT * FROM gallery_page LIMIT $page_1, 10");

        ?>
        
        
            
        <div class="table-responsive-lg">
        <table class="table table-light">
            <tbody>
                <?php 

                    while($row = $get_all_image->fetch_assoc()){
                
                        ?>
                        <tr>
                        <td> <img src="../images/<?= $row['gallery_image_name']?>" alt="" class="img-responsive" width="100%" height="350px" > </td>
                        <td>
                        <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='gallery' >DELETE </a>
                        </td>
                        </tr>

                <?php
                    }

                ?>
            </tbody>
        </table>
            
        </div>
        

        
            <ul class="pagination justify-content-center">
                    <?php 
                        for($i = 1; $i <= $count; $i++){
                            if($i == $page){
                                echo " <li class='page-item active' aria-current='page'> ";
                                echo "<a class='page-link' href='gallery-page.php?source=view&page=$i'> ". $i ." <span class='sr-only'> " .$i ."</span></a>";
                            echo "</li>";
                            }else{
                                echo " <li class='page-item' aria-current='page'> ";
                                    echo "<a class='page-link' href='gallery-page.php?source=view&page=$i'> ". $i ." <span class='sr-only'> " .$i ."</span></a>";
                                echo "</li>";
                            }
                        }
                    ?>
                <!-- <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">Page 1 <span class="sr-only">(current)</span></a>
                
                

                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Page 2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Page 3</a>
                </li> -->
            </ul>
        
    </div>
</div>