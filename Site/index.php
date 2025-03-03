<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EAP Films and Theatres Private Limited | Home</title>
  <!-- Google Font Api KEY-->
  <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" />
  
  <!-- Library / Plugin Css Build -->
  <link rel="stylesheet" href="./assets/css/core/libs.min.css" />
  
  <!-- font-awesome css -->
  <link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css" />
  
  <!-- Iconly css -->
  <link rel="stylesheet" href="./assets/vendor/iconly/css/style.css" />
  
  <!-- Animate css -->
  <link rel="stylesheet" href="./assets/vendor/animate.min.css" />
  
  <!-- SwiperSlider css -->
  <link rel="stylesheet" href="./assets/vendor/swiperSlider/swiper.min.css">
  
  
  
  
  
  <!-- Streamit Design System Css -->
  <link rel="stylesheet" href="./assets/css/streamit.min.css?v=1.0.0" />

  
  <!-- Custom Css -->
  <link rel="stylesheet" href="./assets/css/custom.min.css?v=1.0.0" />
  <link rel="stylesheet" href="./assets/css/custom.css" />
  <link rel="stylesheet" href="./assets/css/streamit.css" />
  <!-- Rtl Css -->
  <link rel="stylesheet" href="./assets/css/rtl.min.css?v=1.0.0" />
  
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
  




</head>

<body class="  ">

  <?php include 'includes/loader.php';?>

  <!-- loader END -->  <!-- loader END -->
  <main class="main-content">
      <!--Nav Start-->
          <!--Nav End-->
<?php include 'includes/menu.php';?>
      <!--bread-crumb-->
      <!--bread-crumb-->


<?php include 'home/top_slider.php';?>

<!-- <?php include 'home/top_ten.php';?> -->

<?php include 'home/now_showing.php';?>

<?php include 'home/banners.php';?>

<?php //include 'home/movie_snipt.php';?>

<?php include 'home/comeingsoon.php';?>

<!-- php include 'home/logo_set.php'; -->



</main>

<?php include 'includes/footer.php';?>




  <?php include 'includes/gototop.php';?>

 <!-- Wrapper End-->
  <!-- Library Bundle Script -->
  <script src="./assets/js/core/libs.min.js"></script>
  <!-- Plugin Scripts -->
  
  
  <!-- SwiperSlider Script -->
  <script src="./assets/vendor/swiperSlider/swiper.min.js"></script>
  
  
  <script>
    // Initialize Swiper
    var swiper = new Swiper('.swiper-card-anime', {
      slidesPerView: 'auto',
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 3000, // 3 seconds
      },
    });
  </script>
  
  
  <!-- Lodash Utility -->
  <script src="./assets/vendor/lodash/lodash.min.js"></script>
  <!-- External Library Bundle Script -->
  <script src="./assets/js/core/external.min.js"></script>
  <!-- countdown Script -->
  <script src="./assets/js/plugins/countdown.js"></script>
  <!-- utility Script -->
  <script src="./assets/js/utility.js"></script>
  <!-- Setting Script -->
  <script src="./assets/js/setting.js"></script>
  <script src="./assets/js/setting-init.js" defer></script>
  <!-- Streamit Script -->
  <script src="./assets/js/streamit.js" defer></script>
  <script src="./assets/js/swiper.js" defer></script>
</body>

</html>