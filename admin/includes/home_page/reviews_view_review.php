<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">HOME PAGE | Reviews section list of reviews</h1>        
    </div>
    <div class="card-body">
    




<div class="table-responsive-lg" >

    <table class="table table-light">
        <thead>
            <tr>
                <th>Author</th>
                <th>Message</th>
                <th colspan="2" class="text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                    $fetch_all_review = $connection->query("SELECT * FROM home_page_reviews WHERE author != '' OR review != '' ");
                    while($row = $fetch_all_review->fetch_assoc()){
                ?>
                    <tr>
                      <td> <?= $row['author']  ?> </td>
                      <td> <?= $row['review'] ?> </td>
                        <td>
                            <a href="home-page.php?section=reviews&source=edit_review&id=<?=$row['id']?>" class="btn btn-info" >EDIT</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger delete" rel="<?=$row['id']?>" tbl='review' >DELETE </a>
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
