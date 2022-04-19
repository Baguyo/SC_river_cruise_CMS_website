<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['add_image'])){

            

            $extension = array("jpeg","jpg","png","gif");

            foreach ($_FILES['image']['tmp_name'] as $key => $value) {
                $file_name =  $_FILES['image']['name'][$key];
                $file_tmp = $_FILES['image']['tmp_name'][$key];
                 $ext =  pathinfo($file_name, PATHINFO_EXTENSION);
                
                if(in_array($ext, $extension)){
                    // echo "pota";
                    if(!file_exists("../images/$file_name")){
                        move_uploaded_file($file_tmp, "../images/$file_name");

                        $insert_gallery_image_stmt = $connection->prepare("INSERT INTO gallery_page (gallery_image_name) VALUES (?)");
                        $insert_gallery_image_stmt->bind_param("s", $file_name);

                        $insert_gallery_image_stmt->execute();

                        $success_message = "<p class='text-success'>Images has been uploaded successfully.</p> ";

                    }
                    else{
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, "../images/$newFileName");

                        $insert_gallery_image_stmt = $connection->prepare("INSERT INTO gallery_page (gallery_image_name) VALUES (?)");
                        $insert_gallery_image_stmt->bind_param("s", $newFileName);

                        $insert_gallery_image_stmt->execute();
                        $success_message = "<p class='text-success'>Images has been uploaded successfully. <a href='../gallery.php'> View </a> </p> ";

                    }
                //  echo $newFileName;

                }
                else{   
                    $error = array();
                    array_push($error,"$file_name, ");
                        // echo "pota";
                }
                
                
            }

            // print_r($error);

            
        }
    }

?>

    <div class="card">
        <div class="card-header bg-info text-white">
            <h1 class="text-center">GALLERY PAGE | add image</h1>
        </div>
        <div class="card-body">
            
            <?php
                if(isset($error)){
                   if(count($error) > 0){  
                        foreach($error as $file_error){
                            echo "<p class='text-danger'> Error ". $file_error . " File format not supported." ."</p>";
                        }
                   }
                }
                
            ?>
            <hr>

            <form method="post" action="" enctype="multipart/form-data">
                <?= isset($success_message) ? $success_message : "" ?>
                <div class="form-group">
                    <label for="my-input">Image</label>
                    <input id="my-input" class="form-control-file" type="file" name="image[]" multiple='multiple'>
                    <span>
                        <small>Note: Supported image format: .jpeg, .jpg, .png, .gif</small>
                    </span>
                    <br>
                    <span>
                        MAX IMAGE TO UPLOAD ONLY 100 IMAGES
                    </span>
                </div>

                <input type="submit" value="Add image" class="btn btn-primary" name="add_image">
            </form>

        </div>
    </div>