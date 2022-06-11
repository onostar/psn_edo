<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
    $user_details->bindvalue("pcn_number", $username);
    $user_details->execute();

    $users = $user_details->fetchAll();
    foreach($users as $user):
?>
<?php $_SESSION['user'] = $user->pcn_number;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN | <?php echo $user->first_name . " " . $user->last_name;?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/psn_logo2.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
        <!-- <section class="top_head" id="topHeader">
            <div class="social_media">
                <a href="javascript:void(0);" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook"></i></a>   
                <a href="javascript:void(0);" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a> 
                <a href="javascript:void(0);" target="_blank" title="Follow us on instagram"><i class="fab fa-instagram"></i></a>   
                <a href="javascript:void(0);" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin"></i></a>   
                <a href="https://wa.me/23412345678" target="_blank" title="Follow us on whatsapp"><i class="fab fa-whatsapp"></i></a>   
            </div>
            <div class="contact_phone">
                <button class="appointment" id="bookings">Book Appointment</button>
                <p class="text-right"><i class="fas fa-mobile-alt"></i> <span class="call">Call us:</span> +234712345678</p>
            </div>
        </section> -->
        <header id="user_header">
            <h1>
                <a href="user.php">
                    <img src="../images/psn_logo2.png" alt="ACPN">
                    <div class="title">
                        <span id="main_t">PSN</span>
                        <span id="sub_t">EDO STATE</span>
                    </div>
                </a>
            </h1>
            <h2 id="desktop_h2">Pharmaceutical Society  of Nigeria</h2>
            <h2 id="mobile_h2">PSN</h2>
            <!-- <div class="other_menu">
                <a href="#" title="Our Gallery">Gallery</a>
            </div> -->
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" title="<?php echo "Pharm. " .$user->last_name;?>" id="user_name">
                     <span><?php echo $user->last_name . " " . $user->first_name;?></span> 
                    <div class="user_img">
                        <img src="<?php echo "../passports/".$user->passport;?>" alt="passport">
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    
        
        <?php
            if(isset($_GET{'message'})){
                $not_id = $_GET['message'];
            /* update status */
            $update_not = $connectdb->prepare("UPDATE notifications SET not_status = 1 WHERE notification_id = :notification_id");
            $update_not->bindvalue("notification_id", $not_id);
            $update_not->execute();
            $get_message = $connectdb->prepare("SELECT * FROM notifications WHERE notification_id = :notification_id");
            $get_message->bindvalue("notification_id", $not_id);
            $get_message->execute();
            $messages = $get_message->fetchAll();
            foreach($messages as $message):
        ?>
        <div class="message_det">
            <h3><?php echo $message->not_subject?></h3>
            <p><?php echo $message->not_message?></p>
            <a onclick="window.close()"id="go_back"href="javascript:void(0)" title="go back">Go back <i class="fas fa-angle-double-left"></i></a>
            <div class="clear"></div>
        </div>
            

            <?php 
                endforeach;
            }
            ?>
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: registration.php");
    }
?>