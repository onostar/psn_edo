<?php 
    include "connections.php";
    session_start();
    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";


    $mess_to = htmlspecialchars(stripslashes($_POST['recipient']));
    $mess_subject = htmlspecialchars(stripslashes($_POST['ind_subject']));
    $mess_message = htmlspecialchars(stripslashes($_POST['ind__message']));
    $mailHeader = "From: Admin";

    $send_message = $connectdb->prepare("INSERT INTO notifications (not_subject, not_message, user_id) VALUES(:not_subject, :not_message, :user_id)");
    $send_message->bindvalue("not_subject", $mess_subject);
    $send_message->bindvalue("not_message", $mess_message);
    $send_message->bindvalue("user_id", $to);
    $send_message->execute();
        //send mail
        // mail("$view->email", $subject, $message, $mailHeader) or die("Error!");

        
    

    if($send_message){
        echo"<p><span>Message sent Successfully!</p>";
        mail("$to", $subject, $message, $mailHeader) or die("Error!");
    }else{
        echo "Big error!";
    }  
    /* send mail */
    $get_mail = $connectdb->prepare("SELECT user_email FROM users WHERE phone_number != 'admin'");
    $get_mail->execute();
    $mails = $get_mail->fetchAll();
    foreach($mails as $mail){
        
        //send mail
        mail("$view->user_email", $subject, $message, $mailHeader) or die("Error!");

        
    }
?>