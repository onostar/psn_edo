<?php
    session_start();
    include "controller/connections.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>PSN Edo State</title>
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
                        <img src="images/pharma-15.jpg" alt="PSN">
                    </div>
                    <div class="taglines">
                        <h2>Events and News Updates</h2>
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
    <section class="trends">
            <h2>Recent Events and stories</h2>
            <hr>
            <div class="topics">
                <?php
                    $get_events = $connectdb->prepare("SELECT SUBSTRING_INDEX(details, ' ', 40) AS details, article_id, title, photo FROM news_events ORDER BY post_date DESC");
                    $get_events->execute();
                    $views = $get_events->fetchAll();
                    foreach($views as $view):
                ?>
                <article class="articles">
                    <a href="javascript:void(0)" onclick="viewArticle('<?php echo $view->article_id?>')">
                        <img src="<?php echo 'media/'.$view->photo?>" alt="Impact of covid">
                        <div class="summary">
                            <h3><?php echo $view->title?></h3>
                            <p><?php echo $view->details?> <span>Read more...</span></p>
                        </div>
                    </a>
                </article>
                <?php endforeach?>
            </div>
            
        </section>
    
        <?php include "footer.php"?>


        <script src="script.js"></script>
        <script src="jquery.js"></script>
</body>
</html>