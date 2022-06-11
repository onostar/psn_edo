<?php 
    include "connections.php";
    session_start();

    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";

    $mess_subject = htmlspecialchars(stripslashes($_POST['subject']));
    $mess_message = htmlspecialchars(stripslashes($_POST['broadcast_message']));
    $get_mail = $connectdb->prepare("SELECT user_email FROM users WHERE phone_number != 'admin'");
        $get_mail->execute();
        $mails = $get_mail->fetchAll();
        foreach($mails as $mail){
            
            //send mail
            $user_mails = $mail->user_email;

            
        }
        function smtpmailer($to, $from, $from_name, $subject, $body)
        {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
    
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'www.psnedo.com';
            $mail->Port = 465; 
            $mail->Username = 'admin@psnedo.com';
            $mail->Password = 'Applied1010.';   
    
    
            $mail->IsHTML(true);
            $mail->From="admin@psnedo.com";
            $mail->FromName=$from_name;
            $mail->Sender=$from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            $mail->AddAddress('admin@psnedo.com');
            $mail->AddAddress('onostarkels@gmail.com');
            if(!$mail->Send())
            {
                $error ="Please try Later, Error Occured while Processing...";
                return $error; 
            }
            else 

            {
                echo"<p><span>Message sent Successfully!</p>";
                
                // header("Location: index.html");
                // return $error;
            }
        }
        
        $to   = $user_mails;
        $from = 'admin@psnedo.com';
        $from_name = "PSN Edo";
        $name = 'PSN Edo New Broadcast';
        $subj = $mess_subject;
        $msg = $mess_message;
    //get receipients and send message
    $get_recipient = $connectdb->prepare("SELECT user_id FROM users WHERE phone_number != 'admin'");
    $get_recipient->execute();
    $views = $get_recipient->fetchAll();
    foreach($views as $view){
        $send_message = $connectdb->prepare("INSERT INTO notifications (not_subject, not_message, user_id) VALUES(:not_subject, :not_message, :user_id)");
        $send_message->bindvalue("not_subject", $mess_subject);
        $send_message->bindvalue("not_message", $mess_message);
        $send_message->bindvalue("user_id", $view->user_id);
        $send_message->execute();
        //send mail
        // mail("$view->email", $subject, $message, $mailHeader) or die("Error!");

        
    }
    

    if($send_message){
        echo"<p><span>Message sent Successfully!</p>";
        $error=smtpmailer($to, $from, $name ,$subj, $msg);
    }else{
        echo "Big error!";
    }  
    /* send mail */
    
?>