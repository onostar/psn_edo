<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['user'])){

        $user_id = $_GET['user'];
        /* check if approved */
        /* $check_user = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND payment_status = 2");
        $check_user->bindvalue("user_id", $user_id);
        $check_user->execute(); */
        
        /* if($check_user->rowCount() > 0){
            $_SESSION['error'] = "User already approved!";
            header("Location: ../views/admin.php");

        }else{ */
            $update_payment = $connectdb->prepare("UPDATE payments SET payment_status = -1 WHERE payment_id = :payment_id");

            $update_payment->bindvalue("payment_id", $user_id);
            $update_payment->execute();

            if($update_payment){
                $_SESSION['error'] = "User payment declined!";
                header("Location: ../views/admin.php");
            }else{
                $_SESSION['error'] = "Failed to decline payment!";
                header("Location: ../views/admin.php");
            }
        
        
    }
?>