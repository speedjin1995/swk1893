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

$products = $db->query("SELECT * FROM product");
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
h1, h2, h3, h4, h5, h6 {
    font-family: 'Droid Sans';
    letter-spacing: 0;
    margin: 0 0 10px;
    color: #151515;
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
            <section class="uk-section tw-dynamic-page-title uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center" data-overlay="0.4" style="background-color: #151515; background-image: url(assets/demo/product/productmain.jpg); height: 500px;">
                <div class="tw-page-title-container tw-element">
                    <h1 class="tw-page-title uk-text-uppercase"><?=$languageArray['page_products_info'][$language] ?></h1>
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
                                    <?php while($row=mysqli_fetch_assoc($products)){
                                        echo '<div>
                                            <div class="shop-item">
                                                <div class="shop-content">
                                                    <div class="shop-image-container uk-inline tw-onhover visible">
                                                        <img style="width:300px;height:300px;" alt="Backpack In Black" src="admin/php/'.$row['product_photo'].'">
                                                    </div>';
                                                    
                                        if($language == "ch"){
                                            echo '<h4 style="font-size:1.2rem;">'.$row['product_name_ch'].'
                                                <a href="https://api.whatsapp.com/send?phone=60126143748&text='.$row['product_name_ch'].'"><i class="fa fa-whatsapp" style="font-size:28px;color:green;padding-left:0.5rem;"></i></a>
                                                <a name="view'.$row['id'].'" data-id="'.$row['id'].'" data-toggle="modal" data-target="#productModal"><i class="fa fa-search" style="font-size:28px;padding-left:0.1rem;color:blue;"></i></a>
                                                <a name="email'.$row['id'].'" data-id="'.$row['id'].'" data-toggle="modal" data-target="#sendEmail"><i class="fa fa-envelope-o" style="font-size:28px;color:black;padding-left:0.1rem;"></i></a>
                                            </h4>';
                                        }
                                        else{
                                            echo  '<h4 style="font-size:1.2rem;">'.$row['product_name'].'
                                                <a href="https://api.whatsapp.com/send?phone=60126143748&text='.$row['product_name'].'"><i class="fa fa-whatsapp" style="font-size:28px;color:green;padding-left:0.5rem;"></i></a>
                                                <a name="view'.$row['id'].'" data-id="'.$row['id'].'" data-toggle="modal" data-target="#productModal"><i class="fa fa-search" style="font-size:28px;padding-left:0.1rem;color:blue;"></i></a>
                                                <a name="email'.$row['id'].'" data-id="'.$row['id'].'" data-toggle="modal" data-target="#sendEmail"><i class="fa fa-envelope-o" style="font-size:28px;color:black;padding-left:0.1rem;"></i></a>                                     
                                            </h4>';
                                        }

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

        <div class="modal fade" id="productModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="font-weight: bold;">
                        <label id="productName"></label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row align-items-center productInfo">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sendEmail">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="php/sendEmail.php">
                        <div class="modal-header" style="font-weight: bold;">
                            Inquiry Form
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber" class="col-form-label">Phone Number:</label>
                                    <input class="form-control" id="phoneNumber" name="phoneNumber"></input>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input class="form-control" id="email" name="email"></input>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <textarea name="description" placeholder="description" id="description" name="description" rows="7" tabindex="4"></textarea>
                                </div>                                                
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- .main-container close -->        
        <script src="assets/js/jquery-3.2.0.min.js"></script>
        <script src="assets/js/jquery.ui.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- AdminLTE App -->
        <script src="admin/dist/js/adminlte.min.js"></script>
        <script src="http://www.youtube.com/iframe_api?ver=5.0.1"></script><script src="assets/js/theme.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

                $("[name^=view]").on("click", function(){
                        var id = $(this).data('id')
                        $.post( "php/getProduct.php", { messageId: id}, function( data ) {
                        var decode = JSON.parse(data)
                            
                        if(decode.status === 'success'){
                            <?php if($language == "ch"){
                                echo "$('#productModal').find('#productName').html(decode.message.product_name_ch);";
                                echo "$('#productModal').find('.productInfo').html(decode.message.product_desc_ch);";
                            }
                            else{
                                echo "$('#productModal').find('#productName').html(decode.message.product_name);";
                                echo "$('#productModal').find('.productInfo').html(decode.message.product_desc);";
                            } ?>
                            
                            $('#productModal').modal('show');
                        }
                    })

                });


            });

        </script>
    </body>
</html>