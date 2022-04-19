<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['health_guide_submit'])){
            $health_guide = sanitize_input($_POST['health_guide']);

            $add_health_guide = $connection->prepare("INSERT INTO guide_page (health_guide) VALUES (?)");
            $add_health_guide->bind_param("s", $health_guide);
            if($add_health_guide->execute()){
                $success_health_guide_add = "<p class='text-success'>New health and safety guide has been successfully added. <a href='../guides.php' target='_blank' >View.</a></p>";
            }

        }

        
        if(isset($_POST['transport_guide_submit'])){
            $transport_guide = sanitize_input($_POST['transport_guide']);

            $add_transport_guide = $connection->prepare("INSERT INTO guide_page (transport_guide) VALUES (?)");
            $add_transport_guide->bind_param("s", $transport_guide);
            if($add_transport_guide->execute()){
                $success_transport_guide_add = "<p class='text-success'>New health and safety guide has been successfully added. <a href='../guides.php' target='_blank' >View.</a></p>";
            }

        }

        if(isset($_POST['important_guide_submit'])){
            $important_guide = sanitize_input($_POST['important_guide']);

            $add_important_guide = $connection->prepare("INSERT INTO guide_page (important_info) VALUES (?)");
            $add_important_guide->bind_param("s", $important_guide);
            if($add_important_guide->execute()){
                $success_important_guide_add = "<p class='text-success'>New health and safety guide has been successfully added. <a href='../guides.php' target='_blank' >View.</a></p>";
            }

        }

    }

?>

<div class="card">
    <div class="card-header bg-success text-white">
        <h1 class="text-center">GUIDE PAGE | Guides and Important info</h1>
    </div>
    <div class="card-body">
    

<div class="row">

    <div class="col-lg-6 ">

    <div class="card bg-light mb-5">
        <div class="card-body">
            <?= isset($success_health_guide_add) ? $success_health_guide_add : ""  ?>
            <h3>Health and Safety guides</h3>
            <hr>

            <form action="" method="post">
                <div class="form-group">
                    <label for="my-textarea">Message</label>
                    <textarea id="my-textarea" class="form-control" name="health_guide" rows="3" required></textarea>
                </div>
                <input type="submit" value="Add guide" name='health_guide_submit' class="btn btn-primary">
            </form>

        </div>
    </div>

    </div>

    <div class="col-lg-6">

        <div class="card bg-light mb-5">
            <div class="card-body">

                <?= isset($success_transport_guide_add) ? $success_transport_guide_add :  "" ?>

                <h3>Transportation guide</h3>
                <hr>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="my-textarea">Message</label>
                        <textarea id="my-textarea" class="form-control" name="transport_guide" rows="3" required></textarea>
                    </div>
                    <input type="submit" value="Add guide" name='transport_guide_submit' class="btn btn-primary">
                </form>

            </div>
        </div>
   
    </div>

    <div class="col-lg-6">

    <div class="card bg-light mb-5">
            <div class="card-body">

            <?= isset($success_important_guide_add) ? $success_important_guide_add : ""  ?>
                <h3>Important Info</h3>
                <hr>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="my-textarea">Message</label>
                        <textarea id="my-textarea" class="form-control" name="important_guide" rows="3" required></textarea>
                    </div>
                    <input type="submit" value="Add guide" name='important_guide_submit' class="btn btn-primary">
                </form>

            </div>
        </div>    
      
    </div>
        
    </div>
</div>
