
<?php require_once "includes/header.php" ?>
<?php 

    if( isset($_SESSION['login'])){
        if($_SESSION['login']){
            header("Location: admin");
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = sanitize_input($_POST['username']);
        $password = sanitize_input($_POST['password']);

        $fetch_admin_info_stmt = $connection->query("SELECT username, password FROM admin_profile");
        $row = $fetch_admin_info_stmt->fetch_assoc();

        $db_username =  $row['username'];
        $db_password = $row['password'];
        
        if(password_verify($password,$db_password)){
            $_SESSION['login'] = true;
            header("Location: admin");
        }else{
            $error_message = "Incorrect username or password";
        }

    }
?>

        
            <div class="container login">
            <div class="col-lg-5 col-md-6 col-md-offset-6  form-login">
                    <section class="">
                        <form action="" class="p-2" method="post">
            
                            <fieldset class=" p-3">
                                <legend>
                                    <img src="images/logo.png" alt="" class="w-auto" height="100px">
                                </legend>
                                <h3 class="">ADMIN LOGIN</h3>
                                <?= isset($error_message) ? "<p class='text-danger' > <b>$error_message</b> </p>" :  "" ?>
                                <div class="form-group">
                                    <label for="my-input">Username</label>
                                    <input id="my-input" class="form-control" type="text" name="username" autocomplete="off" value='<?=isset($username) ? $username : "" ?>'>
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Password</label>
                                    <input id="my-input" class="form-control" type="password" name="password" autocomplete="off" value="<?= isset($password) ?$password : "" ?>">
                                </div>

                                <input type="submit" value="submit" name="login" class="btn btn-primary">
                            </fieldset>
                            
                            
                        </form>
                    </section>
                </div>
            </div>
         
            
        
        

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>