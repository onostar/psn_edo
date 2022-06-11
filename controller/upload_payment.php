<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    require "../PHPMailer/PHPMailerAutoload.php";
    require "../PHPMailer/class.phpmailer.php";
    require "../PHPMailer/class.smtp.php";

    if(isset($_POST['add_payment'])){
        $pcn = htmlspecialchars(stripslashes($_POST['pcn_number']));
        $receipt = $_FILES['payment']['name'];
        $receipt_folder = "../receipts/".$receipt;

        $check_status = $connectdb->prepare("SELECT * FROM payments WHERE pcn_number = :pcn_number AND payment_status = 0");
        $check_status->bindvalue("pcn_number", $pcn);
        $check_status->execute();
        /* get user email and details */
        $get_user = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
        $get_user->bindvalue("pcn_number", $pcn);
        $get_user->execute();
        $users = $get_user->fetchAll();
        foreach($users as $user){
            $user_email = $user->user_email;
            $full_name = $user->first_name." ".$user->last_name;
            $pharmacy = $user->pharmacy;
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
                $_SESSION['success'] = "Payment uploaded successfully";
                header("Location: ../views/admin.php");
                
                // header("Location: index.html");
                // return $error;
            }
        }
        
        $to   = $user_email;
        $from = 'admin@psnedo.com';
        $from_name = "PSN Edo";
        $name = 'PSN Edo Payment Uplaod';
        $subj = 'PSN Edo New Payment Upload';
        $msg = "<P>A new payment from $full_name at $pharmacy<br> Click on the link below to view and approve user</p>
        <a style='background:green; color:#fff; padding:15px;' href='https://www.psnedo.com/views/admin.php' title='Confirm payment'>Confirm payment</a>";
        /* check status */
        if($check_status->rowCount() > 0){
            $_SESSION['error'] = "You have already submitted payment. Kindly Await approval!";
            header("Location: ../views/user.php");
        }else{
            $check_status = $connectdb->prepare("SELECT * FROM payments WHERE pcn_number = :pcn_number AND payment_status = 1");
            $check_status->bindvalue("pcn_number", $pcn);
            $check_status->execute();
            if($check_status->rowCount() > 0){
                $_SESSION['error'] = "You have been Approved already! Kindly print your slip";
                header("Location: ../views/user.php");
            }else{
                if(move_uploaded_file($_FILES['payment']['tmp_name'], $receipt_folder)){
                    $update_status = $connectdb->prepare("INSERT INTO payments (pcn_number, payment_evidence) VALUES(:pcn_number, :payment_evidence)");
                    $update_status->bindvalue("payment_evidence", $receipt);
                    $update_status->bindvalue("pcn_number", $pcn);
                    $update_status->execute();
                    if($update_status){
                        /* set receipt */
                        $payment_id = $connectdb->lastInsertId();
                        /* get tdae */
                        $get_date = $connectdb->prepare("SELECT tdate FROM payments WHERE payment_id = :payment_id");
                        $get_date->bindvalue("payment_id", $payment_id);
                        $get_date->execute();
                        $tdate = $get_date->fetch();
                        $tx_date = date("Y", strtotime($tdate->tdate));
                        $random_num = rand(0, 5000);
                        $receipt_number = "PSN/".$tx_date."/".$random_num."/".$payment_id;
                        $update_receipt = $connectdb->prepare("UPDATE payments SET receipt_number = :receipt_number WHERE payment_id = :payment_id");
                        $update_receipt->bindvalue("receipt_number", $receipt_number);
                        $update_receipt->bindvalue("payment_id", $payment_id);
                        $update_receipt->execute();
                        $error=smtpmailer($to, $from, $name ,$subj, $msg);
                        
                        $_SESSION['success'] = "Payment uploaded successfully";
                        header("Location: ../views/user.php");
                    }else{
                        $_SESSION['error'] = "failed to upload receipt";
                    }
                }else{
                    $_SESSION['error'] = "failed to upload receipt";
                    header("Location: ../views/user.php");
                }
            }
            
        }

    }

?>