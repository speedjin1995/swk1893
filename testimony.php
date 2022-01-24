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
        <link rel="shortcut icon" href="assets/demo/logo.png">
        
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
            <section class="uk-section uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center"
            data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/page-bg.jpg); height: 500px;">
                <div class="tw-page-title-container tw-element">
                    <h1 class="tw-page-title uk-text-uppercase">Services</h1>
                </div>
                <div class="tw-breadcrumb-container uk-position-absolute uk-position-bottom-center tw-element">
                    <a href="index.php" class="tw-breadrumb-child home">Home</a>
                    <a href="#" class="tw-breadrumb-child">Pages</a>
                    <a href="#" class="tw-breadrumb-child">Services</a>
                </div>
            </section>
            <section class="uk-section">
                <div class="uk-container">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3>
                            Why choose us ?
                        </h3>
                        <p class="subtitle">
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris erat justo condimentum sit amet augue.
                        </p>
                    </div>
                    
                    <div class="tw-element uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 300;">
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-laptop"></i>
                                <h4>
                                    Web Design
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-tools-2"></i>
                                <h4>
                                    Web Development
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-global"></i>
                                <h4>
                                    Social Media
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-mobile"></i>
                                <h4>
                                    Fully responsive
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-puzzle"></i>
                                <h4>
                                    Graphic Design
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="et-happy"></i>
                                <h4>
                                    Friendly Support
                                </h4>
                                <p class="description">
                                    Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit erot auctor ornare lorem ipsum odio.
                                </p>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </section>
            <section class="uk-section uk-light" data-uk-parallax="bgy: -200" data-overlay="0.5" style="background-color: #151515; background-image: url(assets/demo/process-bg.jpg);">
                <div class="uk-container">
                    <div class="tw-process uk-text-center tw-element uk-child-width-expand@l uk-child-width-1-2@s normal" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-right-medium; delay: 300;">
                        <div class="tw-process-block uk-padding-large">
                            <div class="tw-process-circle uk-border-circle">
                                <span class="tw-process-number">01</span>
                                <h3 class="uk-text-uppercase">Idea</h3>
                            </div>
                            <p>Duis odio sit amet nibh vulputate auctor.</p>
                        </div>
                        <div class="tw-process-block uk-padding-large">
                            <div class="tw-process-circle uk-border-circle">
                                <span class="tw-process-number">02</span>
                                <h3 class="uk-text-uppercase">Planing</h3>
                            </div>
                            <p>Duis odio sit amet nibh vulputate auctor.</p>
                        </div>
                        <div class="tw-process-block uk-padding-large">
                            <div class="tw-process-circle uk-border-circle">
                                <span class="tw-process-number">03</span>
                                <h3 class="uk-text-uppercase">Create</h3>
                            </div>
                            <p>Duis odio sit amet nibh vulputate auctor.</p>
                        </div>
                        <div class="tw-process-block uk-padding-large">
                            <div class="tw-process-circle uk-border-circle">
                                <span class="tw-process-number">04</span>
                                <h3 class="uk-text-uppercase">Success</h3>
                            </div>
                            <p>Duis odio sit amet nibh vulputate auctor.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="uk-section uk-section-small">
                <div class="uk-container">
                    <div class="uk-child-width-1-2@m uk-flex-middle" data-uk-grid>
                        <div>
                            <div class="tw-element tw-accordion">
                                <ul data-uk-accordion="collapsible: false;">
                                    <li>
                                        <h3 class="uk-accordion-title">Accordion first</h3>
                                        <div class="uk-accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="uk-accordion-title">Accordion second</h3>
                                        <div class="uk-accordion-content">
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="uk-accordion-title">Accordion third</h3>
                                        <div class="uk-accordion-content">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="uk-accordion-title">Accordion fourth</h3>
                                        <div class="uk-accordion-content">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="tw-element">
                                <img src="assets/demo/pages/page-service.jpg" alt="" />
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