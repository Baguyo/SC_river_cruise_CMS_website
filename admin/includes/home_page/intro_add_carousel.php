 <div class="card">
     <div class="card-header bg-primary text-white">
        <h1 class="text-center "> HOME PAGE | Introduction section add carousel</h1>
     </div>
     <div class="card-body">
        

 
 <?php 
 
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        
        if(isset($_POST['add_submit'])){
            $heading = sanitize_input($_POST['add_heading']);
        $sub_heading = sanitize_input($_POST['add_description']);
        
        //FILES
        $image_name = $_FILES['add_image']['name'];
        $image_temp = $_FILES['add_image']['tmp_name'];

        $btn_name = sanitize_input($_POST['add_button_name']);
        $btn_color = sanitize_input($_POST['add_button_color']);
        $btn_icon = sanitize_input($_POST['add_button_icon']);
        $btn_link = sanitize_input($_POST['add_button_link']);

        move_uploaded_file($image_temp, "../images/$image_name");

        $stmt_add_carousel = $connection->prepare("INSERT INTO home_page_intro( intro_heading, intro_sub_heading, intro_image, intro_button_name, intro_button_color, intro_button_icon, intro_button_link) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt_add_carousel->bind_param("sssssss", $heading, $sub_heading, $image_name, $btn_name, $btn_color, $btn_icon, $btn_link);
        if($stmt_add_carousel->execute()){
            $add_message = "<p class='text-success'>New home page introduction has been successfully added. <a href='../index.php' target='_blank'> View </a></p>";
        }
        }
        
        
    }
 ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?= isset($add_message) ? $add_message : "" ?>
        <div class="form-group">
            <label for="my-input">Heading</label>
            <input id="my-input" class="form-control" type="text" name="add_heading">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="my-input">Sub heading / Description</label>
                <textarea id="my-textarea" class="form-control" name="add_description" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Image</label>
            <br>
            <input id="my-input" class="" type="file" name="add_image">
        </div>

        <h4 class="mt-5 mb-3">FOR BUTTON TO INCLUDE IF ANY</h4>

        <div class="form-group">
            <label for="my-input">Button name</label>
            <input id="my-input" class="form-control" type="text" name="add_button_name">
        </div>

        <div class="form-group">
            <label for="my-input">Button Color</label>
            <br>
            <input id="my-input" class="form-control" type="text" name="add_button_color">
            <span>
                <small>
                    e.i. <b>red, rgba(0,0,0), #f7f7f7 you may refer to this link</b>
                    <a href="https://colorpicker.me/" target="_blank"> Color picker</a>
                </small>
            </span>
        </div>

        <div class="form-group">
            <label for="my-input">Button icon</label>
            <input id="my-input" class="form-control" type="text" name="add_button_icon">
            <span>
                <small>
                    e.i <b>fab fa-500px</b> Only 5.15.4 font awesome icons are valid </i>
                    <a href="https://fontawesome.com/v5/search" target="_blank"> Font awesome </a>
                </small>
            </span>
        </div>

        <div class="form-group">
            <label for="my-input">Button link to follow</label>
            <input id="my-input" class="form-control" type="text" name="add_button_link">
            <Span>
                <small><b>List of your pages:</b></small>
                <br>
            </Span>
                <?php 
                $handle = glob('../*.php');
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
        
        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary">

    </form>
      
     </div>
 </div>