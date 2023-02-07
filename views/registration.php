<?php
    session_start();
    require "../controller/connections.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN Portal| Member Registration</title>
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
    <section class="reg_log">
                
                <div class="login_page" id="reg_form">
                    <h1>
                        <a href="../index.php">
                            <img src="../images/psn_logo2.png" alt="logo">
                        </a>
                    </h1>
                    
                    <h2>Welcome Pharmacist!</h2>
                    <p>Register your details</p>
                    <?php
                        if(isset($_SESSION['success'])){
                            echo "<p class='success'>" . $_SESSION['success']. "</p>";
                            unset($_SESSION['success']);
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p class='error'>" . $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="../controller/register.php" method="POST" enctype="multipart/form-data" id="exh_register" class="form">
                        <div class="input">
                            <div class="data">
                                <input type="text" name="first_name" id="firstName" placeholder="First Name" required>

                            </div>
                            <div class="data">
                                <input type="text" name="last_name" id="lastName" placeholder="Last Name" required>

                            </div>
                        </div>
                        <div class="input">
                            <div class="data">
                                <select name="pharmacist_class" required>
                                    <option value="" selected>Pharmacist Designation</option>
                                    <option value="Superintendent Pharmacist">Superintendent Pharmacist</option>
                                    <option value="Locum Pharmacist">Locum Pharmacist</option>
                                </select>
                            </div>
                            <div class="data">
                                <input type="text" name="pcn_number" id="pcn_number" placeholder="PCN Number" required>
                            </div>
                        </div>
                        <div class="input">
                            <div class="data">
                                <select name="gender" required>
                                    <option value="" selected>Pharmacist Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="data">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="input">
                            <div class="data">
                                <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required onchange="checkNumber(this.value)">
                            </div>
                            <div class="data">
                                <input type="email" name="user_email" id="email" placeholder="Email address" required>
                            </div>
                        </div>
                        <div class="input">
                            <div class="data">
                                <input type="text" name="pharmacy" id="pharmacy" placeholder="Place of practice">
                            </div>
                            <div class="data">
                                <input type="text" name="pharmacy_address" id="pharmacy_address" placeholder="Place of Practice Address">
                            </div>
                        </div>
                        <div class="input">
                            <div class="data">
                                <select name="pharmacy_location" id="pharmacy_location" required>
                                    <option value="" selected>Select location</option>
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
                            <div class="data">
                                <select name="tech_group" id="tech_group">
                                    <option value=""selected>Select Technical group</option>
                                    <option value="PSN-YPG">PSN-YPG</option>
                                    <option value="ACPN">ACPN</option>
                                    <option value="NAPA">NAPA</option>
                                    <option value="NAIP">NAIP</option>
                                    <option value="ALPS">ALPS</option>
                                    <option value="CPAN">CPAN</option>
                                    <option value="AHAPN">AHAPN</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="inputs">
                        <div class="data">
                                <label for="passport">Upload Passport photograph</label>
                                <input type="file" name="passport" id="passport" required>
                            </div>
                        </div>
                        <div class="data" id="reg_btn">
                            <button type="submit" name="register_user" id="register_user">Register <i class="fas fa-paper-plane"></i></button>
                            
                        </div>
                        
                    
                    
                </form>
                    <div class="signup_option">
                        <p>Already have an account? <a href="login_page.php">Login now</a></p>
                    </div>
                    <div id="foot">
                        <p >&copy;<?php echo Date("Y");?> PSN Edo. All Rights Reserved.</p>

                    </div>

                </div>
                <div class="adds" id="reg_adds">
                    <img src="../images/pharm_1.jpg" alt="PSN">
                </div>
            </section>
    
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>