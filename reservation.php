<?php require_once "admin/includes/db.php" ?>
<?php require_once "admin/includes/function.php" ?>
<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        require_once 'vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact_number']) &&
        isset($_POST['number_of_guest']) && isset($_POST['date_of_arrival']) && isset($_POST['type_of_service'])){
            
            $name            = sanitize_input($_POST['name']);
            $email           = sanitize_input($_POST['email']);
            $contact_num     = sanitize_input($_POST['contact_number']);
            $guest_num       = sanitize_input($_POST['number_of_guest']);
            $date_of_arrival = sanitize_input($_POST['date_of_arrival']);
            $type_of_service = sanitize_input($_POST['type_of_service']);


            //
            $message_subject = "Reservation";

            
            $body="";

            
            $body .= "From ". $name . "<br>" ;
            $body .= "Email ". $email . "<br>" ;
            $body .= "Contact Number ". $contact_num . "<br>" ;
            $body .= "Number of Guest ". $guest_num . "<br>" ;
            $body .= "Date of arrival ". $date_of_arrival . "<br>" ;
            $body .= "Type of service ". $type_of_service . "<br>" ;

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
            $mail->setFrom($email, $name);
            $mail->ClearReplyTos();
            $mail->addReplyTo($email, $name);
            // $mail->AddReplyTo($email, $name); // Reply TO
            $mail->addAddress("sancarlosrivercruise@gmail.com");
            $mail->Subject = "$message_subject";
            $mail->Body = $body;

            $add_reservation_stmt = $connection->prepare("INSERT INTO admin_reservation( `name`, email, contact_number, guest_number, date_of_arrival, type_of_service) VALUES (?,?,?,?,?,?)");
            $add_reservation_stmt->bind_param("ssiiss", $name, $email, $contact_num, $guest_num, $date_of_arrival, $type_of_service);

            if($add_reservation_stmt->execute() && $mail->send()){
                    echo "success";
            }else{
                echo "error";
            }
        }


        if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_message'])){
            $contact_name = $_POST['contact_name'];
            $contact_email = $_POST['contact_email'];
            $contact_message = $_POST['contact_message'];
    
            $message_subject = "INQUIRY";
    
            $to = $contact_email;
            $body="";
    
            
            $body .= "From: ".$contact_name . "<br>";
            $body .= "Email: " . $contact_email . "<br>";
            $body .= "Message: " . $contact_message . "<br>";
            
    
    
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
            $mail->setFrom($contact_email, $contact_name);
            $mail->ClearReplyTos();
            $mail->addReplyTo($contact_email, $contact_name);
            // $mail->AddReplyTo($email, $name); // Reply TO
            $mail->addAddress("sancarlosrivercruise@gmail.com");
            $mail->Subject = "$message_subject";
            $mail->Body = $body;
    
            $add_queries_stmt = $connection->prepare("INSERT INTO admin_queries(`name`, email, `message`) VALUES (?,?,?)");
            $add_queries_stmt->bind_param("sss", $contact_name, $contact_email, $contact_message);
    
            if($mail->send() && $add_queries_stmt->execute()){
                echo "success";
            }else{
                echo "error";
            }
    
    
    }