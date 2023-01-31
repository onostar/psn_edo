<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";

    if(isset($_POST['post_event'])){
        $post_subject = ucwords(htmlspecialchars(stripslashes($_POST['title'])));
        $message = ucwords(htmlspecialchars(stripslashes($_POST['details'])));
        $mailHeader = "From: Admin";
        $not_message = "A new article has been posted. Visit the link below to view \n\r <a href='https://psnedo.com/events_news.php'>View</a>";
        $get_mail = $connectdb->prepare("SELECT user_email FROM users WHERE phone_number != 'admin'");
        $get_mail->execute();
        $mails = $get_mail->fetchAll();
        foreach($mails as $mail){
            
            //send mail
            $user_mails = $mail->user_email;

            
        }
        $event_date = htmlspecialchars(stripslashes($_POST['event_date']));
        $photo = $_FILES['photo']['name'];
        $photo_folder = "../media/".$photo;
        
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
                $_SESSION['success'] = "News posted successfully!";
                header("Location: ../views/admin.php");
                
                // header("Location: index.html");
                // return $error;
            }
        }
        
        $to   = $user_mails;
        $from = 'admin@psnedo.com';
        $from_name = "PSN Edo";
        $name = 'PSN Edo New Post';
        $subj = $post_subject;
        $msg = "<P>A new Post has just been added to PSN Edo. Be the first to View</p>
        <a style='background:green; color:#fff; padding:15px;' href='https://www.psnedo.com/events_news.php' title='View Postp'>View Post</a>";
        /* check exist */
        $check_status = $connectdb->prepare("SELECT * FROM news_events WHERE title = :title");
        $check_status->bindvalue("title", $post_subject);
        $check_status->execute();

        if($check_status->rowCount() > 0){
            $_SESSION['error'] = "$post_subject already posted!";
            header("Location: ../views/admin.php");
        }else{
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $photo_folder)){
                $insert_news = $connectdb->prepare("INSERT INTO news_events (title, details, photo, event_date) VALUES(:title, :details, :photo, :event_date)");
                $insert_news->bindvalue("title", $post_subject);
                $insert_news->bindvalue("details", $message);
                $insert_news->bindvalue("event_date", $event_date);
                $insert_news->bindvalue("photo", $photo);
                $insert_news->execute();

                if($insert_news){
                    $_SESSION['success'] = "$post_subject posted successfully!";
                    /* send notification and email */
                    //get receipients and send message
                    $get_recipient = $connectdb->prepare("SELECT user_id FROM users WHERE phone_number != 'admin'");
                    $get_recipient->execute();
                    $views = $get_recipient->fetchAll();
                    foreach($views as $view){
                        $send_message = $connectdb->prepare("INSERT INTO notifications (not_subject, not_message, user_id) VALUES(:not_subject, :not_message, :user_id)");
                        $send_message->bindvalue("not_subject", $post_subject);
                        $send_message->bindvalue("not_message", $not_message);
                        $send_message->bindvalue("user_id", $view->user_id);
                        $send_message->execute();

                        
                    }
                     /* send mail */
                     $error=smtpmailer($to, $from, $name ,$subj, $msg);
                     header("Location: ../views/admin.php");
                }else{
                    $_SESSION['error'] = "failed to post newsupload image";
                    header("Location: ../views/admin.php");
                }
            }else{
                $_SESSION['error'] = "failed to upload image";
                header("Location: ../views/admin.php");
            }
        }
    }   
    

?>