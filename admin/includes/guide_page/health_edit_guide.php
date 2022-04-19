<div class="card">
    <div class="card-header text-white bg-success">
        <h1 class="text-center"> GUIDE PAGE | Guide section edit guide</h1>        
    </div>
    <div class="card-body">
    
 
 <?php 
    $guide_id = sanitize_input($_GET['id']);
    $edit_guide_stmt = $connection->prepare("SELECT * FROM guide_page WHERE id = ?");
    $edit_guide_stmt->bind_param("i", $guide_id);
    $edit_guide_stmt->execute();
    $edit_guide_stmt->bind_result( $id, $health_guide, $transport_guide, $important_info);
    $row  = $edit_guide_stmt->fetch();
    
    if(!is_null($health_guide) && is_null($transport_guide) && is_null($important_info) ){
        $column = "health_guide";
        $message = $health_guide;

    }elseif( is_null($health_guide) && !is_null($transport_guide) && is_null($important_info) ) {
        $column = "transport_guide";
        $message = $transport_guide;

    }elseif( is_null($health_guide) && is_null($transport_guide) && !is_null($important_info) ) {
        $column = "important_info";
        $message = $important_info;
    }

    $edit_guide_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_guide'])){
         
            $edit_guide_message = sanitize_input($_POST['edit_guide_message']);

            $guide_update_stmt = $connection->prepare("UPDATE guide_page SET $column = ? WHERE id = ?");
            $guide_update_stmt->bind_param("si", $edit_guide_message, $id);
            $guide_update_stmt->execute();

            $guide_update_stmt->store_result();

            if($guide_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Guide has been successfully updated <a href='../guides.php' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Message</label>
                <textarea id="my-textarea" class="form-control" name="edit_guide_message" rows="3"><?=$message?></textarea>
            </div>
        </div>

        <input type="submit" name="edit_guide" value="Submit" class="btn btn-primary">

    </form>
    
    </div>
</div>
