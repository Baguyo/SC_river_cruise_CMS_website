<?php 

    require_once "admin/includes/db.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    require_once 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    if(isset($_POST['email']) && isset($_POST['message']) && isset($_POST['id'])){
            
            
            $email = $_POST['email'];
            $message = $_POST['message'];
            $id = $_POST['id'];

            $message_subject = "Reservation";

            $to = $email;
            $body="";

            
            $body .= $message;
            


            //REQUIRED FILES
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
        
            //OBJECT CREATE
            $mail = new PHPMailer();
    
            //SMTP SETTINGS
            $mail->isSMTP();
            $mail->Host = $_ENV['server'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['email'];
            $mail->Password = $_ENV['password'];
            $mail->Port = $_ENV['port'];
            $mail->SMTPSecure = $_ENV['secure'];
        
             //Email settings
            $mail->isHTML(true);
            $mail->setFrom("sancarlosrivercruise@gmail.com", "SC river cruise");
            $mail->ClearReplyTos();
            $mail->addReplyTo("sancarlosrivercruise@gmail.com", "SC river cruise");
            // $mail->AddReplyTo($email, $name); // Reply TO
            $mail->addAddress($email);
            $mail->Subject = "$message_subject";
            $mail->Body = "<pre>". $body ."</pre>";


           if($mail->send()){
            
            $update_mailed_status = $connection->prepare("UPDATE admin_reservation set Mailed = 'Yes' WHERE id = ?");
            $update_mailed_status->bind_param("i", $id);
            $update_mailed_status->execute();
        
                echo "success";
           }else{
               echo "error";
           }


    }
    //queries US
    if(isset($_POST['queries_id']) && isset($_POST['queries_email']) && isset($_POST['queries_message'])){
        $queries_id = $_POST['queries_id'];
        $queries_email = $_POST['queries_email'];
        $queries_message = $_POST['queries_message'];

        $message_subject = "INQUIRY";

        
        $body="";

        
    
        $body .= $queries_message ;
        


        //REQUIRED FILES
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
    
        //OBJECT CREATE
        $mail = new PHPMailer();

        //SMTP SETTINGS
        $mail->isSMTP();
        $mail->Host = $_ENV['server'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['email'];
        $mail->Password = $_ENV['password'];
        $mail->Port = $_ENV['port'];
        $mail->SMTPSecure = $_ENV['secure'];
    
         //Email settings
        $mail->isHTML(true);
        $mail->setFrom("sancarlosrivercruise@gmail.com", "SC river cruise");
        $mail->ClearReplyTos();
        $mail->addReplyTo("sancarlosrivercruise@gmail.com", "SC river cruise");
        // $mail->AddReplyTo($email, $name); // Reply TO
        $mail->addAddress($queries_email);
        $mail->Subject = "$message_subject";
        $mail->Body = $body;


        if($mail->send()){

            $update_mailed_status = $connection->prepare("UPDATE admin_queries set Mailed = 'Yes' WHERE id = ?");
            $update_mailed_status->bind_param("i", $queries_id);
            $update_mailed_status->execute();

            echo "success";
        }else{
            echo "error";
        }


}
    
?>