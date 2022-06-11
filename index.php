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
    <section id="banner">
        <?php include "header.php";?>

        <div id="slider">
            <div class="slides">
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/pharmacy.jpg" alt="ACPN">
                    </div>
                    <div class="taglines">
                        <h2>Pharmaceutical society of Nigeria, Edo Chapter</h2>
                        <p>As men of honour, we join hands (Founded 1927)</p>
                        <div class="btns">
                            <a href="javascrit:void(0)"><i class="fas fa-capsules"></i>Learn more</a>
                            <a href="views/login_page.php">Login <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/black_pharmacist.jpg" alt="ACPN national conference">
                    </div>
                    <div class="taglines taglines2">
                        <h2>Creating a platform for best pharmacy practice</h2>
                        <!-- <p>Be a part of this year's Annual National conference. Register below</p> -->
                        
                        <div class="btns">
                            <a href="javascript:void(0)"><i class="fas fa-capsules"></i>view events</a>
                            <a href="views/registration.php">Register <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- <div class="client_assess">
            <a href="#reqMaster">Client Assessment Form</a><i class="fas fa-plus"></i>
        </div> -->
    </section>
    <!-- trending news -->
    <section id="trending">
        <h4>Trending</h4>
        <div class="trendings">
            <marquee behavior="" direction="">
                <?php
                    $get_trends = $connectdb->prepare("SELECT * FROM news_events ORDER BY post_date DESC LIMIT 5");
                    $get_trends->execute();
                    $trends = $get_trends->fetchAll();
                    foreach($trends as $trend):
                ?>
                        <a href="javascript:void(0)" onclick="viewArticle('<?php echo $trend->article_id?>')"><?php echo $trend->title?></a>
                <?php endforeach?>
            </marquee>
            
        </div>
    </section>
    <!-- about section -->
    <section id="about_us">
            <div class="about_banner">
                <div class="banner_img">
                    <img src="images/psn3.jpeg" alt="psn members">

                </div>
                <div class="clients">
                    <div class="client_icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3><?php
                        $get_members = $connectdb->prepare("SELECT * FROM users WHERE phone_number != 'admin'");
                        $get_members->execute();
                        echo $get_members->rowCOunt();

                    ?></h3>
                    <p>Members</p>
                </div>
            </div>
            <div class="about_text">
                <h3>As Men of Honour, We join Hands</h3>
                <h2>A brief information about PSN Edo state</h2>
                <div class="notes">
                    <div class="notes_1">
                        <p>Pharmaceutical Society of Nigeria (PSN) is a professional body for practicing pharmacists in Nigeria and was established in the year 1927 to instill discipline and maintaining professional ethics among members of the organization.<br><br>The first president of the association was Late Mr T.K.E Phillips, who was inaugurated as the president in the year 1947. In 1956, the association was formally incorporated under its Articles of Association and was recognized as a professional society in Nigeria by the Federal government</p><br>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam ipsa fuga eos accusamus autem ipsum sint, totam, culpa sequi nulla non? Soluta eaque optio sit illo, voluptatem nemo eveniet necessitatibus voluptates distinctio aut officia veritatis iure. Reiciendis facilis quisquam alias.</p><br> -->
                        <div class="about_btns">
                            <a class="about_btn" href="about.php">Read more <i class="fas fa-angle-double-right"></i></a>

                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Mission and team members -->
        <section id="why_choose">
            <div class="reasons">
                <h3 id="this">What we stand for</h3>
                <h2>We are Building a Sustainable Future</h2>
                <div class="all_reasons">
                    <div class="reason">
                        <div class="reason_icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="reason_note">
                            <h3>Our mission</h3>
                            <p> Some text goes here</p>
                        </div>
                    </div>
                    <div class="reason">
                        <div class="reason_icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="reason_note">
                            <h3>Our vision</h3>
                            <p>Some text goes here.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <div class="reason_icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="reason_note">
                            <h3>Core values</h3>
                            <p>Some text goes here</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="excos">
                <!-- <h3>Executive Committee</h3> -->
                <div class="our_service">
                    
                    <div class="service_box" id="box1">
                        <div class="service_img">
                            <img src="images/drugs_img.jpg" alt="Solar energy">
                        </div>
                        <div class="service_note">
                            <i class="fas fa-user-tie"></i>

                            <h3>Drug management</h3>
                            <p>Drug control amongst the community pharmacy</p>
                        </div>
                    </div>
                    <div class="service_box" id="box2">
                        <div class="service_img">
                            <img src="images/drugs.webp" alt="Solar energy">
                        </div>
                        <div class="service_note">
                        <i class="fas fa-capsules"></i>

                        <h3>Drug management</h3>
                            <p>Drug control amongst the community pharmacy</p>
                        </div>
                    </div>
                    <div class="service_box" id="box3">
                        <div class="service_img">
                            <img src="images/black_pharmacist.jpg" alt="Solar energy">
                        </div>
                        <div class="service_note">
                            <i class="fas fa-users"></i>
                            <h3>Professionalism</h3>
                            <p>Maintaining high standard of professional ethics among pharmacists</p>
                        </div>
                    </div>
                    <div class="service_box" id="box4">
                        <div class="service_img">
                            <img src="images/black_pharmacist.jpg" alt="PSN">
                        </div>
                        <div class="service_note">
                        <i class="fas fa-user-tie"></i>

                        <h3>Professionalism</h3>
                            <p>Maintaining high standard of professional ethics among pharmacists</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- hero section -->
        <section id="covid" class="whyChoose">
            <?php
                $get_events = $connectdb->prepare("SELECT SUBSTRING_INDEX(details, ' ', 30) AS details, article_id, title, photo FROM news_events WHERE event_date < CURDATE() ORDER BY event_date DESC LIMIT 1");
                $get_events->execute();
                $views = $get_events->fetchAll();
                foreach($views as $view):
            ?>
            <img src="images/pharm.jpg" alt="about us">
            <div class="choose_text">
                <div class="chooseImg">
                    <img src="<?php echo 'media/'.$view->photo?>" alt="PSN edo state">
                </div>
                <div class="texts">
                <h3>Recent Event</h3>   
                <h2><?php echo $view->title?></h2>
                <p><?php echo $view->details?> <span>Read more...</span></p>
                    <div class="btns">
                        <a href="javascript:void(0)" onclick="viewArticle('<?php echo $view->article_id?>')">Learn More <i class="fas fa-info"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach?>
            
        </section>
        
        <!-- team members -->
        <section id="team">
            <h2>Meet the team</h2>
            <hr>
            <p>The team that got PSN Edo ticking </p>
            <div class="team">
                <figure>
                    <img src="images/cyril_odianose.jpeg" alt="National President">
                    <figcaption>
                        <h3>Prof. Cyril Odianose Usifoh<span>National President</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/enadeghe_osaretin.jpeg" alt="Chairman">
                    <figcaption>
                        <h3>Dr. Enadeghe Osaretin Davy <span>Chairman</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/aniekee_aloysius.jpeg" alt="Secretary">
                    <figcaption>
                        <h3>Pharm. Aniekee Aloysius O.<span>Secretary</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/chris_oisakede.jpeg" alt="Financial Secretary">
                    <figcaption>
                        <h3>Pharm. Chris Oisakede<span>Fianacial Secretary</span></h3>
                    </figcaption>
                </figure>
            </div>
            <div class="more_team">
                <a href="about.php#team" title="View team members">View more <i class="fas fa-angle-double-right"></i></a>
            </div>
        </section>
        
    <!-- hero 2 -->
        <section class="investment">
            <?php
                $get_events = $connectdb->prepare("SELECT SUBSTRING_INDEX(details, ' ', 50) AS details, article_id, title, photo, event_date FROM news_events WHERE event_date >= CURDATE() ORDER BY event_date DESC LIMIT 1");
                $get_events->execute();
                $views = $get_events->fetchAll();
                foreach($views as $view):
            ?>
            <div class="invest_img" id="invest_img1">
                <!-- <img src="images/pool3.jpeg" alt="restaurant"> -->
                <img src="<?php echo 'media/'.$view->photo?>" alt="Upcoming event">

            </div>
            <div class="intro" id="intro_add">
                <p>Upcoming Events</p>
                <h2><?php echo $view->title?></h2>
                <p><?php echo $view->details?></p>
                <br>
                <p id="ev_date">Date: <?php echo date("jS M, Y", strtotime($view->event_date))?></p>
                <a href="javascript:void(0)" onclick="viewArticle('<?php echo $view->article_id?>')">Discover more <i class="fas fa-angle-double-right"></i></a>
            </div>
            <?php endforeach;?>
            <?php
                if(!$get_events->rowCount() > 0){
                    echo "<p class='upcoming'>No Upcoming Event!</p>";
                }
            ?>
        </section>
        <!-- gallery -->
        <Section id="plans">
            <h3 class="plans_title">Our Gallery</h3>
            <h2>Photos and media</h2>
            <p class="first_p">Discover some of our exciting scenes</p>
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
                <a id="moreProjects" href="gallery.php" title="View more photos">View more <i class="fas fa-angle-double-right"></i></a>

            </div>
            
        </section>
        <!-- events and stories -->
        <section class="trends">
            <h2>News and Events</h2>
            <hr>
            <div class="topics">
                <?php
                    $get_events = $connectdb->prepare("SELECT SUBSTRING_INDEX(details, ' ', 40) AS details, article_id, title, photo FROM news_events ORDER BY post_date DESC LIMIT 2");
                    $get_events->execute();
                    $views = $get_events->fetchAll();
                    foreach($views as $view):
                ?>
                <article>
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
            <div class="more">
                <a href="events_news.php">View more <i class="fas fa-paper-plane"></i></a>
            </div>
        </section>
        <?php include "footer.php"?>


        <script src="script.js"></script>
        <script src="jquery.js"></script>
</body>
</html>