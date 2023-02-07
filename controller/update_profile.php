<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    if(isset($_POST['update'])){
        $first_name = ucwords(htmlspecialchars(stripslashes($_POST['first_name'])));
        $last_name = ucwords(htmlspecialchars(stripslashes($_POST['last_name'])));
        $phone_number = htmlspecialchars(stripslashes($_POST['phone_number']));
        $gender = htmlspecialchars(stripslashes($_POST['gender']));
        $location = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy_location'])));
        $id = $_POST['user_id'];
        $class = htmlspecialchars(stripslashes($_POST['pharmacist_class']));
        $pharmacy = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy'])));
        $pharmacy_address = ucwords(htmlspecialchars(stripslashes($_POST['pharmacy_address'])));
        $email = htmlspecialchars(stripslashes($_POST['user_email']));
        $group = htmlspecialchars(stripslashes($_POST['tech_group']));
        $dob = $_POST['dob'];
        /* update profile */
            $update_profile = $connectdb->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, gender = :gender, pharmacy = :pharmacy, pharmacy_location = :pharmacy_location, pharmacy_address = :pharmacy_address, user_email = :user_email, dob = :dob, pharmacist_class = :pharmacist_class, tech_group = :tech_group WHERE user_id = :user_id");
            $update_profile->bindvalue("first_name", $first_name);
            $update_profile->bindvalue("last_name", $last_name);
            $update_profile->bindvalue("phone_number", $phone_number);
            $update_profile->bindvalue("user_email", $email);
            $update_profile->bindvalue("pharmacy_location", $location);
            $update_profile->bindvalue("pharmacy", $pharmacy);
            $update_profile->bindvalue("pharmacy_address", $pharmacy_address);
            $update_profile->bindvalue("pharmacist_class", $class);
            $update_profile->bindvalue("dob", $dob);
            $update_profile->bindvalue("gender", $gender);
            $update_profile->bindvalue("tech_group", $group);
            $update_profile->bindvalue("user_id", $id);
            $update_profile->execute();

            if($update_profile){
                $_SESSION['success'] = "Profile update successful";
                header("Location: ../views/user.php");
            }else{
                $_SESSION['error'] = "Update failed";
                header("Location: ../views/user.php");
            }
        }
        

    

?>