<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['submit_heading'])){
            $update_heading = sanitize_input($_POST['update_heading']);

            $update_heading_stmt = $connection->prepare("UPDATE home_page_features SET heading = ? WHERE id = 1");
            $update_heading_stmt->bind_param("s", $update_heading);
            $update_heading_stmt->execute();
            $update_heading_stmt->store_result();

            if($update_heading_stmt->affected_rows == 1){
                $success_edit_heading = "<p class='text-success'> Heading has been successfully updated. <a href='../index.php#features' target='_blank' > View </a> </p>";
            }

        }

        if(isset($_POST['add_features'])){
            $feat_icon        = sanitize_input($_POST['feat_icon']);
            $feat_description = sanitize_input($_POST['feat_description']);

            $add_features_stmt = $connection->prepare("INSERT INTO home_page_features (icon, description) VALUES (?, ?)");
            $add_features_stmt->bind_param( "ss", $feat_icon, $feat_description);
            if($add_features_stmt->execute()){
                $success_add_features = " <p class='text-success'> New features has been successfully added. <a href='../index.php#features' target='_blank' > View </a> </p> ";
            }

        }
        
    }

?>

<div class="card">
    <div class="card-header bg-primary text-white">
    <h1 class="text-center">HOME PAGE | features section add features</h1>
    </div>
    <div class="card-body">
    

<div class="row">
    <div class="col-lg-6">

    <?= isset($success_edit_heading) ? $success_edit_heading : "" ?>

    <h4>Features Heading text</h4>
    
    <form action="" method="post">

        <!-- GET HEADING STMT -->
        <?php 
            $get_heading_stmt = $connection->query("SELECT heading FROM home_page_features WHERE id = 1");
            $row = $get_heading_stmt->fetch_assoc();
            $heading =  $row['heading'];
        ?>

        <div class="form-group">
            <label for="my-input">Heading</label>
            <input autofocus id="my-input" class="form-control" type="text" name="update_heading" value= "<?= isset($heading)  ? $heading : "" ?> ">
        </div>

        <input type="submit" name="submit_heading" value="Change heading" class="btn btn-primary">

    </form>
    </div>

    <div class="col-lg-6">

        

        <div class="card bg-light">
            <div class="card-body">
                <?= isset($success_add_features) ? $success_add_features : ""   ?>
                <h3>Features to add</h3>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="my-input">Icon</label>
                        <input id="my-input" class="form-control" type="text" name="feat_icon">
                        <span>
                            <small>  For icon please refer to <a href="https://fontawesome.com/v5/search" target="_blank"> Font awesome </a> NOTE! pro icons will not be render in the website </small>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Description</label>
                        <textarea id="my-textarea" class="form-control" name="feat_description" rows="3"></textarea>
                    </div>

                    <input type="submit" name="add_features" value="add features" class="btn btn-primary">

                </form>
            </div>
        </div>

    </div>
</div>
        
    </div>
</div>
