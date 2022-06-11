<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    
    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";

    if(isset($_GET['user'])){

        $user_id = $_GET['user'];
        $get_pcn = $connectdb->prepare("SELECT pcn_number FROM payments WHERE payment_id = :payment_id");
        $get_pcn->bindvalue("payment_id", $user_id);
        $get_pcn->execute();
        $pcns = $get_pcn->fetch();
        $pcn = $pcns->pcn_number;
        /* get user email and details */
        $get_user = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
        $get_user->bindvalue("pcn_number", $pcn);
        $get_user->execute();
        $users = $get_user->fetchAll();
        foreach($users as $user){
            $user_email = $user->user_email;
            $full_name = $user->first_name." ".$user->last_name;
        }
        /* check if approved */
        /* $check_user = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND payment_status = 2");
        $check_user->bindvalue("user_id", $user_id);
        $check_user->execute(); */
        
        /* if($check_user->rowCount() > 0){
            $_SESSION['error'] = "User already approved!";
            header("Location: ../views/admin.php");

        }else{ */
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
                $_SESSION['success'] = "User payment confirmed!";
                header("Location: ../views/admin.php");
                
                // header("Location: index.html");
                // return $error;
            }
        }
        
        $to   = $user_email;
        $from = 'admin@psnedo.com';
        $from_name = "PSN Edo";
        $name = 'PSN Edo Payment Approval';
        $subj = 'PSN Edo Payment Approval';
        $msg = "<P>Your Payment has been approved.<br>Kindly click on the link below to download your clearance slip</p>
        <a href='https://www.psnedo.com/views/user.php' title='Download clearance slip'>Download Slip</a>";

            $update_payment = $connectdb->prepare("UPDATE payments SET payment_status = 1 WHERE payment_id = :payment_id");

            $update_payment->bindvalue("payment_id", $user_id);
            $update_payment->execute();

            if($update_payment){
                $_SESSION['success'] = "User payment confirmed!";
                header("Location: ../views/admin.php");
            $error=smtpmailer($to, $from, $name ,$subj, $msg);

            }else{
                $_SESSION['error'] = "Failed to confirm payment!";
                header("Location: ../views/admin.php");
            }
        
        
    }
?>