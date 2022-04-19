<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">HOME PAGE | Features image section list of image</h1>
    </div>
    <div class="card-body">
      





<div class="table-responsive-lg" >

    <table class="table table-light">
        <thead>
            <tr>
                <th>Caption</th>
                <th>Image</th>
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
                    $fetch_all_img = $connection->query("SELECT * FROM home_page_features_img WHERE heading IS NULL");
                    while($row = $fetch_all_img->fetch_assoc()){
                ?>
                    <tr>
                      <td> <?= $row['img_caption'] . "<br>" ?> </td>
                      <td> <img src="../images/<?=$row['img_name']?>" class="img-responsive" width="100%" height="100px"  alt=""> </td>
                        <td>
                            <a href="home-page.php?section=features&source=edit_feat_img&id=<?=$row['id']?>" class="btn btn-info" >EDIT</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='features_img' >DELETE </a>
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