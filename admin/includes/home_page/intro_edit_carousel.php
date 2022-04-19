<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center "> HOME PAGE | Introduction section edit carousel</h1>
    </div>
    <div class="card-body">
        

 
 <?php 
    $carousel_id = sanitize_input($_GET['id']);
    $edit_carousel_stmt = $connection->prepare("SELECT * FROM home_page_intro WHERE id = ?");
    $edit_carousel_stmt->bind_param("i", $carousel_id);
    $edit_carousel_stmt->execute();
    $edit_carousel_stmt->bind_result( $id, $heading, $sub_heading, $image, $button_name, $button_color, $button_icon, $button_link);
    $edit_carousel_stmt->fetch();

    $edit_carousel_stmt->close();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['edit_carousel'])){
         
            $edit_heading = sanitize_input($_POST['edit_heading']);
            $edit_description = sanitize_input($_POST['edit_description']);

            $edit_image = $_FILES['edit_image']['name'];
            $edit_image_temp = $_FILES['edit_image']['tmp_name'];

            $edit_button_name = sanitize_input($_POST['edit_button_name']);
            $edit_button_color = sanitize_input($_POST['edit_button_color']);
            $edit_button_icon = sanitize_input($_POST['edit_button_icon']);
            $edit_button_link = sanitize_input($_POST['edit_button_link']);

            move_uploaded_file($edit_image_temp, "../images/$edit_image");

            if(empty($edit_image)){
                $edit_image = $image;
            }

            $carousel_update_stmt = $connection->prepare("UPDATE home_page_intro SET intro_heading = ?, intro_sub_heading = ?, intro_image = ?, intro_button_name = ?, intro_button_color = ?, intro_button_icon = ?, intro_button_link = ? WHERE id = ?");
            $carousel_update_stmt->bind_param("sssssssi", $edit_heading, $edit_description, $edit_image, $edit_button_name, $edit_button_color, $edit_button_icon, $edit_button_link, $id);
            $carousel_update_stmt->execute();

            $carousel_update_stmt->store_result();

            if($carousel_update_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Carousel has been successfully updated <a href='../index.php' target='__blank'> View. </a> </p>";
            }
            
            
        }
    }
    
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($success_message) ? $success_message : "" ?>
        <div class="form-group">
            <label for="my-input">Heading</label>
            <input id="my-input" class="form-control" type="text" name="edit_heading" value="<?=$heading?>">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Sub heading / Description</label>
                <textarea id="my-textarea" class="form-control" name="edit_description" rows="3"><?=$sub_heading?></textarea>
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

        <h4 class="mt-5 mb-3">FOR BUTTON TO INCLUDE IF ANY</h4>

        <div class="form-group">
            <label for="my-input">Button name</label>
            <input id="my-input" class="form-control" type="text" name="edit_button_name" value="<?= $button_name ?>">
        </div>

        <div class="form-group">
            <label for="my-input">Button Color</label>
            <br>
            <input id="my-input" class="form-control" type="text" name="edit_button_color" value="<?= $button_color ?>">
            <span>
                <small>
                    e.i. <b>red, rgba(0,0,0), #f7f7f7 you may refer to this link</b>
                    <a href="https://colorpicker.me/" target="_blank"> Color picker</a>
                </small>
            </span>
        </div>

        <div class="form-group">
            <label for="my-input">Button icon</label>
            <input id="my-input" class="form-control" type="text" name="edit_button_icon"value="<?= $button_icon ?>" >
            <span>
                <small>
                    e.i <b>fab fa-500px</b> Only 5.15.4 font awesome icons are valid </i>
                    <a href="https://fontawesome.com/v5/search" target="_blank"> Font awesome </a>
                </small>
            </span>
        </div>

        <div class="form-group">
            <label for="my-input">Button link to follow</label>
            <input id="my-input" class="form-control" type="text" name="edit_button_link" value="<?= $button_link ?>">
            <Span>
                <small><b>List of your pages:</b></small>
                <br>
            </Span>
                <?php 
                $handle = glob('../*.html');
                foreach ($handle as $value) {
                    if(is_file($value)){
                        // echo $value;
                        $new_value =  str_replace(array("..","/"), "", $value);
                        echo $new_value . "<br>";
                        // echo "<a href='$value' > hello </a>";
                    }
                }
                ?>
        </div>
        
        <input type="submit" name="edit_carousel" value="Submit" class="btn btn-primary">

    </form>
      
    </div>
</div>