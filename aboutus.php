<!DOCTYPE html>
<?php
require_once 'php/db_connect.php';

session_start();

if(!isset($_SESSION['languageArray'])){
    $message_resource = $db->query("SELECT * FROM message_resource");
    $languageArray = Array();
    
    while($row=mysqli_fetch_assoc($message_resource)){
        $languageArray[$row['message_key_code']] = array("en"=>$row['en'],"ch"=>$row['ch']);
    }
    
    $_SESSION['languageArray'] = $languageArray;
}
else{
    $languageArray = $_SESSION['languageArray'];
}

if(!isset($_SESSION['language'])){
    $language = "ch";
}
else{
    $language = $_SESSION['language'];
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site Description Here">
        <link rel="shortcut icon" href="assets/images/favicon.png">
        
        <title>SWK | Sandalwood Tea</title>
        
        <link href="assets/css/uikit.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/uikit-width-ex.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/animations.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700%7CLora:400,400i%7CShadows+Into+Light:400" rel="stylesheet" />
        
    </head>
    <body class="loading">
        <div class="tw-preloader">
            <div data-uk-spinner></div>
        </div>
        <div class="header-container tw-header tw-header-transparent uk-light">
            <nav class="uk-navbar-container uk-flex-center" data-uk-navbar>
                <div class="uk-navbar-left">
                    <div class="tw-logo">
                        <h3 class="site-name">
                            <a href="index.php"><img src="assets/demo/logo.png"></a>
                        </h3>
                    </div>
                </div>
                <div class="uk-navbar-center">
                    <ul class="tw-main-menu uk-visible@m">
                        <li class="menu-item">
                            <a href="aboutus.php"><?=$languageArray['nav_about_us'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="sandalwood.php"><?=$languageArray['nav_history'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="product.php"><?=$languageArray['nav_product_info'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="testimony.php"><?=$languageArray['nav_testimony'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="gallery.php"><?=$languageArray['nav_gallery'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="contactus.php"><?=$languageArray['nav_contact_us'][$language] ?></a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#"><?=$languageArray['nav_language'][$language] ?></a>
                            <ul class="sub-menu uk-animation-fade">
                                <li><a href="php/english.php">English</a></li>
                                <li><a href="php/chinese.php">中文</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <div class="tw-header-meta">
                        <a class="mobile-menu uk-navbar-toggle uk-hidden@m" href="#" data-uk-toggle="target: #mobile-menu-modal"><i class="ion-navicon-round"></i></a>
                    </div>
                </div>
                <div id="modal-full" class="uk-modal-full uk-modal" data-uk-modal>
                    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport>
                        <button class="uk-modal-close-full" type="button" data-uk-close></button>
                    </div>
                </div>
                <div id="mobile-menu-modal" class="uk-modal-full" data-uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-full" type="button" data-uk-close></button>
                        <div class="uk-light uk-height-viewport tw-mobile-modal uk-flex uk-flex-middle uk-flex-center" data-uk-scrollspy="target:>ul>li,>div>a; cls:uk-animation-slide-bottom-medium; delay: 150;">
                            <ul class="uk-nav-default uk-nav-parent-icon" data-uk-nav>
                                <li class="uk-parent">
                                    <a href="aboutus.php"><?=$languageArray['nav_about_us'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="sandalwood.php"><?=$languageArray['nav_history'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="product.php"><?=$languageArray['nav_product_info'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="testimony.php"><?=$languageArray['nav_testimony'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="gallery.php"><?=$languageArray['nav_gallery'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="contactus.php"><?=$languageArray['nav_contact_us'][$language] ?>/a>
                                </li>
                                <li class="uk-parent">
                                    <a href="#"><?=$languageArray['nav_language'][$language] ?></a>
                                    <ul class="uk-nav-sub">
                                        <li><a href="php/english.php">English</a></li>
                                        <li><a href="php/chinese.php">中文</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--div class="tw-socials tw-socials-minimal">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-pinterest"></i></a>
                            </div-->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main-container">
            <section class="uk-section uk-section-large uk-light" data-uk-parallax="bgy: -200" data-overlay="0.6" style="background-color: #151515; background-image: url(assets/demo/cloud.jpg)">
                <div class="uk-container">
                    <div class="tw-carousel-testimonial uk-text-center">
                        <div class="owl-carousel owl-theme" data-uk-scrollspy="target:.testimonial-item; cls:uk-animation-slide-bottom-medium; delay: 350;">


                            <div class="testimonial-item">
                                <h3 class="testimonial-title">What People say</h3>
                                <div class="testimonial-content">
                                    <p>
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris justo dapibus condimentum
                                        amet augue sed non.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <span>Alex Patterson  /  Envato</span>
                                </div>
                            </div>

                            <div class="testimonial-item">
                                <h3 class="testimonial-title">What People say</h3>
                                <div class="testimonial-content">
                                    <p>
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris justo dapibus condimentum
                                        amet augue sed non.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <span>Alex Patterson  /  Envato</span>
                                </div>
                            </div>

                            <div class="testimonial-item">
                                <h3 class="testimonial-title">What People say</h3>
                                <div class="testimonial-content">
                                    <p>
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris justo dapibus condimentum
                                        amet augue sed non.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <span>Alex Patterson  /  Envato</span>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </section>
            <section class="uk-section uk-section-normal">
                <div class="uk-container">

                    <div class="tw-element tw-heading uk-text-center">
                        <h3>
                            Our Clients
                        </h3>
                        <p class="subtitle">
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris erat justo condimentum sit
                            amet augue.
                        </p>
                    </div>

                    <div class="tw-element tw-clients">
                        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-expand@m uk-flex-middle" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 400;">

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="Leonard Morrison" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-1.png" alt="" /></a>
                            </div>

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="Tramplaine" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-2.png" alt="" /></a>
                            </div>

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="Frobes" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-3.png" alt="" /></a>
                            </div>

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="HoneyDew" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-4.png" alt="" /></a>
                            </div>

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="Darkside Cafe" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-5.png" alt="" /></a>
                            </div>

                            <div class="client-item">
                                <a href="#" class="uk-padding-small" title="Hookmiller" data-uk-tooltip="animation: uk-animation-slide-top"><img src="assets/demo/partner/partner-6.png" alt="" /></a>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <footer class="uk-section uk-padding-remove-vertical uk-light" style="background-color: #222222;">
                <div class="bottom-area">
                    <div class="uk-container">
                        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-medium" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 200;">
                            <div>
                                <div class="widget">
                                    <div class="tw-logo">
                                        <h3 class="site-name">
                                            <a href="#"><img src="assets/demo/logo.png"></a>
                                        </h3>
                                    </div>
                                    <p><?=$languageArray['footer_description'][$language] ?></p>
                                    <!--<div class="tw-socials">
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                        <a href="#"><i class="ion-social-pinterest"></i></a>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                        <a href="#"><i class="ion-social-youtube"></i></a>
                                        <a href="#"><i class="ion-social-rss"></i></a>
                                    </div>-->
                                </div>
                            </div>

                            <div>&nbsp;</div>

                            <div class="widget">
                                <div class="uk-padding-left">
                                    <h3 class="widget-title"><span><?=$languageArray['footer_useful_link'][$language] ?></span></h3>
                                    <ul>
                                        <li>
                                            <a href="aboutus.php"><?=$languageArray['footer_about_us'][$language] ?></a>
                                        </li>
                                        <li>
                                            <a href="sandalwood.php"><?=$languageArray['footer_history'][$language] ?></a>
                                        </li>
                                        <li>
                                            <a href="product.php"><?=$languageArray['footer_product_info'][$language] ?></a>
                                        </li>
                                        <li>
                                            <a href="testimony.php"><?=$languageArray['footer_testimony'][$language] ?></a>
                                        </li>
                                        <!--li>
                                            <a href="#">Privacy Policy</a>
                                        </li-->
                                        <li>
                                            <a href="gallery.php"><?=$languageArray['footer_gallery'][$language] ?></a>
                                        </li>
                                        <li>
                                            <a href="contactus.php"><?=$languageArray['footer_contact_us'][$language] ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div>
                                <div class="widget tw-contact-widget">
                                    <h3 class="widget-title"><span><?=$languageArray['footer_contact_info'][$language] ?></span></h3>
                                    <ul>
                                        <li>
                                            <i class="ion-ios-location"></i>
                                            <a href="#">72-1-20, Jalan Mahsuri, Bandar Sunway Tunas, 11900 Bayan Lepas, Pulau Pinang</a>
                                        </li>
                                        <li>
                                            <i class="ion-android-call"></i>
                                            <a href="#">(604) 5368 942</a>
                                        </li>
                                        <li>
                                            <i class="ion-android-mail"></i>
                                            <a href="#">swk@gmail.com</a>
                                        </li>
                                        <li>
                                            <i class="ion-ios-world-outline"></i>
                                            <a href="#">www.swk1893.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>      
                </div>
                    
                <div class="footer-area footer-small">
                    <div class="uk-container">
                        <div class="uk-flex-middle uk-child-width-1-1 uk-child-width-expand@m" data-uk-grid>
                            <div class="copyright">
                                © Copyright 2017 - All Rights Reserved
                            </div>
                            <div class="uk-text-right">
                                <a href="" data-uk-scroll><?=$languageArray['footer_back_to_top'][$language] ?> &nbsp;&nbsp;<i class="ion-ios-arrow-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- .main-container close -->        
        <script src="assets/js/jquery-3.2.0.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
</html>