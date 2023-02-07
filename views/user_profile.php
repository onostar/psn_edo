<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
    // $user_details->bindvalue("user_email", $user);
    $user_details->bindvalue("user_id", $user);
    $user_details->execute();
    $users  = $user_details->fetchAll();

    foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN Edo| <?php echo $user->first_name . $user->last_name?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/psn_logo2.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    
    
        <header id="user_header">
            <h1>
                <a href="admin.php">
                    <img src="../images/psn_logo2.png" alt="ACPN">
                    <div class="title">
                        <span id="main_t">PSN</span>
                        <span id="sub_t">EDO State</span>
                    </div>
                </a>
            </h1>
        </h1>
        <div class="search">
            <form class="form-inline" method="POST">
                <input type="search" name="search_items" placeholder="search members, reg_number, search phone number">
                <button type="submit" name="searchBtn" class="main_searchbtn" id="searchBtn">Search <i class="fas fa-search"></i></button>
                <button type="submit" name="search_items" class="mobilesearchbtn" id="searchBtn"><i class="fas fa-search"></i></button>
            </form>
            
        </div>
        <div class="other_menu">
            <a href="admin.php" title="Our Gallery">Admin</a>
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
            <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                    
                </div>
            </div>
        </div>
        <div class="cart">
            <a href="javascript:void(0);" title="Registered members"><i class="fas fa-users"></i> Registered 
                <span id="cart_value"><?php
                $get_members = $connectdb->prepare("SELECT * FROM users WHERE phone_number != 'admin'");
                $get_members->execute();
                echo $get_members->rowCount();
                ?> </span></a>
        </div>
        <div class="menu_icon">
            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </div>
    </header>

    <main>
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <!-- search results -->
            
        <!-- <h2 id="reg_slip">User Details</h2> -->
        <hr>
        <div class="user_details">
        <a onclick="window.close()"id="go_back"href="javascript:void(0)" title="go back">Go back <i class="fas fa-angle-double-left"></i></a>
            <div class="clear"></div>
            <div class="add_user_form">
                <h3>User Details</h3>
                <div class="status">
                    <?php
                        $get_stat = $connectdb->prepare("SELECT * FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE()) AND payment_status = 1");
                        $get_stat->bindvalue("pcn_number", $user->pcn_number);
                        $get_stat->execute(); 
                        if(!$get_stat->rowCount() > 0){
                            echo "<i class='fas fa-ban'></i><br><p>Registration Pending</p>";
                        }else{

                            echo "<i style='color:green'class='fas fa-certificate'></i><br><p>Approved</p>";
                        }
                    ?>
                </div>
                <div class="main_details">
                    <div class="inputs" style="align-items:center">
                        <div class="data">
                            <div class="profile_img">
                                <img src="<?php echo "../passports/".$user->passport?>" alt="Passport">
                            </div>
                        </div>
                        <div style="display:flex; gap:2rem; align-items:center">
                            <div class="data">
                                <h3 style="color:#fff; background:red; font-weight:bold"><?php echo $user->tech_group;?> Member</h3>
                            </div>
                            <div class="data">
                                <h3>PCN: <?php echo $user->pcn_number;?></h3>
                            </div>
                            <div class="data">
                                <h3>Reg_number: <?php echo $user->reg_number;?></h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="inputs">
                        <div class="data">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" value="<?php echo $user->first_name;?>" id="first_name">
                        </div>
                        <div class="data">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" value="<?php echo $user->last_name;?>" id="last_name">
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="whatsapp">Email ddress</label>
                            <input type="email" name="user_email" value="<?php echo $user->user_email;?>" id="user_email">
                        </div>
                        <div class="data">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" name="phone_number" value="<?php echo $user->phone_number;?>" id="phone_number">
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="dob">Date of Birth</label>
                            <input type="text" name="dob" value="<?php echo date("jS M, Y", strtotime($user->dob));?>" id="dob">
                        </div>
                        <div class="data">
                            <label for="phone_number">Gender</label>
                            
                                <input type="text" value="<?php echo $user->gender?>">
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="pharmacist_class">Pharmacist Class</label>
                                <input type="text" value="<?php echo $user->pharmacist_class?>">
                        </div>
                        <div class="data">
                            <label for="phone_number">Place of Practice</label>
                            <input type="text" name="pharmacy" value="<?php echo $user->pharmacy;?>" id="pharmacy">
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="phone_number">Place of practice Addres</label>
                            <input type="text" name="pharmacy_address" value="<?php echo $user->pharmacy_address;?>" id="pharmacy_address">
                        </div>
                        <div class="data">
                            <label for="Pharmacy-location">Pharmacy Location</label>
                            <input type="text" value="<?php echo $user->pharmacy_location?>">
                        </div>
                        
                        
                    </div>
                </div>  
            </div> 
        </div> 
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php endforeach;?>