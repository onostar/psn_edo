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
    
        
        <div class="admin_main">
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Upload payment</a></li>
                        <!-- <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu" class="page_navs" data-page="reqHotel">Request Accomodation <i class="fas fa-hotel"></i></a></li> -->
                        
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="print_slip"><i class="fas fa-print"></i> Print slip</a></li>
                        <li><a href="javascript:void(0);" id="viewMess" class="page_navs" data-page="notifications"><i class="fas fa-envelope"></i> Messages <span class="mess"><?php $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND not_status = 0");
                        $get_not->bindvalue("user_id", $user->user_id);
                        $get_not->execute();
                        echo $get_not->rowCount();?></span></a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Upload payment</a></li>
                        <!-- <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu" class="page_navs" data-page="reqHotel">Request Accomodation <i class="fas fa-hotel"></i></a></li> -->
                        
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="print_slip"><i class="fas fa-print"></i> Print slip</a></li>
                        <li><a href="javascript:void(0);" id="viewMess" class="page_navs" data-page="notifications"><i class="fas fa-envelope"></i> Messages <span class="mess"><?php $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND not_status = 0");
                        $get_not->bindvalue("user_id", $user->user_id);
                        $get_not->execute();
                        echo $get_not->rowCount();?></span></a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <section id="contents">
                <div class="success_message">
                    <p>
                        <?php
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                        ?>
                    </p>
                </div>
                <div class="error_message">
                    <p>
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                </div>
                <?php
                    if(isset($_SESSION['reg_success'])){
                        echo "<p id='reg_success'>" . $_SESSION['reg_success'] . "</p>";
                        unset($_SESSION['reg_success']);
                    }
                ?>
                <div id="dashboard">
                    <div id="userSummary">
                        <div id="user_img">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="sum_details">
                            <h3><?php echo $user->pharmacy;?></h3>
                            <p><?php echo $user->pharmacy_address?></p>
                            <p><?php echo $user->pharmacy_location?></p>
                        </div>
                    </div>
                    <div class="cards" id="card5">
                        <a href="javascript:void(0)">
                            <p>Clearance status</p>
                            <div class="infos">
                                <?php
                                    $get_status = $connectdb->prepare("SELECT payment_status FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE())");
                                    $get_status->bindvalue("pcn_number", $username);
                                    $get_status->execute();
                                    if(!$get_status->rowCount() > 0){
                                        echo "<i class='fas fa-ban'></i>";
                                    }else{
                                        $stat = $get_status->fetch();
                                        if($stat->payment_status == 1){
                                            echo "<i class='fas fa-check'></i>";
                                        }elseif($stat->payment_status == -1){
                                            echo "<i class='fas fa-ban'></i>";
                                        }else{
                                            echo "<i class='fas fa-spinner'></i>";
                                        }
                                    }
                                ?>
                                
                                <p>
                                    <?php
                                        $get_status = $connectdb->prepare("SELECT payment_status FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE())");
                                        $get_status->bindvalue("pcn_number", $username);
                                        $get_status->execute();
                                        if(!$get_status->rowCount() > 0){
                                            echo "Pending";
                                        }else{
                                            $stat = $get_status->fetch();
                                            if($stat->payment_status == 1){
                                                echo "Approved";
                                            }elseif($stat->payment_status == -1){
                                                echo "Declined";
                                            }else{
                                                echo "Processing";
                                            }
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                     
                   
                </div>
                <!--show RECEIPT -->
                <div id="paid_receipt" class="displays management">
                    <div class="info"></div>
                    
                    <?php 
                        $payment_status = $connectdb->prepare("SELECT * FROM payments WHERE pcn_number = :pcn_number AND payment_status = 1 AND YEAR(tdate) = YEAR(CURDATE())");
                        $payment_status->bindvalue("pcn_number", $user->pcn_number);
                        $payment_status->execute();
                        if(!$payment_status->rowCount() > 0){
                            echo "";
                        }else{
                        $years = $payment_status->fetchAll();
                        foreach($years as $year){
                            $paid_year = $year->tdate;
                        }
                    ?>
                    <h2>Clearance Slip for "<?php echo date("Y", strtotime($paid_year))?>"</h2>
                    <section id="clearanceSlip">
                        
                        <div class="logos">
                            <img src="../images/psn_logo2.png" alt="Acpn logo">
                            <P>PSN slip</P>
                        </div>
                        <div class="receipt_num">
                            <p><?php 
                                $get_receipt = $connectdb->prepare("SELECT receipt_number FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE()) AND payment_status = 1");
                                $get_receipt->bindvalue("pcn_number", $user->pcn_number);
                                $get_receipt->execute();
                                $receipt = $get_receipt->fetch();
                                echo $receipt->receipt_number;
                            ?></p>
                        </div>
                        <div class="slip">
                            
                            <div class="slip_back">
                                <img src="../images/psn_logo2.png" alt="psn">
                            </div>
                            <div class="details">
                                <div class="logos_passport">
                                    <div class="passports">
                                        <img src="<?php echo '../passports/'.$user->passport;?>" alt="member passport">
                                    </div>
                                </div>
                                <p class="full_name"><?php echo $user->first_name . " " .$user->last_name?></p>
                                <p><?php echo $user->pharmacy?></p>
                                <p><span>Registration ID: </span><?php echo $user->reg_number?></p>
                                <div class="qr_code">
                                <img src="../images/qr_code.png" alt="qr_code">
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                    <div class="download">
                        <button id="print" onclick="window.print()">Print slip <i class="fas fa-print"></i></button>
                    </div>
                    <?php }?>
                </div>
                
                <!-- Upload payment -->
                <div id="addCategories" class="displays">
                    <?php 
                        $get_stats = $connectdb->prepare("SELECT payment_status FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE())");
                        $get_stats->bindvalue("pcn_number", $user->pcn_number);
                        $get_stats->execute();
                        if($get_stats->rowCount() > 0){
                            $status = $get_stats->fetch();
                            if($status->payment_status == 1){
                                echo "<p class='reg_success'>You have been Approved already! Kindly print your slip</p>";
                            }else{
                                echo "<p class='reg_success'>You have already submitted payment. Kindly Await approval</p>";
                            }
                        }else{
                    ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Upload payment</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="pcn_number">
                            <div class="inputs">
                                
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                <button type="submit" id="add_payment" name="add_payment">Upload payment <i class="fas fa-upload"></i></button>
                            </div>
                        </form>
                    </div>
                    <?php }?>
                </div>
                
                
                
                <!-- update profile -->
                <div class="management displays" id="profile">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Update profile</h3>
                        <form method="POST"  id="addCatForm" action="../controller/update_profile.php">
                            <input type="hidden" value="<?php echo $user->user_id?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <div class="profile_img">
                                        <img src="<?php echo "../passports/".$user->passport?>" alt="Passport">
                                    </div>
                                </div>
                                <div class="data">
                                    <h3>PCN: <?php echo $user->pcn_number;?></h3>
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
                                    <input type="date" name="dob" value="<?php echo $user->dob;?>" id="dob">
                                </div>
                                <div class="data">
                                    <label for="phone_number">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="<?php echo $user->gender?>" selected><?php echo $user->gender;?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="pharmacist_class">Pharmacist Class</label>
                                    <select name="pharmacist_class" id="pharmacist_class">
                                        <option value="<?php echo $user->pahrmacist_class?>" selected><?php echo $user->pharmacist_class;?></option>
                                        <option value="Superintendent Pharmacist">Superintendent Pharmacist</option>
                                        <option value="Locum Pharmacist">Locum Pharmacist</option>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="phone_number">Place of Practice</label>
                                    <input type="text" name="pharmacy" value="<?php echo $user->pharmacy;?>" id="pharmacy">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="phone_number">Place of Practice Address</label>
                                    <input type="text" name="pharmacy_address" value="<?php echo $user->pharmacy_address;?>" id="pharmacy_address">
                                </div>
                                <div class="data">
                                    <label for="Pharmacy-location">Location</label>
                                    <select name="pharmacy_location" id="pharmacy_location">
                                        <option value="<?php echo $user->pharmacy_location?>"selected><?php echo $user->pharmacy_location?></option>
                                        <option value="Akoko Edo">Akoko Edo</option>
                                        <option value="Egor ">Egor</option>
                                        <option value="Esan Central">Esan Central</option>
                                        <option value="Esan North East">Esan North East</option>
                                        <option value="Esan South East">Esan South East</option>
                                        <option value="Esan West">Esan West</option>
                                        <option value="Etsako">Etsako</option>
                                        <option value="Etsako central">Etsako central</option>
                                        <option value="Etsako East">Etsako East</option>
                                        <option value="Etsako West">Etsako West</option>
                                        <option value="Igueben">Igueben</option>
                                        <option value="Ikpoba-Okha">Ikpoba-Okha</option>
                                        <option value="Oredo">Oredo</option>
                                        <option value="Orhionmwon">Orhionmwon</option>
                                        <option value="Ovia North East">Ovia North East</option>
                                        <option value="Ovia South West">Ovia South West</option>
                                        <option value="Owan East">Owan East</option>
                                        <option value="Owan West">Owan West</option>
                                        <option value="Uhunmwonde">Uhunmwonde</option>
                                        
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="tech_group">Technical group</label>
                                    <select name="tech_group" id="tech_group">
                                        <option value="<?php echo $user->tech_group?>"><?php echo $user->tech_group?></option>
                                        <option value="PSN-YPG">PSN-YPG</option>
                                        <option value="ACPN">ACPN</option>
                                        <option value="NAPA">NAPA</option>
                                        <option value="NAIP">NAIP</option>
                                        <option value="ALPS">ALPS</option>
                                        <option value="CPAN">CPAN</option>
                                        <option value="AHAPN">AHAPN</option>
                                    </select>
                                </div>
                                <div class="data">
                                    <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user"></i></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>  
                </div>
                <!-- print slip -->
                <div id="print_slip" class="displays">
                    <h3>Print Clearance Slip</h3>
                    <hr>
                    <div class="slip_year">
                        <label for="tdate">Select Year</label>
                        <select name="tdate" id="tdate">
                            <option value=""selected>Select year</option>
                            <?php 
                                $get_year = $connectdb->prepare("SELECT tdate FROM payments WHERE pcn_number = :pcn_number ORDER BY tdate DESC");
                                $get_year->bindvalue("pcn_number", $user->pcn_number);
                                $get_year->execute();
                                $years = $get_year->fetchAll();
                                foreach($years as $year):

                            ?>
                            <option value="<?php echo date("Y", strtotime($year->tdate))?>"><?php echo date("Y", strtotime($year->tdate))?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="slip">

                    </div>
                </div>
                <div id="notifications" class="displays">
                    <h2><i class="fas fa-bell"></i> Notifications / Messages</h2>
                    <!-- <hr> -->
                    <div class="all_nots">
                        <?php
                            $get_nots = $connectdb->prepare("SELECT SUBSTRING_INDEX (not_message, ' ', 20) AS not_message, not_subject, not_date, notification_id, not_status FROM notifications WHERE user_id = :user_id ORDER BY not_date DESC");
                            $get_nots->bindvalue("user_id", $user->user_id);
                            $get_nots->execute();
                            $nots = $get_nots->fetchAll();
                            foreach($nots as $not):

                        ?>
                        <?php 
                            if($not->not_status == 1){
                        ?>
                        <div class="message read" id="main_mess">
                            <a class="message_navs" href="javascript:void(0)" title="View message" onclick="viewMessage('<?php echo $not->notification_id;?>')">
                                <p id="bell"><i class="fas fa-bell"></i></p>
                                <div class="main_mess">
                                    <h3><?php echo $not->not_subject?> <i class="fas fa-check" style="color:green; font-size:.9rem"></i></h3>
                                    <p><?php echo $not->not_message?>...read more</p>
                                    <p><?php echo date("jS, M, Y", strtotime($not->not_date))?></p>
                                    <div class="clear"></div>
                                </div>
                            </a>
                        </div>
                        <?php 
                            }else{

                            
                        ?>
                        <div class="message" id="main_mess">
                            <a class="message_navs" href="javascript:void(0)" title="View message" onclick="viewMessage('<?php echo $not->notification_id;?>')">
                                <p id="bell"><i class="fas fa-bell"></i></p>
                                <div class="main_mess">
                                    <h3><?php echo $not->not_subject?></h3>
                                    <p><?php echo $not->not_message?>...read more</p>
                                    <p><?php echo date("jS, M, Y", strtotime($not->not_date))?></p>
                                    <div class="clear"></div>
                                </div>
                            </a>
                        </div>
                        <?php } endforeach;?>
                    </div>
                    <?php 
                        if(!$get_nots->rowCount() > 0){
                            echo "<p id='no_money' class='not_found'>You have no messsage!</p>";
                        }
                    ?>
                </div>
            </section>
        </div>
        
            
        
        
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: login_page.php");
    }
?>