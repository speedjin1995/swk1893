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
    <body class="loading"><div class="tw-preloader"><div data-uk-spinner></div></div><div class="header-container tw-header tw-header-transparent uk-light">
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
                        <!--li class="menu-item">
                            <a href="aboutus.php"><?=$languageArray['nav_about_us'][$language] ?></a>
                        </li-->
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
                    <!--div class="tw-socials tw-socials-minimal">
                        <a href="#"><i class="ion-social-facebook"></i></a>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                        <a href="#"><i class="ion-social-pinterest"></i></a>
                    </div-->
                </div>
            </div>
        </div>
    </nav>

</div><!-- .main-container close -->
<div class="main-container"><section class="uk-section uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/page-gallery.jpg); height: 500px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase"><?=$languageArray['page_gallery'][$language] ?></h1>
    </div>
    <!--<div class="tw-breadcrumb-container uk-position-absolute uk-position-bottom-center tw-element">
        <a href="index.php" class="tw-breadrumb-child home">Home</a>
        <a href="#" class="tw-breadrumb-child">Works</a>
        <a href="#" class="tw-breadrumb-child">Grid 2 Column</a>
    </div>-->
</section><section class="uk-section uk-section-large">
    <div class="uk-container">

        <div class="tw-element tw-portfolio tw-isotope-container" data-isotope-item=".portfolio-item">

            <div class="tw-portfolio-filter uk-text-center uk-text-uppercase">
                <ul class="uk-list">
                    <li><span data-filter="*"><?=$languageArray['page_gallery_all'][$language] ?></span></li>
                    <li><span data-filter=".category-farm"><?=$languageArray['page_gallery_farm'][$language] ?></span></li>
                    <li><span data-filter=".category-tree"><?=$languageArray['page_gallery_tree'][$language] ?></span></li>
                    <li><span data-filter=".category-tea"><?=$languageArray['page_gallery_leaf'][$language] ?></span></li>
                </ul>
            </div>

            <div class="isotope-container uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@m" data-uk-grid data-uk-scrollspy="target: > .portfolio-item; cls:uk-animation-slide-bottom-medium; delay: 400;">

                <div class="portfolio-item category-tea">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port1.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span></span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="portfolio-item category-tree">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port2.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span>-</span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="portfolio-item category-overview category-farm">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port3.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span></span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="portfolio-item category-tea">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port4.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span></span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="portfolio-item category-overview">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port5.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span></span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="portfolio-item category-tree">
                    <div class="portfolio-media tw-image-hover">
                        <img src="assets/demo/portfolio/port6.jpg" alt="" />
                        <a href="#" class="portfolio-content uk-light">
                            <h3 class="portfolio-title"><span></span></h3>
                            <div class="tw-meta"><span></span></div>
                        </a>
                    </div>
                </div>

                <div class="grid-sizer"></div>

            </div>

            <!--<div class="tw-pagination uk-text-center">
                <a href="#" class="uk-button uk-button-default uk-button-small uk-button-radius uk-button-silver tw-hover"><span class="tw-hover-inner"><span>More Works</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>-->
        </div>

    </div>
</section><footer class="uk-section uk-section-secondary uk-padding-remove-vertical uk-light">

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
        
    <div class="uk-container"><hr /></div>
        
    <div class="footer-area">
        <div class="uk-container">
            <div class="uk-flex-middle uk-child-width-1-1 uk-child-width-expand@m" data-uk-grid>
                <div class="copyright">
                    © Copyright 2017 - All Rights Reserved
                </div>
                </div>
                <div class="uk-text-right">
                    <a href="" data-uk-scroll>Back To Top &nbsp;&nbsp;<i class="ion-ios-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
        
</footer></div>
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