<div class="card">
    <div class="card-header text-white bg-warning">
        <h1 class="text-center">SERVICE PAGE | Raft crusing service images</h1>
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
                    $fetch_all_image = $connection->query("SELECT id, raft_crusing_image_name FROM service_page_raft_crusing WHERE raft_crusing_image_name != ' '");
                    while($row = $fetch_all_image->fetch_assoc()){
                ?>
                    <tr>
                      <td> <img src="../images/<?=$row['raft_crusing_image_name']?>" class="img-responsive" width="100%" height="250px"  alt=""> </td>
                        
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='raft_crusing' >DELETE </a>
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