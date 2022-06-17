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

$products = $db->query("SELECT * FROM blog");
$slideBlog = $db->query("SELECT * FROM slide_blog");
$slideBlog1 = $db->query("SELECT * FROM slide_blog");
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            /* Make the image fully responsive */
            .carousel-inner img {
                height: 600px;
                width: 100%;

            }
            .carousel-caption{
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

        </style>

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
            <section class="tw-slider tw-slider-fullscreen uk-light" data-uk-height-viewport="offset-top: true">
                <div class="owl-carousel owl-theme" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hoverpause="true">
                    <div class="slider-item" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/slider/slider-main-two.jpg);" data-uk-height-viewport="offset-top: true">
                        <div class="slider-content">
                            <div class="tw-element uk-text-center full tw-heading" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                <h4 class="tw-sub-title"><?=$languageArray['page_home_slider1'][$language] ?></h4>
                                <h1><?=$languageArray['page_home_slider1_desc'][$language] ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/slider/slider-main-one.jpg);" data-uk-height-viewport="offset-top: true">
                        <div class="slider-content">
                            <div class="tw-element uk-text-center full tw-heading" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                <h4 class="tw-sub-title"><?=$languageArray['page_home_slider1'][$language] ?></h4>
                                <h1><?=$languageArray['page_home_slider2_desc'][$language] ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-normal">
                <div class="tw-element tw-portfolio promo">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3><?=$languageArray['nav_about_us'][$language] ?></h3>
                    </div>

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="uk-section">
                <div class="uk-container">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3><?=$languageArray['testimony_why_choose_us'][$language] ?></h3>
                        <p class="subtitle"><?=$languageArray['testimony_why_choose_us2'][$language] ?></p>
                    </div>
                    
                    <div class="tw-element uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 300;">
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="ion-leaf"></i>
                                <h4><?=$languageArray['testimony_antioxidant'][$language] ?></h4>
                                <p class="description"><?=$languageArray['testimony_antioxidant2'][$language] ?></p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="ion-leaf"></i>
                                <h4><?=$languageArray['testimony_tannin'][$language] ?></h4>
                                <p class="description"><?=$languageArray['testimony_tannin2'][$language] ?></p>
                            </div>
                        </div>
                        
                        <div>
                            <div class="tw-element tw-box small-typography layout-2">
                                <i class="ion-leaf"></i>
                                <h4><?=$languageArray['testimony_peace_of_mind'][$language] ?></h4>
                                <p class="description"><?=$languageArray['testimony_peace_of_mind2'][$language] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-padding-remove-bottom">
                <div class="tw-element tw-portfolio tw-isotope-container" data-isotope-item=".portfolio-item">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3><?=$languageArray['page_home_gallery'][$language] ?></h3>
                    </div>
                    <div class="isotope-container data-uk-grid-medium uk-grid-collapse with-bg tw-calc-width uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid data-uk-scrollspy="target: > .portfolio-item; cls:uk-animation-slide-bottom-medium; delay: 300;">
                        <div class="portfolio-item category-print">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid1.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>One Day In Paradise</span></h3>
                                </a-->
                            </div>
                        </div>
                        <div class="portfolio-item category-branding category-web-design">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid11.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>Day & Age Ora</span></h3>
                                </a-->
                            </div>
                        </div>
                        <div class="portfolio-item category-photography category-web-design">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid7.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>Kolonihagen Branding</span></h3>
                                </a-->
                            </div>
                        </div>
                        <div class="portfolio-item category-branding category-web-design">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid88.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>Axiom Essential Watch</span></h3>
                                </a-->
                            </div>
                        </div>
                        <div class="portfolio-item category-print">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid9.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>Alud. Winter Magazine nº1 Cover 1</span></h3>
                                </a-->
                            </div>
                        </div>
                        <div class="portfolio-item category-print">
                            <div class="portfolio-media tw-image-hover">
                                <img src="assets/demo/portfolio/grid/grid5.jpg" alt="" />
                                <!--a href="#" class="portfolio-content uk-light">
                                    <h3 class="portfolio-title"><span>HAY + COS Collab</span></h3>
                                </a-->
                            </div>                                
                        </div>
                        

                        <div class="grid-sizer"></div>

                    </div>
                </div>
            </section>

            <section class="uk-section">
                <div class="uk-container">

                </div>
            </section>

            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                <?php while($row=mysqli_fetch_assoc($slideBlog)){

                    $id = $row['id'] - 1;
                    echo '<li data-target="#demo" data-slide-to="'.$id.'"'; 
                    echo 'class="';
                    echo $id == 0 ? 'active' : '';
                    echo '"></li>';
                } ?>
                </ul>
                <div class="carousel-inner">
                <?php while($row=mysqli_fetch_assoc($slideBlog1)){

                         $id = $row['id'] - 1;
                        echo '<div class="carousel-item '; 
                        echo $id == 0 ? 'active' : '';
                        echo '">';
                        echo '<img src="assets/demo/page-bg.jpg" alt="'.$row['title_ch'].'" width="800" height="200">
                            <div class="carousel-caption">';
                                 if($language == "ch"){                        
                                        echo '<h3>'.$row['title_ch'].'</h3>
                                        <p>'.$row['desc_ch'].'</p>';
                                    }else{
                                        echo '<h3>'.$row['title_en'].'</h3>
                                        <p>'.$row['desc_en'].'</p>';
                                    }   
                        echo    '</div>   
                        </div>';
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <section class="uk-section">
                <div class="uk-container">
                    
                </div>
            </section>
            <!--section class="uk-section">
                <div class="uk-container">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3>
                            Meet Our Team
                        </h3>
                        <p class="subtitle">
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos mauris erat justo condimentum sit
                            amet augue.
                        </p>
                    </div>

                    <div class="tw-element uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-medium" data-uk-grid data-uk-scrollspy="target: > div > .tw-team; cls:uk-animation-slide-bottom-medium; delay: 300;">
                        <div>
                            <div class="tw-element tw-team">
                                <div class="team-media">
                                    <a href="#" class="tw-image-hover">
                                        <img src="assets/demo/team/benjamin.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="team-content tw-hover-style-1">
                                    <div class="uk-text-center">
                                        <span class="tw-meta">Director</span>
                                        <h4>Kevin Greer</h4>
                                        <div class="tw-socials with-hover">
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                            <a href="#"><i class="ion-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="tw-element tw-team">
                                <div class="team-media">
                                    <a href="#" class="tw-image-hover">
                                        <img src="assets/demo/team/cara.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="team-content tw-hover-style-1">
                                    <div class="uk-text-center">
                                        <span class="tw-meta">CEO</span>
                                        <h4>Angela Perry</h4>
                                        <div class="tw-socials with-hover">
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                            <a href="#"><i class="ion-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="tw-element tw-team">
                                <div class="team-media">
                                    <a href="#" class="tw-image-hover">
                                        <img src="assets/demo/team/patterson.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="team-content tw-hover-style-1">
                                    <div class="uk-text-center">
                                        <span class="tw-meta">CFO</span>
                                        <h4>Alex Patterson</h4>
                                        <div class="tw-socials with-hover">
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                            <a href="#"><i class="ion-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="tw-element tw-team">
                                <div class="team-media">
                                    <a href="#" class="tw-image-hover">
                                        <img src="assets/demo/team/dasia.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="team-content tw-hover-style-1">
                                    <div class="uk-text-center">
                                        <span class="tw-meta">COO</span>
                                        <h4>Kimberly Tran</h4>
                                        <div class="tw-socials with-hover">
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                            <a href="#"><i class="ion-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="uk-section uk-section-normal">
                <div class="uk-container">
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
            </section-->
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

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>    
    </body>
</html>

<script type="text/javascript">
            $('.carousel').carousel({
                interval: 5000
            })

</script>