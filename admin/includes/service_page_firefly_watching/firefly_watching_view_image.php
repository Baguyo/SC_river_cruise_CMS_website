<div class="card">
    <div class="card-header bg-warning text-white">
        <h1 class="text-center">SERVICE PAGE | Firefly watching service images</h1>
    </div>
    <div class="card-body">
      





<div class="table-responsive-lg" >

    <table class="table table-light">
        <thead>
            <tr>
                <th>Image</th>
                <!-- <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th> -->
                <th  >
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                    $fetch_all_carousel = $connection->query("SELECT id, firefly_watching_image_name FROM service_page_firefly_watching WHERE firefly_watching_image_name != ' '");
                    while($row = $fetch_all_carousel->fetch_assoc()){
                ?>
                    <tr>
                      <td> <img src="../images/<?=$row['firefly_watching_image_name']?>" class="img-responsive" width="100%" height="250px"  alt=""> </td>
                        
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='firefly_watching' >DELETE </a>
                        </td>
                
                    </tr>
                <?php        
                    }
                ?>
                
        </tbody>
    </table>
</div>

  
    </div>
</div>