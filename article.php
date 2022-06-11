<?php
    session_start();
    include "controller/connections.php";

    if(isset($_GET['article'])){
        $article = $_GET['article'];
        $get_news = $connectdb->prepare("SELECT * FROM news_events WHERE article_id = :article_id");
        $get_news->bindvalue("article_id", $article);
        $get_news->execute();
        $news = $get_news->fetchAll();
        foreach($news as $new):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN Edo State <?php echo $new->title?></title>
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
                        <img src="<?php 
                            if($new->photo == ''){
                                echo 'images/acpn2.jpg';
                            }else{
                                echo 'media/'.$new->photo;
                            }
                        ?>" alt="ACPN">
                    </div>
                    <div class="taglines">
                        <h2><?php echo $new->title?></h2>
                        
                    </div>
                </div>
                
                
            </div>
            
        </div>
    </section>
    <div class="article_details">
        <h3><?php echo $new->title?></h3>
        <p>
            <?php echo $new->details?>
        </p>
    </div>
    
        <?php include "footer.php"?>


        <script src="script.js"></script>
        <script src="jquery.js"></script>
</body>
</html>

<?php endforeach; }?>