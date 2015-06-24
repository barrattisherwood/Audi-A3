<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Mercedes-Benz McCarthy">
      <meta name="description" content="The Mercedes-Benz McCarthy dealerships are situated in Centurion, Fountains, Menlyn, Wonderboom, Witbank, Empangeni and Vryheid">
      <meta name="keywords" content="Mercedes-Benz, Roadside Assistance, Parts, Customer Response Centre">
    <title>McCarthy <?php echo ucwords($brand), ' | ', $page_title?></title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/flexslider.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/owl.transitions.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/media.css" rel="stylesheet">
    <link href="/css/flexslider.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>

      <?php $this->load->view('includes/header');?>

        <div class="content-container">
            <div class="container">

              <div class="main-content">

                  <div class="col-md-12 p-l-0">
                    <h1 class="title">
    <?php
echo $page_title;
?></h1>

    <?php echo isset($content) ? $content : 'Content coming soon'?>
                  </div><!-- //.col-md-21 -->

                  <div class="clearfix"></div><!-- //.clearfix -->

              </div><!-- //.main-content -->

        </div>

          </div>

          <?php $this->load->view('includes/footer');?>

      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-1.11.1.min.js"></script>

    <!-- Owl Slider
    ================================================== -->
    <script src="/js/owl.carousel.min.js" type="text/javascript"></script>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!-- Flex Slider
    ================================================== -->
    <script src="/js/flexslider.js" type="text/javascript"></script>
    <script src="/js/scripts.js"></script>

        <script>
            $(document).ready(function(){
                $( "ul.active-handle li:nth-child(2)" ).addClass("active");
            });
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
        </script>
  </body>
</html>