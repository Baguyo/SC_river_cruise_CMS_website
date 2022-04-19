 <div class="card">
     <div class="card-header text-white bg-info">
        <h1 class="text-center "> ABOUT PAGE | STAFF section add staff</h1>         
     </div>
     <div class="card-body">
        
 
 
 <?php 
 
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['add_staff'])){
            
        $name = sanitize_input($_POST['staff_name']);
        $description = sanitize_input($_POST['staff_description']);
        
        //FILES
        $image_name = $_FILES['staff_image']['name'];
        $image_temp = $_FILES['staff_image']['tmp_name'];


        move_uploaded_file($image_temp, "../images/$image_name");

        $stmt_add_carousel = $connection->prepare("INSERT INTO about_page_staff( `name`, `description` , staff_image) VALUES(?, ?, ?)");
        $stmt_add_carousel->bind_param("sss", $name, $description, $image_name);
        if($stmt_add_carousel->execute()){
            $add_message = "<p class='p-2 text-success text-white'>New Staff has been successfully added <a href='../about.php#staff'> View </a> </p>";
        }
        }
    }
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($add_message) ? $add_message : "" ?>
        <div class="form-group">
            <label for="my-input">Name</label>
            <input id="my-input" class="form-control" type="text" name="staff_name">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Description</label>
                <textarea id="my-textarea" class="form-control" name="staff_description" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Image</label>
            <br>
            <input id="my-input" class="" type="file" name="staff_image">
        </div>

        
        
        <input type="submit" name="add_staff" value="Submit" class="btn btn-primary">

    </form>
      
     </div>
 </div>