<?php
    session_start();
    include "controller/connections.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN Edo State | Gallery</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/psn_logo2.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<section class="top_head" id="topHeader">
        <div class="social_media">
            <p>
                <span>Call us </span>(+234) 803 932 6112
            </p>
            <p>
                info@psnedo.com
            </p>
        </div>
        <div class="contact_phone">
            <ul>
                <li><a href="events_news.php">View events</a></li>
                <li><a href="pharmacies.php">Find pharmacist</a></li>
                <li><a href="https://www.pharmagateway.com.ng/" title="PharmaGateway">Pay Fees</a></li>

                <li><a href="javascript:void(0);">Covid-19 Updates</a></li>
            </ul>
        </div>
    </section>
    <section id="aboutBanner">
        <?php include "header.php";?>
        <div id="slider">
            <div class="about_banner">
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/acpn2.jpg" alt="ACPN">
                    </div>
                    <div class="taglines">
                        <h2>Photos and events </h2>
                        <p>As Noble men, we join hands (Founded 1927)</p>
                        <div class="btns">
                            <a href="javascrit:void(0)"><i class="fas fa-capsules"></i>Learn more</a>
                            <a href="views/registration.php">Login <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
    </section>
        <div id="events_media">
            <h3>Our Media Gallery</h3>
            <hr>
            <div id="plans">
                <div class="plans">
                    <!-- <h3>Our Urgent Care services</h3> -->
                
                    <?php
                        $get_media = $connectdb->prepare("SELECT * FROM media ORDER BY post_date DESC LIMIT 10");
                        $get_media->execute();
                        $fotos = $get_media->fetchAll();
                        foreach($fotos as $foto):
                    ?>
                    <div class="plan_form" id="plan1">
                        <figure>
                            <a href="<?php echo 'media/'.$foto->photo?>" target="_blank"title="<?php echo $foto->title?>">
                                <div class="gal_img">
                                    <img src="<?php echo "media/".$foto->photo?>" alt="<?php echo $foto->title?>">
                                </div>
                                <figcaption><?php echo $foto->title?></figcaption>
                            </a>
                        </figure>
                    </div>
                    
                    <?php endforeach?>
                    <!-- <a id="moreProjects" href="gallery.php" title="View more photos">View more <i class="fas fa-angle-double-right"></i></a> -->

                </div>
            </div>
        </div>
            
    
        <?php include "footer.php"?>


        <script src="script.js"></script>
        <script src="jquery.js"></script>
</body>
</html>