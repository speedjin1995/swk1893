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
        <style>
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
                    <h1 class="tw-page-title uk-text-uppercase"><?=$languageArray['page_sandalwood'][$language] ?></h1>
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
                                        <h1 class="tw-big-title">檀香</h1>
                                        <p>檀香是一种集药用、香精香料、精细雕刻及宗教用品于一体的重要珍贵用材树种，天然分布于印度尼西亚等地。我国无檀香天然分布，但自南北朝梁代以来开始利用檀香，至今已有1500多年的历史。<br> 中医认为檀香有理气温中、和胃止痛的功效；檀香油具清凉、收敛、强心等作用，能治疗多种疑难杂症，被载入多个国家药典；檀香精油香味独特且持久，是一种基础型定香剂，广泛应用于香精香料行业，经济价值非常高。此外，檀香还是宗教仪式的重要用品，用于雕刻或制作各种宗教用品等。
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
                                        <h1 class="tw-big-title">引用起源</h1>
                                        <p>早在南北朝梁代（公元502-549），檀香就已经载入陶弘景的《名医别录》中，随后在苏敬等编撰的《唐·新修本草》（公元659）中，檀香被编入紫真檀木条目下，并且对檀香的产地和分布进行了补充说明。<br> 其明确指出檀香“出昆仑盘盘国，惟不生中华，人间遍有之”，意为我国虽无檀香的天然分布，但却广泛应用檀香。
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
                                        <h1 class="tw-big-title">檀香花</h1>
                                        <p>檀香是一种集药用、香精香料、精细雕刻及宗教用品于一体的珍贵用材树种，檀香全身都是宝，因而被誉为“黄金之树”。图为檀香花。<br> 绝大部分常绿乔木树种一年内开花结实1次，而且花期和果期相对固定，但檀香却例外。根据种植地区的热量条件，檀香在一年内可开花结实1-3次，一般在亚热带地区一年开花结实1次，在热带地区则可开花结实2-3次，而且雌雄花异熟，在同一时间点同一植株上甚至可观测到花蕾、开花和果实并存。这些特殊的生物学特性有效避免了檀香的自花授粉，保证了其异花授粉，有利于提高生态适应性。
                                        </p>
                                        <!--a href="#" class="uk-button uk-button-silver uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Read More</span><i class="ion-ios-arrow-thin-right"></i></span></a-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item category-print uk-padding-large">
                        <div class="uk-container">
                            <div class="uk-grid-collapse uk-child-width-1-1 uk-child-width-1-2@m  uk-child-width-1-1@s" data-uk-grid>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="tw-element promo-text-container full tw-box big-typography" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                        <h6 class="tw-sub-title"></h6>
                                        <h1 class="tw-big-title">檀香香味</h1>
                                        <p>檀香又名旃檀、震檀等，系直接自梵文“Chandana”音译而来，意味着木材香味独特且持久。因檀香油独特香味，温馨持久，而且还能与多种香料混合，混合后能使其他易挥发精油的香味变得更加稳定和持久，因而被用作良好的定香剂，是配制各种高级香水、香精不可缺少的基本原料，广泛应用于香精香料行业。<br> 目前檀香制品从香皂到各种化妆品不下数百种。中国林业科学研究院热带林业研究所尖峰岭试验站有几株檀香遭盗伐后，试验站工作人员为了防止檀香树头被盗，同时将种质资源进行保护后再萌芽利用，用水泥砌成矮围墙将树头包围，数月后在以树头为中心5-10米范围内皆可以闻到檀香散发出的阵阵独特香味，足以证明檀香香气的独特性和持久性。
                                        </p>
                                        <!--a href="#" class="uk-button uk-button-silver uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Read More</span><i class="ion-ios-arrow-thin-right"></i></span></a-->
                                    </div>
                                </div>
                                <div data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                                    <div class="promo-carousel-container uk-light uk-box-shadow-small">
                                        <div class="onhover owl-theme" data-uk-scrollspy="target: .shop-item; cls:uk-animation-slide-bottom-medium; delay: 300;">
                                            <div class="gallery-item">
                                                <div class="shop-content">
                                                    <img alt="Backpack In Black" src="assets/demo/sandalwood4.jpg">
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