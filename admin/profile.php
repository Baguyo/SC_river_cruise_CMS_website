
<?php require_once "includes/header.php" ?>

<?php 
    $get_admin_profile = $connection->query("SELECT * FROM admin_profile WHERE id = 1 LIMIT 1");
    $db_admin_row = $get_admin_profile->fetch_assoc();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['update_profile'])){

            $update_username = sanitize_input($_POST['update_username']);
            $update_password = sanitize_input($_POST['update_password']);
            $update_contact = sanitize_input($_POST['update_contact']);
            $update_email =  sanitize_input($_POST['update_email']);

            if(empty($update_password)){
                 $update_password = $db_admin_row['password'];
            }else{
                 $update_password = password_hash($update_password, PASSWORD_BCRYPT, array('cost'=> 12));
            }

            $update_admin_stmt = $connection->prepare("UPDATE admin_profile SET username = ?, `password` = ?, contact_number = ?, email = ? WHERE id = 1");
            $update_admin_stmt->bind_param("ssis", $update_username, $update_password, $update_contact, $update_email);
            $update_admin_stmt->execute();
            $update_admin_stmt->store_result();

            if($update_admin_stmt->affected_rows == 1){
                $success_message = "<p class='text-success'> Admin profile has been successfully updated. </p>";
            }
            

        }
    }
?>
    
    <div class="wrapper">
        
        <?php require_once "includes/navigation.php" ?>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <h1 class="text-center">ADMIN PROFILE</h1>
                                </div>
                                <div class="card-body">
                                    
                                    <?= isset($success_message) ? $success_message: "" ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="my-input">Username</label>
                                            <input id="my-input" class="form-control" type="text" name="update_username" value="<?= $db_admin_row['username'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Password</label>
                                            <input id="my-input" class="form-control" type="text" name="update_password" >
                                            <span>
                                                <small >Leave it empty if you don't want to update current password</small>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Contact number</label>
                                            <input id="my-input" class="form-control" type="number" name="update_contact" value="<?= $db_admin_row['contact_number'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Email</label>
                                            <input id="my-input" class="form-control" type="email" name="update_email" value="<?= $db_admin_row['email'] ?>">
                                        </div>
                                        <input type="submit" value="Update profile" class="btn btn-primary" name="update_profile" >

                                    </form>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>




<?php  require_once "includes/footer.php" ?>