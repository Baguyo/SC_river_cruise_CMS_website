<div class="card">
    <div class="card-header bg-info text-white">
        <h1 class="text-center "> ABOUT PAGE | History section edit history</h1>
    </div>
    <div class="card-body">
        

 
 <?php 
    $edit_history_stmt = $connection->query("SELECT id, history_caption, history_heading, history_description, history_image FROM about_page WHERE id = 1");
    // $edit_history_stmt->bind_result( $id, $heading, $sub_heading, $image, $button_name, $button_color, $button_icon, $button_link);
    $row = $edit_history_stmt->fetch_assoc();

    

    $edit_history_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_history'])){
         


            $edit_heading = sanitize_input($_POST['edit_heading']);
            $edit_caption = sanitize_input($_POST['edit_caption']);
            $edit_description = sanitize_input($_POST['edit_description']);

            $edit_image = $_FILES['edit_image']['name'];
            $edit_image_temp = $_FILES['edit_image']['tmp_name'];


            move_uploaded_file($edit_image_temp, "../images/$edit_image");

            if(empty($edit_image)){
                $edit_image = $row['history_image'];
            }

            $history_update_stmt = $connection->prepare("UPDATE about_page SET history_heading = ?, history_caption = ?, history_description = ?, history_image = ? WHERE id = 1");
            $history_update_stmt->bind_param("ssss", $edit_heading, $edit_caption,  $edit_description, $edit_image);
            $history_update_stmt->execute();

            $history_update_stmt->store_result();

            if($history_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> History section has been successfully updated <a href='../about.php#history' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Heading</label>
            <input id="my-input" class="form-control" type="text" name="edit_heading" value="<?=$row['history_heading']?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Sub heading / caption</label>
                <textarea id="my-textarea" class="form-control" name="edit_caption" rows="3"><?=$row['history_caption']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Image</label>
            <br>
            <input id="my-input" class="" type="file" name="edit_image">
            <br>
            <span>
                <small>Leave it empty if you don't want to update current image.</small>
            </span>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="my-input">History description</label>
                <textarea id="my-textarea" class="form-control" name="edit_description" rows="3"><?=$row['history_description']?></textarea>
            </div>
        </div>

        
        <input type="submit" name="edit_history" value="Submit" class="btn btn-primary">

    </form>
      
    </div>
</div>