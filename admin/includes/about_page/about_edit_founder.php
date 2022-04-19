<div class="card">
    <div class="card-header bg-info text-white">
        <h1 class="text-center  "> ABOUT PAGE | Founder section edit project founder</h1>        
    </div>
    <div class="card-body">        

 
 <?php 
    $edit_history_founder_stmt = $connection->query("SELECT id, project_founder_heading, project_founder_description, project_founder_image FROM about_page WHERE id = 1");
    // $edit_history_founder_stmt->bind_result( $id, $heading, $sub_heading, $image, $button_name, $button_color, $button_icon, $button_link);
    $row = $edit_history_founder_stmt->fetch_assoc();

    

    $edit_history_founder_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_founder'])){
         


            $edit_heading = sanitize_input($_POST['edit_heading']);
            $edit_description = sanitize_input($_POST['edit_description']);

            $edit_image = $_FILES['edit_image']['name'];
            $edit_image_temp = $_FILES['edit_image']['tmp_name'];


            move_uploaded_file($edit_image_temp, "../images/$edit_image");

            if(empty($edit_image)){
                $edit_image = $row['project_founder_image'];
            }

            $history_founder_update_stmt = $connection->prepare("UPDATE about_page SET project_founder_heading = ?, project_founder_description = ?, project_founder_image = ? WHERE id = 1");
            $history_founder_update_stmt->bind_param("sss", $edit_heading, $edit_description, $edit_image);
            $history_founder_update_stmt->execute();

            $history_founder_update_stmt->store_result();

            if($history_founder_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Project founder section has been successfully updated <a href='../about.php#founder' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Heading</label>
            <input id="my-input" class="form-control" type="text" name="edit_heading" value="<?=$row['project_founder_heading']?>">
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
                <label for="my-input">Project founder description</label>
                <textarea id="my-textarea" class="form-control" name="edit_description" rows="3"><?=$row['project_founder_description']?></textarea>
            </div>
        </div>

        
        <input type="submit" name="edit_founder" value="Submit" class="btn btn-primary">

    </form>
      
    </div>
</div>