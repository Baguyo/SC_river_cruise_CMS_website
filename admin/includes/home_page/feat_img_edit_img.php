<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center "> HOME PAGE | Features image section edit image</h1>
    </div>
    <div class="card-body">
        


<hr>
<?php 
   $features_img_id = sanitize_input($_GET['id']);
   $edit_features_img_stmt = $connection->prepare("SELECT img_caption, img_name FROM home_page_features_img WHERE id = ?");
   $edit_features_img_stmt->bind_param("i", $features_img_id);
   $edit_features_img_stmt->execute();
   $edit_features_img_stmt->bind_result(  $caption, $image_name);
   $row  = $edit_features_img_stmt->fetch();
   

   $edit_features_img_stmt->close();

   if($_SERVER['REQUEST_METHOD'] == "POST"){
       if(isset($_POST['edit_features_img'])){
        
           $edit_caption = sanitize_input($_POST['edit_caption']);

           //FILE
           $edit_img = $_FILES['edit_image']['name'];
           $edit_img_temp = $_FILES['edit_image']['tmp_name'];

           move_uploaded_file($edit_img_temp, "../images/$edit_img");

           if(empty($edit_img)){
               $edit_img = $image_name;
           }

           $features_img_update_stmt = $connection->prepare("UPDATE home_page_features_img SET img_name = ?, img_caption = ? WHERE id = ?");
           $features_img_update_stmt->bind_param("ssi", $edit_img, $edit_caption, $features_img_id);
           $features_img_update_stmt->execute();

           $features_img_update_stmt->store_result();

           if($features_img_update_stmt->affected_rows == 1){
               $success_message = "<p class='text-success'> Feature has been successfully updated <a href='../index.php#features_img' target='__blank'> View. </a> </p>";
           }
           
           
       }
   }
   
?>
   <form action="" method="post" enctype="multipart/form-data">
       <?= isset($success_message) ? $success_message : "" ?>
       <div class="form-group">
           <label for="my-input">Caption</label>
           <input id="my-input" class="form-control" type="text" name="edit_caption" value="<?=$caption?>">
       </div>
       
       <div class="form-group">
           <label for="my-input">Image</label>
           <input id="my-input" class="form-control-file" type="file" name="edit_image">
           <small>Leave it blank if you don't want to update current image.</small>
       </div>

       <input type="submit" name="edit_features_img" value="Submit" class="btn btn-primary">

   </form>
   
    </div>
</div>
