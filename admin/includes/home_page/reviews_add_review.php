<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['submit_heading'])){
            $update_heading = sanitize_input($_POST['update_heading']);

            $update_heading_stmt = $connection->prepare("UPDATE home_page_reviews SET heading = ? WHERE id = 1");
            $update_heading_stmt->bind_param("s", $update_heading);
            $update_heading_stmt->execute();
            $update_heading_stmt->store_result();

            if($update_heading_stmt->affected_rows == 1){
                $success_edit_heading = "<p class='text-success'> Heading has been successfully updated. <a href='../index.php#reviews' target='_blank' > View </a> </p>";
            }

        }

        if(isset($_POST['add_review'])){
            $author           = sanitize_input($_POST['review_author']);
            $message = sanitize_input($_POST['review_message']);

            $add_review_stmt = $connection->prepare("INSERT INTO home_page_reviews (author, review) VALUES (?, ?)");
            $add_review_stmt->bind_param( "ss", $author, $message);
            if($add_review_stmt->execute()){
                $success_add_review = " <p class='text-success'> New review has been successfully added. <a href='../index.php#reviews' target='_blank' > View </a> </p> ";
            }

        }
        
    }

?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">HOME PAGE | Reviews section add review</h1> 
    </div>
    <div class="card-body">
    
<hr>
<div class="row">
    <div class="col-lg-6">

    <?= isset($success_edit_heading) ? $success_edit_heading : "" ?>

    <h4>Review Heading text</h4>
    
    <form action="" method="post">

        <!-- GET HEADING STMT -->
        <?php 
            $get_heading_stmt = $connection->query("SELECT heading FROM home_page_reviews WHERE id = 1");
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
                <?= isset($success_add_review) ? $success_add_review : ""   ?>
                <h3>Reviews to add</h3>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="my-input">Author</label>
                        <input id="my-input" class="form-control" type="text" name="review_author">
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Message</label>
                        <textarea id="my-textarea" class="form-control" name="review_message" rows="3"></textarea>
                    </div>

                    <input type="submit" name="add_review" value="add review" class="btn btn-primary">

                </form>
            </div>
        </div>

    </div>
</div>
        
    </div>
</div>
