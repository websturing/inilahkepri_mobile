<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inilahkepri - Disini Kami Berbagi</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/images/fav.png')); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('head-meta'); ?>
    
  
    
    <link href="<?php echo e(url('public/css/icon.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('public/imagine/fonts/icomoon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/css/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/owl.theme.default.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/jquery.fancybox.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/bootstrap-datepicker.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('node_modules/video.js/dist/video-js.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/fonts/flaticon/font/flaticon.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('public/imagine/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/css/skeleton.css')); ?>">
    <style>
      @media  screen and (max-width: 1024px) {
        html, body {
            z-index: 0 !important;
            overflow: scroll !important;
        }
    }
    </style>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5866255bf1b2733b"></script>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap"  id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>
    
    
      <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center">
            
            <div class="col-6 col-md-3 col-xl-4  d-block">
              <h1 class="mb-0 site-logo">
                <a href="<?php echo e(url('/')); ?>" class="text-black h2 mb-0">
                  <img src="<?php echo e(url('public/images/logo1.png')); ?>" class="img-fluid" width="120px">
                </a>
              </h1>
            </div>

            <div class="col-12 col-md-9 col-xl-8 main-menu">
              <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                  <li><a href="#home-section" class="nav-link">Beranda</a></li>
                  <li><a href="#features-section" class="nav-link">Pedoman media Siber</a></li>
                  
                  <li><a href="#testimonials-section" class="nav-link">Tentang Kami</a></li>
                </ul>
              </nav>
            </div>


            <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>
        
      </header>
      <div id="app">
        
      <div style="padding:150px 15px 0px 15px" v-if="activeLoader">

        <?php for($i=0; $i < 6; $i++): ?>
          <div class="lightui1" style="margin-bottom:10px">
            <div class="lightui1-shimmer">
                <div class="_2iwr"></div>
                <div class="_2iws"></div>
                <div class="_2iwt"></div>
                <div class="_2iwu"></div>
                <div class="_2iwv"></div>
                <div class="_2iww"></div>
                <div class="_2iwx"></div>
                <div class="_2iwy"></div>
                <div class="_2iwz"></div>
                <div class="_2iw-"></div>
                <div class="_2iw_"></div>
                <div class="_2ix0"></div>
            </div>
          </div>
        <?php endfor; ?>
        
      </div>
        <router-view :key="$route.fullPath"></router-view>
        <?php echo $__env->yieldContent('content'); ?>
      </div>


      <div class="footer py-5 text-center">
        <div class="container">
          <div class="row mb-5">
            <div class="col-12">
              <p class="mb-0">
                <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                <a href="https://colorlib.com" target="_blank" class="p-3">Coloriib</a>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="mb-0">
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
      
              </p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .site-wrap -->

  <script src="<?php echo e(url('public/imagine/js/jquery-3.3.1.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/jquery.countdown.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/bootstrap-datepicker.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/jquery.easing.1.3.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/aos.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/jquery.fancybox.min.js')); ?>"></script>
  <script src="<?php echo e(url('public/imagine/js/jquery.sticky.js')); ?>"></script>
  <script src="<?php echo e(url('node_modules/video.js/dist/video.min.js')); ?>"></script>
  <script src="<?php echo e(url('node_modules/videojs-youtube/dist/Youtube.min.js')); ?>"></script>

  <script src="<?php echo e(url('public/imagine/js/main.js')); ?>"></script>
  <script src="<?php echo e(url('public/js/app.js')); ?>"></script>
  
  </body>
</html><?php /**PATH C:\xampp\htdocs\inilahkepri_mobile\resources\views/imagine/index.blade.php ENDPATH**/ ?>