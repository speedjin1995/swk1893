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
            li a{
                font-size:15px;
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
                                <li><a href="php/chinese.php">??????</a></li>
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
                                        <li><a href="php/chinese.php">??????</a></li>
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
                    <h1 class="tw-page-title uk-text-uppercase"><?=$languageArray['page_testimony'][$language] ?></h1>
                </div>
                <!--<div class="tw-breadcrumb-container uk-position-absolute uk-position-bottom-center tw-element">
                    <a href="index.php" class="tw-breadrumb-child home">Home</a>
                    <a href="#" class="tw-breadrumb-child">Pages</a>
                    <a href="#" class="tw-breadrumb-child">Services</a>
                </div>-->
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
            <!--section class="uk-section uk-light" data-uk-parallax="bgy: -200" data-overlay="0.5" style="background-color: #151515; background-image: url(assets/demo/process-bg.jpg);">
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
            </section-->

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


            <section class="uk-section uk-section-shop">
                <div class="uk-container">
                    <div class="tw-element tw-heading uk-text-center">
                        <h3><?=$languageArray['certificate_title'][$language] ?></h3>
                    </div>
                    <div data-uk-grid>
                        <div class="content-area uk-width-expand">
                            <div class="tw-element tw-shop">
                                <div class="shop-container uk-child-width-1-1@xxxxs uk-child-width-1-2@xxxs uk-child-width-1-3@xxs uk-child-width-1-4@xs uk-child-width-1-5@s " data-uk-grid>
                                    <?php while($row=mysqli_fetch_assoc($products)){
                                        echo '<div>
                                            <div class="shop-item">
                                                <div class="shop-content">
                                                    <div class="shop-image-container uk-inline tw-onhover visible">
                                                        <img style="width:120px;height:120px;" alt="Backpack In Black" src="admin/php/'.$row['img'].'">
                                                    </div>';
                                                    
                                        echo '</div>
                                            </div>
                                        </div>';
                                    } ?>
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
                                ?? Copyright 2017 - All Rights Reserved
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

        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>

<script type="text/javascript">
        $('.carousel').carousel({
            interval: 5000
        })

</script>