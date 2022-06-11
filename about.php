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
    <section id="aboutBanner">
        <?php include "header.php";?>
        
        <div id="slider">
            <div class="about_banner">
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/psn3.jpeg" alt="PSN">
                    </div>
                    <div class="taglines">
                        <h2>Who we are</h2>
                        <p>As Noble men, we join hands (Founded 1927)</p>
                        <div class="btns">
                            <a href="javascrit:void(0)"><i class="fas fa-capsules"></i>Learn more</a>
                            <a href="views/registration.php">Login <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
        <!-- <div class="client_assess">
            <a href="#reqMaster">Client Assessment Form</a><i class="fas fa-plus"></i>
        </div> -->
    </section>
    <!-- about page -->
    <section id="existence">
            <!-- <h2>Get to know us</h2> -->
            <hr>
            <h3>Our Existence</h3>
            <div class="story">
                <p id="first_story">Pharmaceutical Society of Nigeria (PSN) is a professional body for practicing pharmacists in Nigeria and was established in the year 1927 to instill discipline and maintaining professional ethics among members of the organization<br><br>
                The first president of the association was Late Mr T.K.E Phillips, who was inaugurated as the president in the year 1947. In 1956, the association was formally incorporated under its Articles of Association and was recognized as a professional society in Nigeria by the Federal government<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque provident consectetur asperiores nesciunt nulla maxime.
                <br>
                <span style="color:red">Text goes here</span>
                <br><br>
                <span style="color:red">Text goes here</span>
                <br><br>
                <img src="images/pharma-15.jpg" alt="PSN National Innauguration">
                
                <span style="color:red">Text goes here</span><br><br><span style="color:red">Text goes here</span><br><br>
                <span style="color:red">Text goes here</span>
                    <a id="invest_link" href="https://psnnational.org/wp-content/uploads/2021/05/THE-CONSTITUTION-OF-THE-PHARMACEUTICAL-SOCIETY-OF-NIGERIA-2020.pdf" target="_blank" title="PSN Constitution">Click to Download PSN Constitution <i class="fas fa-newspaper"></i></a>
                </p>
                <div class="more_notes">
                    <img src="images/psn2.jpg" alt="About PSN Edo"><br><br>

                    <h3>Aims and Objectives</h3>
                    
                    <!-- <p>.WHY IS BOB AND SIL THE RIGHT PARTNER?</p><br> -->

                    <p>
                    The Pharmaceutical Society of Nigeria was established with the following aims and objectives:</p>
                    <br>
                    <ul>
                        <li>To maintain a high standard of Professional ethics and discipline among its members</li>
                        <li>To promote and maintain a high standard of Pharmaceutical Education in Nigeria</li>
                        <li>To promote legislation for the enhancement of the image and the interest of the Pharmacy Profession and the Practitioners in Nigeria.</li>
                        <li>To collate and disseminate statistical, scientific and other information relating to Pharmacy and publish such in an Official Journal</li>
                        <li>To advice on Labour conditions relating to Pharmacists.</li>
                    </ul><br>
                    <h3>Code of Ethics</h3>
                    <p>The code of Professional conduct is the means by which the Pharmacy Profession may regulate itself and model the way they interact with clients, other health Professionals and the Community.<br><br>

                    The code of Ethics which has been designed by PCN is a means of assisting Pharmacists to discharge their moral and Professional obligations resting upon them to observe standards of conducts appropriate to their callings.<br><br>

                    This code of Ethics applies to all registered Pharmacists holding Licences, Certificates or Permit under the PCN Decree 91, of 1992 and Poison & Pharmacy Act Cap 535 1990.<br><br>

                    Pharmacy is a regulated Profession beginning from training to registration in the different areas of Practice.</p>
                </div>
            </div>
        </section>
        
        <section id="mission_vision" >
            <h2>Our purpose</h2>
            <hr>
            <div class="mission_vision">
                <div class="misvis" id="miss">
                    <h3>Our mission statement</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste numquam cupiditate quis possimus doloremque saepe sunt consectetur ut quaerat voluptates..</p>
                </div>
                <hr>
                <div class="misvis" id="viss">
                    <h3>Our vision</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores necessitatibus nam eos iure veniam laboriosam fuga architecto? Inventore, harum nemo.
                    </p>
                </div>
            </div>
        </section>
        <!-- <section id="values">
            <img src="images/shawsand_nurse.jpg" alt="core values">
            <div class="values">
                <h2>Core Values</h2>
                <ul>
                    <li><i class="fas fa-street-view"></i>Professionalism</li>
                    <li><i class="fas fa-users"></i>Compassion</li>
                    <li><i class="fas fa-user-graduate"></i>Pursuit of excellence</li>
                    <li><i class="fas fa-user"></i>Respect for people</li>
                    <li><i class="fas fa-book"></i>Confidentiality</li>
                    <li><i class="fas fa-users"></i>Customer focus</li>
                    
                </ul>
            </div>
        </section> -->
        <section id="team">
            <h2>Meet the team</h2>
            <hr>
            <p>            <p>The team that got PSN Edo ticking </p>
</p>
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
                <figure>
                    <img src="images/enabudoso_vivian.jpeg" alt="Vice Chairman">
                    <figcaption>
                        <h3>Pharm. Enabudosos Vivian <span>Vice Chairman</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/okoto_tessy.jpeg" alt="Treasurer">
                    <figcaption>
                        <h3>Pharm. Okoto Tessy Jolade<span>Treasurer</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/samson_obakpolor.jpeg" alt="Assistant Secretary">
                    <figcaption>
                        <h3>Pharm. Samson Obakpolor<span>Assistant Secretary</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/akhighu_john.jpeg" alt="PRO">
                    <figcaption>
                        <h3>Pharm. Akhighu John Ikhuoria<span>Public Relations Officer</span></h3>
                    </figcaption>
                </figure>
                <figure>
                    <img src="images/olobor_ehidiamen.jpeg" alt="Editorin chief">
                    <figcaption>
                        <h3>Pharm. Olobor Ehidiamen Precious<span>Editor in Chief</span></h3>
                    </figcaption>
                </figure>
            </div>
        </section>
        <?php include "footer.php";?>


        <script src="script.js"></script>
        <script src="jquery.js"></script>
</body>
</html>