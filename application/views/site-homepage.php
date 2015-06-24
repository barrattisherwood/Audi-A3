<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Meta Data
    ================================================== -->
    <meta name="description" content="McCarthy Audi offers you fantastic finance schemes on both the 2015 Audi A3 Sedan 1.4T FSI SE Manual and the 2015 Audi A3 Sportback 1.4T FSI S Manual. Visit your nearest McCarthy Audi dealer today." /><!-- max 156 characters -->
    <meta name="keywords" content="Audi A3, 2015 A3, New A3, A3 Sportback, A3 Sedan, Audi Pretoria, McCarthy Audi, Deposit, Mileage cap" />
    <meta name="abstract" content="McCarthy Jeep Renegade" />
    <meta name="copyright" content="McCarthy Jeep Renegade" />
    <meta name="classification" content="Internet" />
    <meta name="content-language" content="en" />
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive-tabs.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>McCarthy Audi | Audi A3 Sportback | Audi A3 Sedan | No deposit | No mileage cap</title>

    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

    <!-- Google Maps
    ============================================= -->    
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-56532850-2', 'auto');
      ga('send', 'pageview');

    </script>

</head>

<body class="stretched no-transition">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>

        <section id="slider" class="slider-parallax full-screen with-header swiper_wrapper clearfix">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">                    
                    <div class="swiper-slide dark" style="background-image: url('images/custom/slide-1.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h1 class="dark" data-caption-animate="fadeInUp" data-caption-delay="200">McCarthy Audi. The best place to buy your new Audi A3.</h1>
                                <ul class="one-page-menu" data-caption-animate="fadeInUp pulse" data-caption-delay="450">
                                    <li>
                                        <a href="#" data-href="#exclusive-offer">TELL ME MORE</a>
                                    </li>
                                </ul>   
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide dark" style="background-image: url('images/custom/slide-2.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h1 class="dark" data-caption-animate="fadeInUp" data-caption-delay="200">McCarthy Audi. The best place to buy your new Audi A3.</h1>
                                <ul class="one-page-menu" data-caption-animate="fadeInUp pulse" data-caption-delay="450">
                                    <li>
                                        <a href="#" data-href="#exclusive-offer">TELL ME MORE</a>
                                    </li>
                                </ul>   
                            </div>
                        </div>
                    </div>                                                        
                   
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
            </div>

            <script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        autoplay: 5000,
                        grabCursor: true,
                        onSwiperCreated: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        },
                        onSlideChangeStart: function(swiper){
                            $('#slide-number-current').html(swiper.activeIndex + 1);
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                            });
                        },
                        onSlideChangeEnd: function(swiper){
                            $('#slider .swiper-slide').each(function(){
                                if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                            });
                            $('#slider .swiper-slide:not(".swiper-slide-active")').each(function(){
                                if($(this).find('video').length > 0) {
                                    if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                                }
                            });
                            if( $('#slider .swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider .swiper-slide.swiper-slide-active').find('video').get(0).play(); }

                            $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        }
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });

                    $('#slide-number-current').html(swiperSlider.activeIndex + 1);
                    $('#slide-number-total').html(swiperSlider.slides.length);
                });
            </script>

        </section>

        <!-- Header
        ============================================= -->
        <header id="header" class="full-header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="/renegade/" class="standard-logo" data-dark-logo="images/custom/logo.gif"><img src="images/custom/logo.gif" alt="Audi"></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="images/custom/logo.gif"><img src="images/custom/logo.gif" alt="Audi"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul class="one-page-menu">
                            <li><a href="#" data-href="#home"><div>Home</div></a></li>
                            <li><a href="#" data-href="#exclusive-offer"><div>Exclusive Offer</div></a></li>
                            <li><a href="#" data-href="#section-a3-sportback"><div>Audi A3 Sportback</div></a></li>
                            <li><a href="#" data-href="#section-a3-sedan"><div>Audi A3 Sedan</div></a></li>
                            <li><a href="#" data-href="#section-why-mccarthy"><div>Why McCarthy Audi</div></a></li>
                            <li><a href="#" data-href="#section-dealers"><div>Dealer Network</div></a></li>
                            <li class="enquire-main"><a href="#section-enquire" data-href="#section-enquire"><div>Enquire Now</div></a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <section id="exclusive-offer" class="page-section">

                    <div class="section parallax" style="padding: 28px 0; margin-top:0px" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>Simple, afforbadle value</h2>
                        </div>
                    </div> 

                    <div class="container">
                        <div class="col_half">

                            McCarthy Audi is proud to offer you an exciting new finance plan on your new Audi A3. We understand that a lot of consumers are frustrated by financial barriers such as upfront deposit’s and annual mileage restrictions that could end up as a nasty unexpected bill.
                            <br /><br />
                            That’s why we worked closely with Audi financial services to develop a unique plan that gives you not only an amazing monthly premium, but takes aware the anxiety normally accompanied by deposits and mileage restrictions.

                            <h2 class="focus">Get your new 2015 Audi A3 from as little as R4,399 P/M*</h2><!-- //.focus -->   
                            <h3 class="focus">This offer is exclusive to McCarthy Audi.</h3><!-- //.focus -->

                            <div class="table-container">
                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn m-r-10" data-href="#section-dealers">Find your nearest dealer</a>
                                    </li>
                                </ul>  

                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn" data-href="#section-enquire">Enquire Now</a>
                                    </li>
                                </ul>                         
                            </div><!-- //.table-container -->        

                        </div>
                        <div class="col_half col_last">

                            <img src="images/custom/lifestyle-2.jpg" alt="Lifestyle" />
                          
                        </div>

                    </div><!-- //.container -->
                    

                </section>  

                <section id="section-a3-sportback" class="page-section">

                    <div class="section parallax" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>The Audi A3 Sportback. Way ahead!</h2>
                        </div>
                    </div> 

                    <div class="container">
                        <div class="col_half">

                            <div id="oc-slider-exterior" class="owl-carousel interior-slider">

                                <img src="images/custom/sportback/1.jpg" alt="Slider">
                                <img src="images/custom/sportback/2.jpg" alt="Slider">
                                <img src="images/custom/sportback/3.jpg" alt="Slider">

                            </div>

                            <script>

                            jQuery(document).ready(function($) {

                                var ocSlider = $("#oc-slider-exterior");

                                ocSlider.owlCarousel({
                                    items: 1,
                                    nav: true,
                                    navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                    animateOut: 'slideOutDown',
                                    animateIn: 'zoomIn',
                                    smartSpeed: 450
                                });

                            });

                            </script> 
                            <span class="sub">*Images shown are for illustration purposes only.</span>

                        </div><!-- //.col_half -->
                        <div class="col_half col_last">

                            <div class="caption">
                                What would it be like if technology could be operated intuitively? We have found the answer: with the Audi A3 Sportback. 
                            </div><!-- //.caption -->                            
                            
                            <img src="images/custom/sportback.jpg" alt="Sportback" />

                            <div class="clear"></div><!-- //.clear -->

                            <div class="table-container">

                                <ul class="one-page-menu content">
                                    <li>
                                        <a target="_blank" href="/downloads/sportback.pdf" class="scroll-btn m-r-10">Download brochure</a>
                                    </li>
                                </ul>  

                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn" data-href="#section-enquire">Enquire Now</a>
                                    </li>
                                </ul>                 

                            </div><!-- //.table-container -->

                        </div><!-- //.col_half -->

                        <div class="col_full">

                            <table>
                                <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Vehicle</th>
                                    <th>Price</th>
                                    <th>Period</th>
                                    <th>Rate*</th>
                                    <th>Deposit</th>
                                    <th>Balloon</th>
                                    <th>Installment</th>
                                    <th>Total Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Audi A3</td>
                                    <td>Sportback 1.4T FSI S Man</td>
                                    <td>R341 500</td>
                                    <td>60</td>
                                    <td>9.25*</td>
                                    <td>Zero</td>
                                    <td>R146 845</td>
                                    <td>R4 399</td>
                                    <td>R410 787</td>
                                </tr>
                                </tbody>
                            </table> 

                            <div class="sub">
                                * Linked to FNB prime rate, currently 9.25%
                                Note: Offer calculated on A3 model in standard specification. Information subject to change without prior notification. All finance offers are subject to credit approval from
                                Audi Financial Services. Instalment includes initiation and monthly administration fee of R57. Audi Financial Services - a division of Volkswagen Financial Services
                                South Africa (Pty) Ltd. An Authorised Financial Services and Credit Provider. NCRCP6635.Terms and Conditions apply.
                            </div><!-- //.sub -->

                        </div><!-- //.col_full -->
                    </div><!-- //.container -->
                    

                </section>                   

                <section id="section-a3-sedan" class="page-section">

                    <div class="section parallax" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>The Audi A3 Sedan. Consistently efficient.</h2>
                        </div>
                    </div> 

                    <div class="container">
                        <div class="col_half">

                            <div id="oc-slider-sedan" class="owl-carousel interior-slider">

                                <img src="images/custom/sedan/1.jpg" alt="Slider">
                                <img src="images/custom/sedan/2.jpg" alt="Slider">
                                <img src="images/custom/sedan/3.jpg" alt="Slider">

                            </div>

                            <script>

                            jQuery(document).ready(function($) {

                                var ocSlider = $("#oc-slider-sedan");

                                ocSlider.owlCarousel({
                                    items: 1,
                                    nav: true,
                                    navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                    animateOut: 'slideOutDown',
                                    animateIn: 'zoomIn',
                                    smartSpeed: 450
                                });

                            });

                            </script> 
                            <span class="sub">*Images shown are for illustration purposes only.</span>



                        </div><!-- //.col_half -->
                        <div class="col_half col_last">

                            <div class="caption">
                                Dynamic contours. Taut, muscular areas. Coupé-like lightness. The Audi A3 Saloon sheds a whole new light on the term "Sedan".
                            </div>                                
                            
                            <img src="images/custom/sedan.jpg" alt="Sedan" />

                            <div class="clear"></div><!-- //.clear -->

                            <div class="table-container">

                                <ul class="one-page-menu content">
                                    <li>
                                        <a target="_blank" href="/downloads/sedan.pdf" class="scroll-btn m-r-10">Download brochure</a>
                                    </li>
                                </ul>  

                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn" data-href="#section-enquire">Enquire Now</a>
                                    </li>
                                </ul>         

                            </div>                         

                        </div><!-- //.col_half -->

                        <div class="col_full">

                            <table>
                                <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Vehicle</th>
                                    <th>Price</th>
                                    <th>Period</th>
                                    <th>Rate*</th>
                                    <th>Deposit</th>
                                    <th>Balloon</th>
                                    <th>Installment</th>
                                    <th>Total Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Audi A3</td>
                                    <td>Sedan 1.4T FSI SE Man</td>
                                    <td>R369 500</td>
                                    <td>60</td>
                                    <td>9.25*</td>
                                    <td>Zero</td>
                                    <td>R158 885</td>
                                    <td>R4 699</td>
                                    <td>R440 810</td>
                                </tr>
                                </tbody>
                            </table> 

                            <div class="sub">
                                * Linked to FNB prime rate, currently 9.25%
                                Note: Offer calculated on A3 model in standard specification. Information subject to change without prior notification. All finance offers are subject to credit approval from
                                Audi Financial Services. Instalment includes initiation and monthly administration fee of R57. Audi Financial Services - a division of Volkswagen Financial Services
                                South Africa (Pty) Ltd. An Authorised Financial Services and Credit Provider. NCRCP6635.Terms and Conditions apply.
                            </div><!-- //.sub -->

                        </div><!-- //.col_full -->
                    </div><!-- //.container -->

                </section>  

                <section id="section-why-mccarthy" class="page-section">

                    <div class="section parallax" data-stellar-background-ratio="0">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>4 Reasons to buy your next Audi from McCarthy.</h2>
                        </div>
                    </div> 

                    <div class="container">

                        <div class="col_half"> 

                            <ul class="content-list">
                                <li>World-class service. <a target="_blank" href="http://www.facebook.com/mccarthyaudi">See what our customers have to say</a>. </li>
                                <li>Fantastic on-site finance and insurance options. McCarthy is a division of Bidvest.</li>
                                <li>Complimentary 1-year Club McCarthy membership. <a target="_blank" href="http://www.clubmccarthy.co.za">Find out more here</a>.</li>
                                <li>McCarthy Audi is the biggest Audi retail group in South Africa. What does this mean to you? More choice, better value.</li>
                            </ul>

                            Whether you know exactly what you are looking for or if you need advice on which vehicle would best suit your needs, there’s a friendly McCarthy Audi dealer ready to assist you.

                            <br /><br />

                            <div class="table-container">

                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn m-r-10" data-href="#section-dealers">Find your nearest dealer</a>
                                    </li>
                                </ul>  

                                <ul class="one-page-menu content">
                                    <li>
                                        <a href="#" class="scroll-btn" data-href="#section-enquire">Enquire Now</a>
                                    </li>
                                </ul>   

                            </div><!-- //.table-container -->                              

                        </div><!-- //.col_half -->      
                        
                        <div class="col_half col_last">

                            <img src="images/custom/short.jpg" alt="Audi A3" />                       
                        
                        </div><!-- //.col_half -->                                                                    

                    </div><!-- //.container -->
                    

                </section>                  

                <section id="section-dealers" class="page-section">

                    <div class="section parallax" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>The McCarthy Audi Dealer Network</h2>
                        </div>
                    </div> 

                    <div class="container">

                        <!-- thirds -->

                        <div class="col_one_third">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                <div class="fbox-media">
                                    <section id="google-map1" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-25.745061, 28.202041),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map1"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-25.745061, 28.202041);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 
         
                                </div>
                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre Arcadia</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-arcadia" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (012) 300 8300
                                            </span>
                                        </span>
                                        Address : 470 Church Street East, Arcadia, Pretoria<br />
                                        Dealer Principal : Phillip Clough <br />
                                        Email: <a href="mailto:phillipc@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_third">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <section id="google-map2" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-25.788342, 28.275009),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map2"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-25.788342, 28.275009);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 
                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre Menlyn</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-menlyn" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (012) 365 8300
                                            </span>
                                        </span>
                                        Address : Cnr Garsfontein Dr. &amp; Lois Avenue, Newlands, Pretoria<br />
                                        Dealer Principal : Diederik Kruger <br />
                                        Email: <a href="mailto:diederikk@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_third col_last">
                            <div class="feature-box media-box">
                                <div class="fbox-media">

                                    <section id="google-map3" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-26.130437, 27.905559),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map3"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-26.130437, 27.905559);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 

                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre West Rand</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-west-rand" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (011) 375 4800
                                            </span>
                                        </span>
                                        Address : Cnr Christiaan De Wet Drive &amp; Rooibok Ave, Constantia Kloof<br />
                                        Dealer Principal : Louis Nortje <br />
                                        Email: <a href="mailto:louisno@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div><!-- //.clear -->

                        <!-- fourths -->

                        <div class="col_one_fourth">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                <div class="fbox-media">
                                    <section id="google-map4" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-25.769899, 29.463981),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map4"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-25.769899, 29.463981);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 
         
                                </div>
                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre Middelburg</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-middelburg" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (013) 243 2214
                                            </span>
                                        </span>
                                        Address : Cnr of 198 Cowen Ntuli Street and Samora Machell Street, Middelburg<br />
                                        Dealer Principal : Desmond Preston <br />
                                        Email: <a href="mailto:desmondp@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_fourth">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <section id="google-map5" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-29.845591, 31.028083),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map5"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-29.845591, 31.028083);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 
                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre Durban</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-durban" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (031) 314-5000
                                            </span>
                                        </span>
                                        Address : 41 Somtseu Road, Durban, 4001<br />
                                        Dealer Principal : Jacques Breytenbach<br />
                                        Email: <a href="mailto:jacquesBr@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_fourth">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <section id="google-map6" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-29.721310, 31.061786),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map6"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-29.721310, 31.061786);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 
                                    

                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Centre Umhlanga</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-umhlanga" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (031) 584 9600
                                            </span>
                                        </span>
                                        Address : 18 Meridian Drive, Umhlanga Rocks Drive, Umhlanga<br />
                                        Dealer Principal : Phillip Clough <br />
                                        Email: <a href="mailto:phillipc@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_fourth col_last">
                            <div class="feature-box media-box">
                                <div class="fbox-media">

                                    <section id="google-map7" class="gmap" style="height: 300px;"></section>

                                      <script>

                                          var myOptions = {
                                            zoom: 12,
                                            scrollwheel: false,
                                            center: new google.maps.LatLng(-25.677270, 28.194006),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                          }
                                          var map = new google.maps.Map(document.getElementById("google-map7"),
                                                                        myOptions);

                                              var image = new google.maps.MarkerImage('/images/icons/map-icon.png',
                                                // This marker is 20 pixels wide by 32 pixels tall.
                                                new google.maps.Size(32, 32),
                                                // The origin for this image is 0,0.
                                                new google.maps.Point(0,0),
                                                // The anchor for this image is the base of the flagpole at 0,32.
                                                new google.maps.Point(32, 16));

                                          var myLatLng = new google.maps.LatLng(-25.677270, 28.194006);
                                          var beachMarker = new google.maps.Marker({
                                              position: myLatLng,
                                              map: map,
                                              icon: image
                                          });
                                
                                      </script> 

                                </div>
                                <div class="fbox-desc">
                                    <h3>Audi Pre-owned Wonderboom</h3>
                                    <p> 
                                        <span class="click-container">
                                            <a href="" id="click-wonderboom" class="click-cover">CLICK TO CALL</a>
                                            <span class="click-container-inner">
                                                (031) 584 9600 
                                            </span>
                                        </span>
                                        Address : Cnr Lavender &amp; Zambezi drive, Wonderboom, Pretoria<br />
                                        Sales Manager : Dorietha Gouws <br />
                                        Email: <a href="mailto:doriethag@mcmotor.co.za">click here</a> <br />

                                        <!-- INSERT MAP -->
                                    </p>
                                </div>
                            </div>
                        </div>                                            

                        <div class="clear"></div><!-- //.clear -->                                            

                    
                        <!-- INSERT MAP -->


                    </div><!-- //.container -->
                    

                </section>                                                    


                <section>

                    <div class="section parallax" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>Begin your McCarthy Audi journey</h2>
                        </div>
                    </div>

                    <div class="container clearfix page-section" id="section-enquire" name="section-enquire">

                        <!-- Contact Form
                        ============================================= -->
                        <div class="col_half">

                            <div class="fancy-title title-dotted-border yellow">
                                <h3>Send us an Email</h3>
                            </div>

                            <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                            <form class="nobottommargin" id="template-contactform" name="template-contactform" action="send.php?<?PHP echo time()?>" method="post">

                            <div class="form-process"></div>

                            <div class="col_one_third">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" />
                            </div>

                            <div class="col_one_third">
                                <label for="template-contactform-email">Contact Number <small>*</small></label>
                                <input type="text" id="template-contactform-surname" name="cellno" value="" class="required sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-service">Model</label>
                                <select name="model-dropdown" class="sm-form-control required" id="model-dropdown">
                                    <option value="">Select a model</option>
                                    <option value="A1">A1</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="A5">A5</option>
                                    <option value="A6">A6</option>
                                    <option value="A7">A7</option>
                                    <option value="A8">A8</option>
                                    <option value="Q3">Q3</option>
                                    <option value="Q5">Q5</option>
                                    <option value="Q7">Q7</option>
                                    <option value="R8">R8</option>
                                    <option value="RS">RS</option>
                                </select>
                            </div>

                            <div class="clear"></div>

                            <div class="col_two_third">
                                <label for="template-contactform-subject">Email Address <small>*</small></label>
                                <input type="email" id="template-contactform-subject" name="email" value="" class="required sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-service">Dealership</label>
                                <?php echo $this->McCarthy->dealershipsDropdown(null, array('id'=>"template-contactform-service", 'class'=>"sm-form-control required"))?>
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <!--<div class="g-recaptcha" data-sitekey="6Lc1YAETAAAAACCLrtu5EX7js7LqqiPosFoJ_gpd"></div>-->

<!--                            Site Key:
                                6Lc1YAETAAAAACCLrtu5EX7js7LqqiPosFoJ_gpd

                                Secret Key
                                6Lc1YAETAAAAAAplDunQ2a8Vr-NZgsXtzg5fLArX -->
                            </div>

                            <div class="col_full">
                                <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">ENQUIRE NOW</button>
                            </div>

                        </form>

                        <script type="text/javascript">

                            $("#template-contactform").validate({
                                submitHandler: function(form) {
                                    $('.form-process').fadeIn();
                                    $(form).ajaxSubmit({
                                        target: '#contact-form-result',
                                        success: function() {
                                            document.location = 'thank-you.html';
                                           // $('.form-process').fadeOut();
                                           // $('#template-contactform').find('.sm-form-control').val('');
                                           // $('#contact-form-result').attr('data-notify-msg', $('#contact-form-result').html()).html('');
                                           // SEMICOLON.widget.notifications($('#contact-form-result'));
                                        }
                                    });
                                }
                            });

                        </script>

                        </div><!-- Contact Form End -->

                        <!-- Google Map
                        ============================================= -->
                        <div class="col_half col_last">

                            <img src="images/custom/form.jpg" alt="Renegade" />

                        </div><!-- Google Map End -->

                    </div>

                </section>

                <section id="section-social" class="page-section">

                    <div class="section parallax" data-stellar-background-ratio="0.3">
                        <div class="heading-block center nobottomborder nobottommargin">
                            <h2>Join the conversation</h2>
                        </div>
                    </div> 

                    <div class="container center-text">
                    Tell us what you think of the all new Audi A3 on our social media pages: 

                    <div class="social-container ">
                        <a target="_blank" href="https://www.facebook.com/mccarthyaudi" class="social-icon si-rounded si-small si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a target="_blank" href="https://www.twitter.com/mccarthyaudi" class="social-icon si-rounded si-small si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCfLLJU74X7Bxmj8YR0ByUpg" class="social-icon si-rounded si-small si-youtube">
                            <i class="icon-youtube"></i>
                            <i class="icon-youtube"></i>
                        </a>                        
                    </div><!-- //.social-conatiner -->    
                   

                    </div><!-- //.container -->
                    

                </section> 

<footer>
                <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyright &copy; 2015 All Rights Reserved McCarthy Audi.<br>
                        <div class="copyright-links">
                            <a target="_blank" href="http://www.mccarthyaudi.co.za">www.mccarthyaudi.co.za</a> | 
                            <a target="_blank" href="http://my.callacar.co.za/#!/info/terms-of-use">Terms of Use</a> | Created by <a target="_blank" href="http://www.cbrmarketing.co.za">CBR Marketing</a></div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">

                            <img src="images/custom/bidvestlogo.png" alt="Bidvest" />

                        </div>

                        <div class="clear"></div>

                    </div>

                </div>

            </div><!-- #copyrights end -->
</footer>                


                        

                        

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up">
        <ul id="enquire-sticky" class="one-page-menu">
            <li>
                <a href="#section-enquire" data-href="#section-enquire">ENQUIRE NOW</a>
            </li>
        </ul>
    </div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>

</body>
</html>