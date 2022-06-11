<?php
    include "connections.php";
    session_start();

    $_SESSION['error'] = "";

    if(isset($_POST['login'])){
        $username = htmlspecialchars(stripslashes($_POST['username']));
        $password = htmlspecialchars(stripslashes($_POST['password']));

        $get_user = $connectdb->prepare("SELECT * FROM users WHERE phone_number = :phone_number AND pcn_number = :pcn_number");
        $get_user->bindvalue("phone_number", $username);
        $get_user->bindvalue("pcn_number", $password);
        $get_user->execute();

        if($get_user->rowCount() > 0){
            $_SESSION['user'] = $password;
            if($username === "admin"){
                header("Location: ../views/admin.php");
            }else{
                header("Location: ../views/user.php");
            }
        }else{
            $_SESSION['error'] = "Invalid username or password!";
            header("Location: ../views/registration.php");
        }

    }




?>