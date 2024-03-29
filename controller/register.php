<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    $_SESSION['reg_success'] = "";

    if(isset($_POST['register_user'])){
        $name = ucwords(htmlspecialchars(stripslashes($_POST['first_name'])));
        $last_name = ucwords(htmlspecialchars(stripslashes($_POST['last_name'])));
        $location = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy_location'])));
        $class = ucwords(htmlspecialchars(stripslashes($_POST['pharmacist_class'])));
        $phone_number = htmlspecialchars(stripslashes($_POST['phone_number']));
        $gender = ucwords(htmlspecialchars(stripslashes($_POST['gender'])));
        $email = ucwords(htmlspecialchars(stripslashes($_POST['user_email'])));
        $pcn = ucwords(htmlspecialchars(stripslashes($_POST['pcn_number'])));
        $pharmacy = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy'])));
        $group = htmlspecialchars(stripslashes($_POST['tech_group']));
        $address = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy_address'])));
        $dob = htmlspecialchars(stripslashes($_POST['dob']));
        // $password = 123;
        $passport = $_FILES['passport']['name'];
        $passport_folder = "../passports/".$passport;
        // $code = strtoupper(substr($state, 0, 3));
        $code = rand(1, 3000);
        $cur_time = Date("Y");
        $reg_number = $cur_time.$code;
        if(strlen($phone_number) != 11){
            $_SESSION['error'] = "Phone Number is too short!";
            header("Location: ../views/regist.php");
        }else{
            /* check if user already exists */
            $check_user = $connectdb->prepare("SELECT * FROM users WHERE phone_number = :phone_number OR user_email = :user_email OR pcn_number = :pcn_number");
            $check_user->bindvalue("phone_number", $phone_number);
            $check_user->bindvalue("user_email", $email);
            $check_user->bindvalue("pcn_number", $pcn);;
            $check_user->execute();

            if($check_user->rowCount() > 0){
                $_SESSION['error'] = "User already exists!";
                header("Location: ../views/registration.php");
            }else{
                if(move_uploaded_file($_FILES['passport']['tmp_name'], $passport_folder)){
                    $insert_user = $connectdb->prepare("INSERT INTO users (first_name, last_name, pharmacy, phone_number, gender, user_email, passport, pcn_number, reg_number, pharmacy_location, pharmacy_address, pharmacist_class, dob, tech_group) VALUES (:first_name, :last_name, :pharmacy, :phone_number, :gender, :user_email, :passport, :pcn_number, :reg_number, :pharmacy_location, :pharmacy_address, :pharmacist_class, :dob, :tech_group)");
                    $insert_user->bindvalue("first_name", $name);
                    $insert_user->bindvalue("last_name", $last_name);
                    $insert_user->bindvalue("phone_number", $phone_number);
                    $insert_user->bindvalue("pharmacy", $pharmacy);
                    $insert_user->bindvalue("pharmacy_location", $location);
                    $insert_user->bindvalue("pharmacist_class", $location);
                    $insert_user->bindvalue("pharmacy_address", $address);
                    // $insert_user->bindvalue("user_password", $password);
                    $insert_user->bindvalue("user_email", $email);
                    $insert_user->bindvalue("gender", $gender);
                    $insert_user->bindvalue("dob", $dob);
                    $insert_user->bindvalue("passport", $passport);
                    $insert_user->bindvalue("pcn_number", $pcn);
                    $insert_user->bindvalue("reg_number", $reg_number);
                    $insert_user->bindvalue("tech_group", $group);
                    // $insert_user->bindvalue("reg_number", $reg_number);
                    $insert_user->execute();
                    // echo $reg_number;
                    if($insert_user){
                        $_SESSION['user'] = $pcn;
                        // $get_id = PDO::lastInsertId();
                        $mem_id = $connectdb->lastInsertId();
                        $new_reg = $reg_number.$mem_id;
                        /* update reg_num */
                        $update_reg = $connectdb->prepare("UPDATE users SET reg_number = :reg_number WHERE pcn_number = :pcn_number");
                        $update_reg->bindvalue("reg_number", $new_reg);
                        $update_reg->bindvalue("pcn_number", $pcn);
                        $update_reg->execute();
                         $_SESSION['reg_success'] = "Your registration was successful, Your username is your phone number! \r\n While Your password is your PCN number";
                        header("Location: ../views/user.php");
                    }else{
                        $_SESSION['error'] = "Failed to update";
                        header("Location: ../views/registration.php");
                    }

                }
            }    
        }
        
    }
?>