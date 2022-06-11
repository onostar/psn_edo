<?php
    session_start();
    require "../controller/connections.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN National Conference| Member Registration</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
        <section class="top_head" id="topHeader">
            <div class="social_media">
                <a href="javascript:void(0);" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook"></i></a>   
                <!-- <a href="javascript:void(0);" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a> -->   
                <a href="javascript:void(0);" target="_blank" title="Follow us on instagram"><i class="fab fa-instagram"></i></a>   
                <a href="javascript:void(0);" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin"></i></a>   
                <a href="https://wa.me/23412345678" target="_blank" title="Follow us on whatsapp"><i class="fab fa-whatsapp"></i></a>   
            </div>
            <div class="contact_phone">
                <button class="appointment" id="bookings">Book Appointment</button>
                <p class="text-right"><i class="fas fa-mobile-alt"></i> <span class="call">Call us:</span> +234712345678</p>
            </div>
        </section>
        <header>
            <h1 class="logo">
                <a href="../index.php" title="ACPN">
                    <img src="../images/acpn_logo.png" alt="PSN Logo" class="img-fluid">
                </a>
            </h1>
            <!-- <div class="search">
                <form class="form-inline" action="views/search_result.php" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number">
                    <button type="submit" name="search" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="search" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div> -->
            <h2 id="desktop_h2">Association of Community pharmacists of Nigeria</h2>
            <h2 id="mobile_h2">ACPN</h2>
            <!-- 
            <div class="other_menu">
                <a href="#" title="Our Gallery">Gallery</a>
            </div> -->
            <!-- <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="search_result.php">Download Slip</a></button>
                        <h3>OR</h3>
                        <a href="registration.php" id="signupBtn">Member Registration</a>
                    </div>
                </div>
            </div> -->
            <div class="cart">
                <a href="javascript:void(0);" title="Registered members"><i class="fas fa-users"></i> Notifications
                    <span id="cart_value">
                     <i class="fas fa-bell"></i></span></a>
            </div>
            <!-- <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div> -->
        </header>

    
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <h2>ACPN NIGERIA</h2>
        <!-- <hr> -->
        <P id="p"> Excellence 2022 conference registration</P>

        <section id="login_reg">
            <div class="banners reg">
                <div class="slide">
                    <div class="images">
                        <img src="../images/acpn.jpg" alt="psn_banner">

                    </div>
                    <div class="images">
                        <img src="../images/pharmacist.png" alt="psn_banner">
                    </div>
                    <div class="images">
                        <img src="../images/acpn2.jpg" alt="psn_banner">
                    </div>
                </div>
                
            </div>
            <div class="reg_form reg">
                <form action="../controller/register.php" method="POST" enctype="multipart/form-data" id="register" class="form register_form">
                    <div class="error">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo "<p>". $_SESSION['error']. "</p>";
                                unset($_SESSION['error']);
                            }
                        ?>
                    </div>
                    <h3>Registration form</h3>
                    <div class="inputs">
                        <div class="data">
                            <input type="text" name="first_name" id="firstName" placeholder="First Name" required>

                        </div>
                        <div class="data">
                            <input type="text" name="last_name" id="lastName" placeholder="Last Name" required>

                        </div>
                        <div class="data">
                            <input type="tel" name="whatsapp" id="whatsApp" placeholder="Whatsapp Number" required onchange="checkNumber(this.value)">
                        </div>
                        <div class="data">
                            <input type="tel" name="other_number" id="otherNumber" placeholder="Other Numbers" onchange="checkNumber(this.value)">
                        </div>
                        <div class="data">
                            <select name="res_state" id="state">
                                <option value="" selected>Select state</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa-ibom">Akwa-ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross rivers">Cross rivers</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="Gombe">Gombe</option>
                                
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwarra">Kwarra</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nassarawa">Nassarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                                <option value="FCT">FCT</option>
                            </select>
                        </div>
                        <div class="data">
                            <input type="email" name="user_email" id="email" placeholder="Email address" required>
                        </div>
                        <div class="data">
                            <input type="text" name="pcn_number" id="pcn_number" placeholder="PCN Number" required>
                        </div>
                        <div class="data">
                            <label for="passport">Upload Passport photograph</label>
                            <input type="file" name="passport" id="passport" required>
                        </div>
                        
                        <div class="data" id="new">
                            <button type="submit" name="register_user" id="register_user">Register <i class="fas fa-paper-plane"></i></button>
                            <a href="registration.php" alt="sign in">Sign in <i class="fas fa-sign-in-alt"></i></a>
                            
                        </div>
                        
                    </div>
                    
                </form>
                
            </div>
            
        </section>
        
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>