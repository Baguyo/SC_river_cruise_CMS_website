<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['submit_heading'])){
            $update_heading = sanitize_input($_POST['update_heading']);

            $update_heading_stmt = $connection->prepare("UPDATE home_page_features_img SET heading = ? WHERE id = 1");
            $update_heading_stmt->bind_param("s", $update_heading);
            $update_heading_stmt->execute();
            $update_heading_stmt->store_result();

            if($update_heading_stmt->affected_rows == 1){
                $success_edit_heading = "<p class='text-success'> Heading has been successfully updated. <a href='../index.php#features_img' target='_blank' > View </a> </p>";
            }

        }

        if(isset($_POST['add_features'])){
            $feat_img_caption        = sanitize_input($_POST['feat_img_caption']);

            //FILE
            $feat_img_name = $_FILES['feat_img_file']['name'];
            $feat_img_temp = $_FILES['feat_img_file']['tmp_name'];

            move_uploaded_file($feat_img_temp, "../images/$feat_img_name");


            $add_features_stmt = $connection->prepare("INSERT INTO home_page_features_img (img_name, img_caption ) VALUES (?, ?)");
            $add_features_stmt->bind_param( "ss", $feat_img_name, $feat_img_caption);
            if($add_features_stmt->execute()){
                $success_add_features = " <p class='text-success'> New features has been successfully added. <a href='../index.php#features_img' target='_blank' > View </a> </p> ";
            }

        }
        
    }

?>

<div class="card">
    <div class="card-header bg-primary text-white">
    <h1 class="text-center">HOME PAGE | Features image section add Image</h1>
    </div>
    <div class="card-body">
    
<hr>
<div class="row">
    <div class="col-lg-6">

    <?= isset($success_edit_heading) ? $success_edit_heading : "" ?>

    <h4>Features Image Heading text</h4>
    
    <form action="" method="post">

        <!-- GET HEADING STMT -->
        <?php 
            $get_heading_stmt = $connection->query("SELECT heading FROM home_page_features_img WHERE id = 1");
            $row = $get_heading_stmt->fetch_assoc();
            $heading =  $row['heading'];
        ?>

        <div class="form-group">
            <label for="my-textarea">Heading</label>
            <textarea autofocus id="my-textarea" class="form-control" name="update_heading" rows="3"><?=$heading?></textarea>
        </div>

        <input type="submit" name="submit_heading" value="Change heading" class="btn btn-primary">

    </form>
    </div>

    <div class="col-lg-6">

        

        <div class="card bg-light">
            <div class="card-body">
                <?= isset($success_add_features) ? $success_add_features : ""   ?>
                <h3>Features image to add</h3>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="my-input">caption</label>
                        <input id="my-input" class="form-control" type="text" name="feat_img_caption">
                    </div>

                    <div class="form-group">
                        <label for="my-input">Image</label>
                        <input id="my-input" class="form-control-file" type="file" name="feat_img_file">
                    </div>

                    <input type="submit" name="add_features" value="add features" class="btn btn-primary">

                </form>
            </div>
        </div>

    </div>
</div>

    </div>
</div>
