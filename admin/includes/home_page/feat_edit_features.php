<div class="card">
    <div class="card-header bg-primary text-white">
    <h1 class="text-center "> HOME PAGE | Features section edit feature</h1>
    </div>
    <div class="card-body">
    
 
 <?php 
    $features_id = sanitize_input($_GET['id']);
    $edit_features_stmt = $connection->prepare("SELECT * FROM home_page_features WHERE id = ?");
    $edit_features_stmt->bind_param("i", $features_id);
    $edit_features_stmt->execute();
    $edit_features_stmt->bind_result( $id, $heading, $icon, $description);
    $row  = $edit_features_stmt->fetch();
    

    $edit_features_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_features'])){
         
            $edit_icon = sanitize_input($_POST['edit_icon']);
            $edit_description = sanitize_input($_POST['edit_description']);

            $features_update_stmt = $connection->prepare("UPDATE home_page_features SET icon = ?, description = ? WHERE id = ?");
            $features_update_stmt->bind_param("ssi", $edit_icon, $edit_description, $id);
            $features_update_stmt->execute();

            $features_update_stmt->store_result();

            if($features_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Feature has been successfully updated <a href='../index.php#features' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Icon</label>
            <input id="my-input" class="form-control" type="text" name="edit_icon" value="<?=$icon?>">
            <small>  For icon please refer to <a href="https://fontawesome.com/v5/search" target="_blank"> Font awesome </a> NOTE! pro icons will not be render in the website </small>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Description</label>
                <textarea id="my-textarea" class="form-control" name="edit_description" rows="3"><?=$description?></textarea>
            </div>
        </div>

        <input type="submit" name="edit_features" value="Submit" class="btn btn-primary">

    </form>
    
    </div>
</div>
