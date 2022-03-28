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
        <link rel="shortcut icon" href="assets/demo/icon.png">
        
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
                        <!--li class="menu-item">
                            <a href="aboutus.php"><?=$languageArray['nav_about_us'][$language] ?></a>
                        </li-->
                        <li class="menu-item">
                            <a href="sandalwood.php"><?=$languageArray['nav_history'][$language] ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="knowledge.php"><?=$languageArray['nav_knowledge'][$language] ?></a>
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
                                <!--li class="uk-parent">
                                    <a href="aboutus.php"><?=$languageArray['nav_about_us'][$language] ?></a>
                                </li-->
                                <li class="uk-parent">
                                    <a href="sandalwood.php"><?=$languageArray['nav_history'][$language] ?></a>
                                </li>
                                <li class="menu-item">
                                    <a href="knowledge.php"><?=$languageArray['nav_knowledge'][$language] ?></a>
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
                                    <a href="contactus.php"><?=$languageArray['nav_contact_us'][$language] ?></a>
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
            <section class="uk-section uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/sandalwood.jpg); height: 500px;">
                <div class="tw-page-title-container tw-element">
                    <h1 class="tw-page-title uk-text-uppercase"><?=$languageArray['page_knowledge'][$language] ?></h1>
                </div>
            </section>
            <section class="uk-section uk-section-normal">
                <div class="tw-element tw-portfolio promo">

                    <div class="portfolio-item category-print uk-padding-large">
                        <div class="uk-container">
                            <div class="uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m  uk-child-width-1-1@s" data-uk-grid>
                                <div id="video" class="entry-media uk-responsive-width tw-video" data-video="target:.tw-video-container;show_play:true;hide_pause:true;loop:true" data-uk-scrollspy="target: .promo-image-container; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                    <div class="promo-image-container">
                                        <!--<button type="button" class="tw-video-icon" data-uk-toggle="target: #video>*"><i class="ion-play"></i></button>-->
                                        <img class="promo-image uk-box-shadow-small" src="assets/demo/sandalwood1.jpg">
                                    </div>
                                    <!--<div class="tw-video-container" hidden><iframe width="853" height="480" src="https://www.youtube.com/embed/fafEHMnFe3g" allowfullscreen></iframe></div>-->
                                </div>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="tw-element promo-text-container full tw-box big-typography" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                        <h6 class="tw-sub-title"></h6>
                                        <h1 class="tw-big-title">檀香树</h1>
                                        <p>檀香树每年都会增值它的价值是一年至少5至12巴仙， 因为天气的变化， 马来西亚气候变成了种植檀香树最佳地方， 就如以前美国的檀香山，因为天气暖化，而不能种檀香树，就是现在的夏威夷。
                                        </p>
                                        <!--a href="#" class="uk-button uk-button-silver uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Read More</span><i class="ion-ios-arrow-thin-right"></i></span></a-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="uk-margin-large">

                    <div class="portfolio-item category-print uk-padding-large">
                        <div class="uk-container">
                            <div class="uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m  uk-child-width-1-1@s" data-uk-grid>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="tw-element promo-text-container full tw-box big-typography" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                        <h6 class="tw-sub-title"></h6>
                                        <h1 class="tw-big-title">檀香树的医药解释</h1>
                                        <p>檀香树酸性非常的高,所以他的茶叶会使人减瘦。檀香树的茶叶本品味辛性温，气味芳香功能宣发气滞，畅膈宽胸，温胃散寒。凡胸腹疼痛，噎膈呕吐等症，均可应用。
                                        </p>
                                        <!--a href="#" class="uk-button uk-button-silver uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Read More</span><i class="ion-ios-arrow-thin-right"></i></span></a-->
                                    </div>
                                </div>
                                <div data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                    <div class="promo-carousel-container uk-light uk-box-shadow-small">
                                        <div class="onhover owl-theme" data-uk-scrollspy="target: .shop-item; cls:uk-animation-slide-bottom-medium; delay: 300;">
                                            <div class="gallery-item">
                                                <div class="shop-content">
                                                    <img alt="Backpack In Black" src="assets/demo/sandalwood2.jpg">
                                                </div>
                                            </div>
                                            <!--<div class="gallery-item">
                                                <div class="shop-content">
                                                    <img alt="Backpack In Black" src="assets/demo/portfolio/promo/portfolio-4.jpg">
                                                </div>
                                            </div>
                                            <div class="gallery-item">
                                                <img alt="Backpack In Black" src="assets/demo/portfolio/promo/portfolio-3.jpg">
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="uk-margin-large">

                    <div class="portfolio-item category-print uk-padding-large">
                        <div class="uk-container">
                            <div class="uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m  uk-child-width-1-1@s" data-uk-grid>
                                <div data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                    <div class="promo-image-container">
                                        <img class="promo-image uk-box-shadow-small" src="assets/demo/sandalwood3.jpg">
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="tw-element promo-text-container full tw-box big-typography" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                        <h6 class="tw-sub-title"></h6>
                                        <h1 class="tw-big-title">檀香树的应用</h1>
                                        <p>1．用于寒凝气滞，胸腹疼痛，常与藿香、白豆蔻、砂仁、丁香等同用。若用于胸痹绞痛，常与丹参、砂仁同用，如丹参饮。<br />2。用于胃寒疼痛，呕吐清水，可与菖蒲、丁香、木香等同用。
                                        </p>
                                        <!--a href="#" class="uk-button uk-button-silver uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Read More</span><i class="ion-ios-arrow-thin-right"></i></span></a-->
                                    </div>
                                </div>
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
        <script src="assets/js/spectragram.min.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="http://www.youtube.com/iframe_api?ver=5.0.1"></script><script src="assets/js/theme.js"></script>
        <script type="text/javascript">
            /* Instagram */
            /* get accessToken:  https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=token&scope=public_content */
            try{
                jQuery.fn.spectragram.accessData = {
                    accessToken: '2540666116.5967374.3a01066807fb456196a13735a307e348',
                    clientID: '59673740fea145d59a3038bd7eb37fec'
                };
                $('.tw-carousel-instagram .owl-carousel').spectragram('getUserFeed',{
                    query: 'themewavesteam',
                    size: 'big',
                    max: 8,
                    wrapEachWith: '<div class="insta-item"></div>'
                });
            }catch(e){}
        </script>
    </body>
</html>