<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center "> HOME PAGE | Reviews section edit review</h1>
    </div>
    <div class="card-body">
    
 
 <?php 
    $review_id = sanitize_input($_GET['id']);
    $edit_review_stmt = $connection->prepare("SELECT * FROM home_page_reviews WHERE id = ?");
    $edit_review_stmt->bind_param("i", $review_id);
    $edit_review_stmt->execute();
    $edit_review_stmt->bind_result( $id, $heading, $author, $message);
    $row  = $edit_review_stmt->fetch();
    

    $edit_review_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_review'])){
         
            $edit_author = sanitize_input($_POST['edit_author']);
            $edit_message = sanitize_input($_POST['edit_message']);

            $review_update_stmt = $connection->prepare("UPDATE home_page_reviews SET author = ?, review = ? WHERE id = ?");
            $review_update_stmt->bind_param("ssi", $edit_author, $edit_message, $id);
            $review_update_stmt->execute();

            $review_update_stmt->store_result();

            if($review_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Feature has been successfully updated <a href='../index.php#reviews' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Author</label>
            <input id="my-input" class="form-control" type="text" name="edit_author" value="<?=$author?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Message</label>
                <textarea id="my-textarea" class="form-control" name="edit_message" rows="3"><?=$message?></textarea>
            </div>
        </div>

        <input type="submit" name="edit_review" value="Submit" class="btn btn-primary">

    </form>
    
    </div>
</div>
