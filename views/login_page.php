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
    <title>PSN| Member Portal</title>
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
                
                <div class="login_page">
                    <h1>
                        <a href="../index.php">
                            <img src="../images/psn_logo2.png" alt="logo">
                        </a>
                    </h1>
                    
                    <h2>Welcome Member!</h2>
                    <p>Sign in to continue</p>
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
                    <form action="../controller/login.php" method="POST">
                        <div class="data">
                            <label for="username">Enter username</label>
                            <input type="text" name="username" id="username" placeholder="registered phone number" required>
                        </div>
                        <div class="data">
                            <div class="pass">
                                <label for="password">Enter PCN number</label>
                                <a href="forgot_password.php" title="Recover your password">Forgot password?</a>
                            </div>
                            <input type="password" name="password" id="password" placeholder="*******" required>
                        </div>
                        <div class="data">
                            <button type="submit" id="login" name="login">Sign in <i class="fas fa-sign-in-alt"></i></button>

                        </div>
                        
                    </form>
                    <div class="signup_option">
                        <p>Don't have an account yet? <a href="registration.php">Signup now</a></p>
                    </div>
                    <div id="foot">
                        <p >&copy;<?php echo Date("Y");?> PSN Edo. All Rights Reserved.</p>

                    </div>

                </div>
                <div class="adds">
                    <!-- <img src="../images/pharmacy.jpg" alt="PSN edo"> -->
                </div>
            </section>
        
            
       
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>