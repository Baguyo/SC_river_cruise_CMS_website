<div class="card">
    <div class="card-header bg-info text-white">
        <h1 class="text-center text-dark "> ABOUT PAGE | Staff section edit staff</h1>        
    </div>
    <div class="card-body">
        

 
 <?php 
    $staff_id = sanitize_input($_GET['id']);
    $edit_staff_stmt = $connection->prepare("SELECT * FROM about_page_staff WHERE id = ?");
    $edit_staff_stmt->bind_param("i", $staff_id);
    $edit_staff_stmt->execute();
    $edit_staff_stmt->bind_result( $id, $name, $description, $image);
    $edit_staff_stmt->fetch();

    $edit_staff_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_staff'])){
         
            $edit_name = sanitize_input($_POST['edit_name']);
            $edit_description = sanitize_input($_POST['edit_description']);

            $edit_image = $_FILES['edit_image']['name'];
            $edit_image_temp = $_FILES['edit_image']['tmp_name'];

            move_uploaded_file($edit_image_temp, "../images/$edit_image");

            if(empty($edit_image)){
                $edit_image = $image;
            }

            $staff_update_stmt = $connection->prepare("UPDATE about_page_staff SET `name` = ?, `description` = ?, staff_image = ? WHERE id = ?");
            $staff_update_stmt->bind_param("sssi", $edit_name, $edit_description, $edit_image, $id);
            $staff_update_stmt->execute();

            $staff_update_stmt->store_result();

            if($staff_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> staff has been successfully updated <a href='../about.php#staff' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Heading</label>
            <input id="my-input" class="form-control" type="text" name="edit_name" value="<?=$name?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Sub heading / Description</label>
                <textarea id="my-textarea" class="form-control" name="edit_description" rows="3"><?=$description?></textarea>
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

        
        <input type="submit" name="edit_staff" value="Submit" class="btn btn-primary">

    </form>
      
    </div>
</div>