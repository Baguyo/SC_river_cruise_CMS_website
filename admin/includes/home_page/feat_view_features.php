<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">HOME PAGE | features section list of feature</h1>
    </div>
    <div class="card-body">
    




<div class="table-responsive-lg" >

    <table class="table table-light">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Description</th>
                <!-- <th>Image</th>
                <th>Button name</th>
                <th>Button color</th>
                <th>Button icon</th>
                <th>Button link</th> -->
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                    $fetch_all_features = $connection->query("SELECT * FROM home_page_features WHERE icon != '' OR description != '' ");
                    while($row = $fetch_all_features->fetch_assoc()){
                ?>
                    <tr>
                      <td> <?= $row['icon'] . "<br>".  htmlspecialchars_decode($row['icon']) ?> </td>
                      <td> <?= $row['description'] ?> </td>
                        <td>
                            <a href="home-page.php?section=features&source=edit_feat&id=<?=$row['id']?>" class="btn btn-info" >EDIT</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='features' >DELETE </a>
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
