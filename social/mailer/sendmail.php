<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

if(isset($_POST['send'])){
print_r($_FILES);

$email = $_POST['email'];
$subject = $_POST['subject']??'Authentication Code';
$message = $_POST['message']??'Your authentication code is <b>Random Code</b> Please verify it.';
$senderName = $_POST['senderName']??'Authentication';

    try {
       
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'timroMail@gmail.com';                     
        $mail->Password   = 'password';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          
        $mail->Port       = 587;                                     
    
        
        $mail->setFrom('nikhilawasthi944@gmail.com', $senderName);
           
        $mail->addAddress($email);               
        
        if($_FILES['attachment']['name']!=null){
            if(move_uploaded_file($_FILES['attachment']['tmp_name'],"uploads/{$_FILES['attachment']['name']}")){
        $mail->addAttachment("uploads/{$_FILES['attachment']['name']}");    

            }
    
        }
           
    
        
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();   
        echo '<script>window.location.href="../assets/html/signup.html?message_sent";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
