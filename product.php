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
                                    <a href="aboutus.html"><?=$languageArray['nav_about_us'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="sandalwood.html"><?=$languageArray['nav_history'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="product.html"><?=$languageArray['nav_product_info'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="testimony.html"><?=$languageArray['nav_testimony'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="gallery.html"><?=$languageArray['nav_gallery'][$language] ?></a>
                                </li>
                                <li class="uk-parent">
                                    <a href="contactus.html"><?=$languageArray['nav_contact_us'][$language] ?>/a>
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
            <section class="uk-section tw-dynamic-page-title uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/product/productmain.jpg); height: 500px;">
                <div class="tw-page-title-container tw-element">
                    <h1 class="tw-page-title uk-text-uppercase">产品信息</h1>
                </div>
            </section>
            <section class="uk-section uk-section-shop">
                <div class="uk-container">
                    <div data-uk-grid>
                        <div class="content-area uk-width-expand">
                            <div class="tw-element tw-shop">
                                <!--<div class="shop-lead-meta uk-child-width-1-2" data-uk-grid>
                                    <div>
                                        <h4 class="shop-result-text uk-float-left">Showing 1–12 of 60 results</h4>
                                    </div>
                                    <div>
                                        <h4 class="shop-sort-text uk-float-right">
                                            <div class="uk-form-controls">
                                                <select class="uk-select" id="form-horizontal-select">
                                                    <option>Default Sorting</option>
                                                    <option>Sort by Popularity</option>
                                                    <option>Sort by Average Rating</option>
                                                    <option>Sort by Newness</option>
                                                    <option>Sort by Price: low to high</option>
                                                    <option>Sort by Price: high to low</option>
                                                </select>
                                            </div>
                                        </h4>
                                    </div>
                                </div>-->

                                <div class="shop-container uk-child-width-1-1@xxs uk-child-width-1-2@xs uk-child-width-1-3@s uk-child-width-1-2@m uk-child-width-1-3@l" data-uk-grid data-uk-scrollspy="target: > .shop-item; cls:uk-animation-slide-bottom-medium; delay: 300;">

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product1.jpeg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Sandalwood Box 1</a></h4>
                                                <a class="shop-category">Accessories</a>
                                                <!--<div class="price">
                                                    <span class="old-price">$26.00</span>
                                                    <span class="new-price">$28.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product2.jpeg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Sandalwood Box 1</a></h4>
                                                <a class="shop-category">Accessories</a>
                                                <!--<div class="price">
                                                    <span class="new-price">$40.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product3.jpeg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Sandalwood Box 3</a></h4>
                                                <a class="shop-category">Accessories</a>
                                                <!--<div class="price">
                                                    <span class="new-price">$36.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product4.jpeg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Sandalwood Box 4</a></h4>
                                                <a class="shop-category">Accessories</a>
                                                <!--<div class="price">
                                                    <span class="old-price">$30.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product5.jpg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Tea 1</a></h4>
                                                <a class="shop-category">Beverages</a>
                                                <!--<div class="price">
                                                    <span class="old-price">$25.00</span>
                                                    <span class="new-price">$16.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product6.jpg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Tea 2</a></h4>
                                                <a class="shop-category">Beverages</a>
                                                <!--<div class="price">
                                                    <span class="new-price">$40.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product7.jpg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Tea 3</a></h4>
                                                <a class="shop-category">Beverages</a>
                                                <!--<div class="price">
                                                    <span class="new-price">$36.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                    <!--<div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product8.jpg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Tea 4</a></h4>
                                                <a class="shop-category">Beverages</a>
                                                <!--<div class="price">
                                                    <span class="old-price">$30.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                    <!--<div>
                                        <div class="shop-item">
                                            <div class="shop-content">
                                                <div class="shop-image-container uk-inline tw-onhover visible">
                                                    <img alt="Backpack In Black" src="assets/demo/product/product9.jpg">
                                                    <div class="uk-position-bottom">
                                                        <a class="add-to-cart">More Info &nbsp;<i class="icon ion-arrow-right-a"></i></a>
                                                    </div>
                                                </div>
                                                <h4><a href="shop-single.html" class="shop-title">Tea 5</a></h4>
                                                <a class="shop-category">Beverages</a>
                                                <!--<div class="price">
                                                    <span class="old-price">$26.00</span>
                                                    <span class="new-price">$28.00</span>
                                                        <div class="shop-rating-container uk-clearfix">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                                <input type="radio" id="star4half" name="rating" value="4 and a half"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                                <input type="radio" id="star3half" name="rating" value="3 and a half"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2half" name="rating" value="2 and a half"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                <input type="radio" id="star1half" name="rating" value="1 and a half"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                                <input type="radio" id="starhalf" name="rating" value="half"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                </div>
                            </div>

                        </div>

                        <!--<div class="sidebar-area">
                            <div class="sidebar-inner" data-uk-sticky="bottom: true;offset: 40">

                                <div class="widget-item">
                                    <aside class="widget widget_categories">
                                        <h3 class="widget-title"><span>Search</span></h3>
                                        <div class="call-btn" data-uk-grid>
                                            <div class="uk-inline uk-width-1-1">
                                                <a class="uk-form-icon uk-form-icon-flip" href=""><i class="ion-android-search"></i></a>
                                                <input type="text" placeholder="Search" class="uk-input">
                                            </div>
                                        </div>
                                    </aside>
                                </div>

                                <div class="widget-item">
                                    <aside class="widget widget_categories">
                                        <h3 class="widget-title"><span>Filter by Price</span></h3>
                                        <div id="slider-range"></div>
                                        <div class="shop-range-container uk-display-block uk-margin-top">
                                            <label for="amount">Price:</label><input class="uk-width-1-2" type="text" id="amount" readonly style="background:none; color:#666;">
                                            <a href="#" class="uk-margin-small-top uk-button uk-float-right uk-button-default uk-button-small uk-button-radius">Filter</a>
                                        </div>
                                    </aside>
                                </div>

                                <div class="widget-item">
                                    <aside class="widget widget_categories">
                                        <h3 class="widget-title"><span>Categories</span></h3>
                                        <ul>
                                            <li class="cat-item cat-item-2 current-cat"><a href="#">Featured</a> (8)</li>
                                            <li class="cat-item cat-item-7"><a href="#">Lifestyle</a> (6)</li>
                                            <li class="cat-item cat-item-9"><a href="#">Music</a> (3)</li>
                                            <li class="cat-item cat-item-8"><a href="#">Travel</a> (4)</li>
                                        </ul>
                                    </aside>
                                </div>

                                <div class="widget-item">
                                    <aside class="widget tw-shop-widget">
                                        <h3 class="widget-title"><span>Top Products</span></h3>
                                        <ul>
                                            <li>
                                                <div class="recent-thumb">
                                                    <a href="shop-single.html"><img src="assets/demo/shop/recent-1.jpg" alt=""></a>
                                                </div>
                                                <div class="recent-content">
                                                    <h4><a href="#">Backpack In Black</a></h4>
                                                    <span class="entry-cat">Accessories</span>
                                                    <span class="entry-price">$40.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="recent-thumb">
                                                    <a href="shop-single.html"><img src="assets/demo/shop/recent-2.jpg" alt=""></a>
                                                </div>
                                                <div class="recent-content">
                                                    <h4><a href="#">BOSS Orange T-Shirt</a></h4>
                                                    <span class="entry-cat">T-Shirts & Vests</span>
                                                    <span class="entry-price">$40.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="recent-thumb">
                                                    <a href="shop-single.html"><img src="assets/demo/shop/recent-3.jpg" alt=""></a>
                                                </div>
                                                <div class="recent-content">
                                                    <h4><a href="#">Industry T-Shirt</a></h4>
                                                    <span class="entry-cat">T-Shirts & Vests</span>
                                                    <span class="entry-price">$40.00</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </aside>
                                </div>

                                <div class="widget-item">
                                    <aside class="widget widget_wysija">
                                        <h3 class="widget-title"><span>Tag Clouds</span></h3>
                                        <div class="tagcloud">
                                            <a href="#" title="Travel">Travel</a>
                                            <a href="#" title="Features">Features</a>
                                            <a href="#" title="Post">Post</a>
                                            <a href="#" title="Wordpress">Wordpress</a>
                                            <a href="#" title="Shop">Shop</a>
                                            <a href="#" title="Trend">Trend</a>
                                            <a href="#" title="Product">Product</a>
                                            <a href="#" title="Woman">Woman</a>
                                            <a href="#" title="Man">Man</a>
                                        </div>
                                    </aside>
                                </div>

                            </div>
                        </div>-->
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
        <script src="assets/js/jquery.ui.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="http://www.youtube.com/iframe_api?ver=5.0.1"></script><script src="assets/js/theme.js"></script>
        <script>
            $( function() {
                "use strict";
                $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 3000,
                values: [ 98, 404 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
                });
                $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            } );
            // Iterate over each select element
            $('select').each(function () {

                // Cache the number of options
                var $this = $(this),
                    numberOfOptions = $(this).children('option').length;

                // Hides the select element
                $this.addClass('s-hidden');

                // Wrap the select element in a div
                $this.wrap('<div class="select"></div>');

                // Insert a styled div to sit over the top of the hidden select element
                $this.after('<div class="styledSelect"></div>');

                // Cache the styled div
                var $styledSelect = $this.next('div.styledSelect');

                // Show the first select option in the styled div
                $styledSelect.text($this.children('option').eq(0).text());

                // Insert an unordered list after the styled div and also cache the list
                var $list = $('<ul />', {
                    'class': 'options'
                }).insertAfter($styledSelect);

                // Insert a list item into the unordered list for each select option
                for (var i = 0; i < numberOfOptions; i++) {
                    $('<li />', {
                        text: $this.children('option').eq(i).text(),
                        rel: $this.children('option').eq(i).val()
                    }).appendTo($list);
                }

                // Cache the list items
                var $listItems = $list.children('li');

                // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
                $styledSelect.click(function (e) {
                    e.stopPropagation();
                    $('div.styledSelect.active').each(function () {
                        $(this).removeClass('active').next('ul.options').hide();
                    });
                    $(this).toggleClass('active').next('ul.options').toggle();
                });

                // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
                // Updates the select element to have the value of the equivalent option
                $listItems.click(function (e) {
                    e.stopPropagation();
                    $styledSelect.text($(this).text()).removeClass('active');
                    $this.val($(this).attr('rel'));
                    $list.hide();
                    /* alert($this.val()); Uncomment this for demonstration! */
                });

                // Hides the unordered list when clicking outside of it
                $(document).click(function () {
                    $styledSelect.removeClass('active');
                    $list.hide();
                });

            });
        </script>
    </body>
</html>