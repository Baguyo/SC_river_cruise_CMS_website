
<?php require_once "admin/includes/db.php" ?>
<?php require_once "admin/includes/function.php" ?>
<?php session_start() ?>
<?php ob_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bacungan River Cruise</title>
        <link rel = "icon" href="images/logo.png" type = "image/x-icon">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
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