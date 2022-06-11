<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN | Admin</title>
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
        
        <header id="user_header">
            <h1>
                <a href="admin.php">
                    <img src="../images/psn_logo2.png" alt="ACPN">
                    <div class="title">
                        <span id="main_t">PSN</span>
                        <span id="sub_t">EDO STATE</span>
                    </div>
                </a>
            </h1>
            <h2>Pharmaceutical Society of Nigeria</h2>
            <!-- <div class="search">
                <form class="form-inline" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number" id="search_items">
                    <button type="submit" name="searchBtn" id="searchBtn" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="searchBtn" id="searchBtn" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div> -->
            <div class="other_menu">
                <a href="#" title="Our Gallery">Admin</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                        <!-- <h3>OR</h3>
                        <a href="registration.php" id="signupBtn">Member Registration</a> -->
                    </div>
                </div>
            </div>
            <div class="cart">
                <a href="javascript:void(0);" title="Registered members" data-page="allMembers" class="page_navs"><i class="fas fa-users"></i> Registered 
                    <span id="cart_value"><?php
                    $get_members = $connectdb->prepare("SELECT * FROM users WHERE phone_number != 'admin'");
                    $get_members->execute();
                    echo $get_members->rowCount();
                    ?> </span></a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i><i class="fas fa-times"></i></a>
            </div>
        </header>

    
        
        <div class="admin_main">
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            <!-- <h3>OR</h3>
                            <a href="registration.php" id="signupBtn">Member Registration</a> -->
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-coins"></i> Confirm payment</a></li>
                        <!-- <li><a href="javascript:void(0);" id="addMenu" title="Approved members" class="page_navs" data-page="approved"><i class="fas fa-user-tie"></i> Approved Members</a></li> -->
                        
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-user-graduate"></i> Approved members</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="declined_payment"><i class="fas fa-ban"></i> Declined payments</a></li>
                        <li><a href="javascript:void(0);" id="sendMes" class="page_navs" data-page="broadcasts"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="javascript:void(0);" id="event" class="page_navs" data-page="events_news"><i class="fas fa-calendar"></i> Events & News</a></li>
                        <li><a href="javascript:void(0);" id="galleryBtn" class="page_navs" data-page="gallery"><i class="fas fa-photo-video"></i> Gallery</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            <!-- <h3>OR</h3>
                            <a href="registration.php" id="signupBtn">Member Registration</a> -->
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-coins"></i> Confirm payment</a></li>
                        <!-- <li><a href="javascript:void(0);" id="addMenu" title="Approved members" class="page_navs" data-page="approved"><i class="fas fa-user-tie"></i> Approved Members</a></li> -->
                        
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-user-graduate"></i> Approved members</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="declined_payment"><i class="fas fa-ban"></i> Declined payments</a></li>
                        <li><a href="javascript:void(0);" id="sendMes" class="page_navs" data-page="broadcasts"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="javascript:void(0);" id="event" class="page_navs" data-page="events_news"><i class="fas fa-calendar"></i> Events & News</a></li>
                        <li><a href="javascript:void(0);" id="galleryBtn" class="page_navs" data-page="gallery"><i class="fas fa-photo-video"></i> Gallery</a></li>
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
                <div id="dashboard">
                    
                    <div class="cards" id="card4">
                        <a href="javascript:void(0)" data-page="addCategories" class="page_navs">
                            <p>Incoming payments</p>
                            <div class="infos">
                                <i class="fas fa-credit-card"></i>
                                <p>
                                    <?php
                                        $show_members = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 0 AND YEAR(tdate) = YEAR(CURDATE()) ");
                                        $show_members->execute();
                                        echo $show_members->rowCount();
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card1">
                        <a href="javascript:void(0)" data-page="addRestaurant" class="page_navs">
                            <p>Approved Members <?php echo date("Y")?></p>
                            <div class="infos">
                                <i class="fas fa-user-graduate"></i>
                                <p>
                                    <?php
                                        $approved = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 1 AND YEAR(tdate) = YEAR(CURDATE())");
                                        
                                        $approved->execute();
                                        
                                        echo $approved->rowCount()

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="cards" id="card3">
                        <a href="javascript:void(0)">
                            <p>Declined Payments</p>
                            <div class="infos">
                                <i class="fas fa-ban"></i>
                                <p>
                                    <?php
                                        $get_hotel = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = -1");
                                        
                                        $get_hotel->execute();
                                        
                                        echo $get_hotel->rowCount()

                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                   
                </div>
                
                <!-- search results -->
                <div class="allResults">
                    
                </div>
                <!-- all members -->
                <div class="allResults displays" id="allMembers">
                    <h2>Registered Members</h2>
                    <hr>
                    <div class="options">
                        <div class="search">
                            <input type="search" id="searchMenus" placeholder="Enter keyword">
                        </div>
                        <button id="download_members" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
                    </div>
                    
                    <table id="result_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Full Name</td>
                                <td>PCN Number</td>
                                <td>Phone Number</td>
                                <td>Email</td>
                                <td>Place of practice</td>
                                <td>Location</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_all = $connectdb->prepare("SELECT * FROM users WHERE phone_number != 'admin' ORDER BY reg_date");
                                $get_all->execute();
                                $n = 1;
                                if(!$get_all->rowCount() > 0){
                                    echo "<p class='no_result'>'No result found!'</p>";
                                }
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                    <td><button><a href="javascript:void(0)" onclick="viewUser('<?php echo $all->user_id;?>')" title="viewUser"><?php echo $n?></a></button></td>
                                    <td><?php echo $all->first_name . " " . $all->last_name;?></td>
                                    <td><?php echo $all->pcn_number;?></td>
                                    <td><?php echo $all->phone_number;?></td>
                                    <td><?php echo $all->user_email;?></td>
                                    <td><?php echo $all->pharmacy?></td>
                                    <td><?php echo $all->pharmacy_location?></td>
                                    <td>
                                        <?php
                                        $get_stat = $connectdb->prepare("SELECT payment_status FROM payments WHERE pcn_number = :pcn_number AND YEAR(tdate) = YEAR(CURDATE())");
                                        $get_stat->bindvalue("pcn_number", $all->pcn_number);
                                        $get_stat->execute(); 
                                        if(!$get_stat->rowCount() > 0){
                                            echo "Pending <i style='color:red'class='fas fa-ban'></i>";
                                        }else{
                                            $status = $get_stat->fetch();
                                            if($status->payment_status == 1){
                                                echo "Approved <i style='color:green' class='fas fa-check'></i>";
                                            }else{
                                                echo "Processing <i style='color:skyblue'class='fas fa-spinner'></i>"; 
                                            }
                                        }
                                        ?>
                                    </td>
                                    
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                </div>
                <!-- Confirm payments -->
                <div id="addCategories" class="allResults displays">
                <h2>Confirm member payment</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchPayments" placeholder="Enter keyword">
                    </div>
                    <table id="payment_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Full Name</td>
                                <td>PCN Number</td>
                                <td>Payment Evidence</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_pay = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 0 AND YEAR(tdate) = YEAR(CURDATE()) ORDER BY tdate");
                                $get_pay->execute();
                                $n = 1;
                                
                                $alls = $get_pay->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                <td><button>
                                        <?php 
                                        $get_user = $connectdb->prepare('SELECT user_id FROM users WHERE pcn_number = :pcn_number');
                                        $get_user->bindvalue('pcn_number', $all->pcn_number);
                                        $get_user->execute();
                                        $user = $get_user->fetch();
                                        ?>    
                                        <a href="javascript:void(0)" onclick="viewUser('<?php echo $user->user_id;?>')" title="View profile"><?php echo $n?></a></button>
                                    <td><?php 
                                    $get_name = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                    $get_name->bindvalue("pcn_number", $all->pcn_number);
                                    $get_name->execute();
                                    $names = $get_name->fetchAll();
                                    foreach($names as $name){
                                        echo $name->first_name . " " . $name->last_name;
                                    }
                                ?></td>
                                <td><?php echo $all->pcn_number;?></td>
                                <td id="rpt_img"><a href="<?php echo "../receipts/".$all->payment_evidence;?>" target="_blank" title="Payment evidence">View slip</a></td>
                                <td>
                                    <button title="Confirm payment" onclick="approvePayment('<?php echo $all->payment_id;?>')"class="action accept"><i class="fas fa-check"></i></button>
                                    <button title="Decline payment"onclick="declinePayment('<?php echo $all->payment_id?>')"class="action decline"><i class="fas fa-ban"></i></button></td>
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                </div>
                <!--Approved members -->
                <div id="addRestaurant" class="displays allResults">
                    <div class="slip_year">
                        <label for="tdate">Select Year</label>
                        <select name="admin_tdate" id="admin_tdate">
                            <option value=""selected>Select year</option>
                            <?php 
                                $get_year = $connectdb->prepare("SELECT tdate FROM payments WHERE payment_status = 1 ORDER BY tdate DESC");
                                $get_year->execute();
                                $years = $get_year->fetchAll();
                                foreach($years as $year):

                            ?>
                            <option value="<?php echo date("Y", strtotime($year->tdate))?>"><?php echo date("Y", strtotime($year->tdate))?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="approvedMembers">
                        <h2>Approved members for "<?php echo date("Y")?>"</h2>
                        <hr>
                        <div class="options">
                            <div class="search">
                                <input type="search" id="searchApproved" placeholder="Enter keyword">
                            </div>
                            <button id="download_approved" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
                        </div>
                        
                        <table id="approved_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Full Name</td>
                                    <td>PCN Number</td>
                                    <td>Place of Practice</td>
                                    <td>Receipt Number</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $get_pay = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 1 AND YEAR(tdate) = YEAR (CURDATE()) ORDER BY tdate");
                                    $get_pay->execute();
                                    $n = 1;
                                    
                                    $alls = $get_pay->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                    <td><button>
                                        <?php 
                                        $get_user = $connectdb->prepare('SELECT user_id FROM users WHERE pcn_number = :pcn_number');
                                        $get_user->bindvalue('pcn_number', $all->pcn_number);
                                        $get_user->execute();
                                        $user = $get_user->fetch();
                                        ?>    
                                        <a href="javascript:void(0)" onclick="viewUser('<?php echo $user->user_id;?>')" title="View profile"><?php echo $n?></a></button></td>
                                        <td><?php 
                                            $get_name = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                            $get_name->bindvalue("pcn_number", $all->pcn_number);
                                            $get_name->execute();
                                            $names = $get_name->fetchAll();
                                            foreach($names as $name){
                                                echo $name->first_name . " " . $name->last_name;
                                            }
                                        ?></td>
                                        <td><?php echo $all->pcn_number;?></td>
                                        <td><?php 
                                            $get_pharm = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                            $get_pharm->bindvalue("pcn_number", $all->pcn_number);
                                            $get_pharm->execute();
                                            $pharms = $get_pharm->fetchAll();
                                            foreach($pharms as $pharm){
                                                echo $pharm->pharmacy;
                                            }
                                        ?></td>
                                        <td><?php echo $all->receipt_number;?></td>
                                        
                                    
                                </tr>
                                <?php $n++; endforeach;?>
                            </tbody>
                        </table>
                        <?php
                            if(!$get_pay->rowCount() > 0){
                                echo "<p class='no_result'>'No result found!'</p>";
                            }
                        ?>
                    </div>
                </div>
                <!-- declined payments -->
                <div class="allResults displays" id="declined_payment">
                    <h2>Declined payments record</h2>
                    <hr>
                    <div class="options">
                        <div class="search">
                            <input type="search" id="searchDeclined" placeholder="Enter keyword">
                        </div>
                        <button id="download_declined" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
                    </div>
                    
                    <table id="declined_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Full Name</td>
                                <td>PCN Number</td>
                                <td>Pharmacy</td>
                                <td>Receipt Number</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_pay = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = -1");
                                $get_pay->execute();
                                $n = 1;
                                
                                $alls = $get_pay->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                <td><button>
                                    <?php 
                                    $get_user = $connectdb->prepare('SELECT user_id FROM users WHERE pcn_number = :pcn_number');
                                    $get_user->bindvalue('pcn_number', $all->pcn_number);
                                    $get_user->execute();
                                    $user = $get_user->fetch();
                                    ?>    
                                    <a href="javascript:void(0)" onclick="viewUser('<?php echo $user->user_id;?>')" title="View profile"><?php echo $n?></a></button></td>
                                    <td><?php 
                                        $get_name = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                        $get_name->bindvalue("pcn_number", $all->pcn_number);
                                        $get_name->execute();
                                        $names = $get_name->fetchAll();
                                        foreach($names as $name){
                                            echo $name->first_name . " " . $name->last_name;
                                        }
                                    ?></td>
                                    <td><?php echo $all->pcn_number;?></td>
                                    <td><?php 
                                        $get_pharm = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                        $get_pharm->bindvalue("pcn_number", $all->pcn_number);
                                        $get_pharm->execute();
                                        $pharms = $get_pharm->fetchAll();
                                        foreach($pharms as $pharm){
                                            echo $pharm->pharmacy;
                                        }
                                    ?></td>
                                    <td><?php echo $all->receipt_number;?></td>
                                    <td><?php echo date("jS M, Y", strtotime($all->tdate))?></td>
                                
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_pay->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                    
                </div>

                <!-- Send broadcast message -->
                <div id="broadcasts" class="displays">
                    <div class="mess_buttons">
                        <button id="broadcastbtn"><i class="fas fa-users"></i> Send Broadcast</button>
                        <button id="indbtn"><i class="fas fa-user"></i> Send to individual</button>
                    </div>
                    <div class="info"></div>
                    <div class="add_user_form" id="brd_mess">
                        <h3>Send Broadcast Message</h3>
                        <form method="POST">
                            <div class="inputs">
                                <div class="data">
                                    <label for="subject">Subject</label><br>
                                    <input type="text" name="subject" id="subject" placeholder="Message title" required>
                                </div>
                                
                            </div>
                            <div class="inputs">
                                <div class="data" style="width:100%;">
                                    <label for="broadcast_message">Message</label><br>
                                    <textarea name="broadcast_message" id="broadcast_message" cols="50" rows="10"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="send_broadcast">Send Broadcast <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <div class="add_user_form" id="single_mess">
                        <h3>Send message to individuals</h3>
                        <form method="POST">
                            <div class="inputs">
                                <div class="data">
                                    <label for="recipient">Recipient</label>
                                    <select name="recipient" id="recipient">
                                        <option value=""selected>Choose recipient</option>
                                        <?php
                                            $get_rec = $connectdb->prepare("SELECT * FROM users WHERE phone_number != 'admin'");
                                            $get_rec->execute();
                                            $recs = $get_rec->fetchAll();
                                            foreach($recs as $rec):
                                        ?>
                                        <option value="<?php echo $rec->user_id?>"><?php echo $rec->first_name." ".$rec->last_name?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="subject">Subject</label><br>
                                    <input type="text" name="ind_subject" id="ind_subject" placeholder="Message title" required>
                                </div>
                                
                            </div>
                            <div class="inputs">
                                <div class="data" style="width:100%;">
                                    <label for="ind_message">Message</label><br>
                                    <textarea name="ind_message" id="ind_message" cols="50" rows="10"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="send_ind">Send Broadcast <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <!-- events and news -->
                <div id="events_news"class="displays">
                    <div class="info"></div>
                    <div class="add_user_form" id="brd_mess">
                        <h3>Post events/news</h3>
                        <form method="POST" action="../controller/post_news.php" enctype="multipart/form-data">
                            <div class="inputs">
                                <div class="data">
                                    <label for="subject">Title</label><br>
                                    <input type="text" name="title" id="title" placeholder="Event/news title" required>
                                </div>
                                <div class="data">
                                    <label for="event_img">Upload Cover image</label>
                                    <input type="file" name="photo" id="photo">
                                </div>
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="event_date">Event Date</label>
                                    <input type="date" name="event_date" id="event_date">
                                </div>
                                <div class="data" style="width:100%; margin-top:10px;">
                                    <label for="broadcast_message">Details</label><br>
                                    <textarea name="details" id="details" cols="50" rows="10"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="post_event" name="post_event">Post <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <!-- uploaded events and news -->
                    <div class="uploaded">
                        <?php
                            $get_images = $connectdb->prepare("SELECT * FROM news_events ORDER BY post_date DESC");
                            $get_images->execute();
                            $photos = $get_images->fetchAll();
                            foreach($photos as $photo):
                        ?>
                        <figure>
                            <div class="photo">
                                <img src="<?php echo '../media/'.$photo->photo?>" alt="event">

                            </div>
                            <figcaption>
                                <h4><?php echo $photo->title?></h4>
                                <!-- <p><?php echo $photo->details?></p> -->
                                <a href="javascript:void(0)" title="Delete Event" onclick="deleteProject('<?php echo $photo->article_id?>')"><i class="fas fa-trash"></i></a>
                            </figcaption>
                        </figure>
                        <?php endforeach?>
                    </div>
                </div>
                <!-- gallery -->
                <div id="gallery" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form" id="brd_mess">
                        <h3>Add images to gallery</h3>
                        <form method="POST" action="../controller/post_media.php" enctype="multipart/form-data">
                            <div class="inputs">
                                <div class="data">
                                    <label for="subject">Title</label><br>
                                    <input type="text" name="title" id="title" placeholder="Event/news title" required>
                                </div>
                                <div class="data">
                                    <label for="event_-img">Upload image</label>
                                    <input type="file" name="photo" id="photo">
                                </div>
                            </div>
                            <button type="submit" id="post_media" name="post_media">Upload <i class="fas fa-upload"></i></button>
                        </form>
                    </div>
                    <!-- uploaded images -->
                    <div class="uploaded">
                        <?php
                            $get_images = $connectdb->prepare("SELECT * FROM media ORDER BY post_date DESC");
                            $get_images->execute();
                            $photos = $get_images->fetchAll();
                            foreach($photos as $photo):
                        ?>
                        <figure>
                            <div class="photo">
                                <img src="<?php echo '../media/'.$photo->photo?>" alt="">

                            </div>
                            <figcaption>
                                <h4><?php echo $photo->title?></h4>
                                <a href="javascript:void(0)" title="Delete Photo" onclick= "deletePhoto('<?php echo $photo->media_id?>')"><i class="fas fa-trash"></i></a>
                            </figcaption>
                        </figure>
                        <?php endforeach?>
                    </div>
                </div>
            </section>
        </div>
        
            
    </main>
    <script src="../jquery.js"></script>
    <script src="../jquery.table2excel.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    }else{
        header("Location: login_page.php");
    }
?>