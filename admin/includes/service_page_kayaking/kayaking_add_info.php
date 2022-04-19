<?php 

        $get_service_information = $connection->query("SELECT kayaking_description, kayaking_services FROM service_page_kayaking WHERE id = 1");
        $information_row = $get_service_information->fetch_assoc();

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['add_information'])){
                $description = sanitize_input($_POST['description']);
                $services = sanitize_input($_POST['service']);

                $update_kayaking_service_stmt = $connection->prepare("UPDATE service_page_kayaking SET kayaking_description = ?, kayaking_services = ? WHERE id = 1");
                $update_kayaking_service_stmt->bind_param("ss", $description, $services);
                $update_kayaking_service_stmt->execute();

                    $update_kayaking_service_stmt->store_result();

                    if($update_kayaking_service_stmt->affected_rows == 1){
                        $success_update_service = "<p class='text-success'> Kayaking service information has been successfully updated. <a href='../services.php'> View </a> </p>";
                    }

                    $error = array();
                    if(!empty($_FILES['image'])){

                        $extension = array("jpeg","jpg","png","gif");

                        foreach ($_FILES['image']['tmp_name'] as $key => $value) {

                            $file_name =  $_FILES['image']['name'][$key];
                            $file_tmp = $_FILES['image']['tmp_name'][$key];
                            $ext =  pathinfo($file_name, PATHINFO_EXTENSION);
                            
                            if(in_array($ext, $extension)){
                                // echo "pota";
                                if(!file_exists("../images/$file_name")){
                                    move_uploaded_file($file_tmp, "../images/$file_name");

                                    $insert_service_image_stmt = $connection->prepare("INSERT INTO service_page_kayaking (kayaking_image_name) VALUES (?)");
                                    $insert_service_image_stmt->bind_param("s", $file_name);

                                    $insert_service_image_stmt->execute();

                                    $success_message_upload = "<p class='text-success'>Images has been uploaded successfully. <a href='../services.php' target='_blank'> View </a> </p> ";

                                }
                                else{
                                    $filename=basename($file_name,$ext);
                                    $newFileName=$filename.time().".".$ext;
                                    move_uploaded_file($file_tmp, "../images/$newFileName");

                                    $insert_service_image_stmt = $connection->prepare("INSERT INTO service_page_kayaking (kayaking_image_name) VALUES (?)");
                                    $insert_service_image_stmt->bind_param("s", $newFileName);

                                    $insert_service_image_stmt->execute();
                                    $success_message_upload = "<p class='text-success'>Images has been uploaded successfully. <a href='../services.php' target='_blank'> View </a> </p> ";

                                }
                            //  echo $newFileName;

                            }
                            else{   
                                $error[] = $file_name;
                                    // echo "pota";
                            }
                            
                            
                        }


                    }
                
                // $services = explode('\r\n', $information);
                // print_r($services);                
            }
        }


?>

<div class="card">
    <div class="card-header bg-warning text-white">
        <h1 class="text-center">SERVICE PAGE | Kayaking add info</h1>
    </div>
    <div class="card-body bg-light">

        

        <?= isset($success_update_service) ? $success_update_service : "" ?>
        <?= isset($success_message_upload) ? $success_message_upload : "" ?>

        <?php 

            
                if(!empty($error)){
                    
                        foreach ($error as $key => $value) {
                            if(!empty($value)){
                                echo "<p class='text-danger'> Error ".  $value ." File format not supported </p>" ;
                            }
                            // echo $value;
                            
                        }
                    
                }
        

            
        ?>


        <form action="" method="post" enctype="multipart/form-data">

        
            <div class="form-group">
                <label for="my-textarea">Description</label>
                <textarea autofocus id="my-textarea" class="form-control" name="description" rows="3"><?= $information_row['kayaking_description']?></textarea>
            </div>


            <div class="form-group">
                <label for="my-textarea">Service to offer</label>
                <textarea id="my-textarea" class="form-control" name="service" rows="2"><?=  str_replace( array('\r\n', '\n', '\r'), "\r\n", $information_row['kayaking_services'] ) ?></textarea>
                <span>
                <small>NOTE! ONE SERVICE PER LINE</small>
                </span>
                
            </div>


            <div class="form-group">
                <label for="my-input">Image to add</label>
                <input id="my-input" class="form-control-file" type="file" name="image[]" multiple='multiple'>
                <span>
                        <small>Note: Supported image format: .jpeg, .jpg, .png, .gif</small>
                    </span>
            </div>

            <input type="submit" name='add_information' class="btn btn-primary"  value="Submit">

        </form>

    </div>
</div>