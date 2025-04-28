<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portal Alumni UNIKS</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEizlODAh8lXFSXX29FhoUCK3LAFFfQ6l5hUuBQ10ZkVl5RN1fIAoiUX63vpcLYfCZWXLvabvXw5feuTPzs3HOW5pSVzbRoveqevTtESnuAvDW3neKiisGrmDNlXYB5l52pNP8QYvvI_XHL0B31ZcuQ38RsA_gMnOcuJ1FmSJO7pgCDzLLBi9ZAcCNkD/s320/GKL2_Universitas%20Islam%20Kuantan%20Singingi%20-%20Koleksilogo.com.jpg" rel="icon">
  <link href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEizlODAh8lXFSXX29FhoUCK3LAFFfQ6l5hUuBQ10ZkVl5RN1fIAoiUX63vpcLYfCZWXLvabvXw5feuTPzs3HOW5pSVzbRoveqevTtESnuAvDW3neKiisGrmDNlXYB5l52pNP8QYvvI_XHL0B31ZcuQ38RsA_gMnOcuJ1FmSJO7pgCDzLLBi9ZAcCNkD/s320/GKL2_Universitas%20Islam%20Kuantan%20Singingi%20-%20Koleksilogo.com.jpg" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('web') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('web') }}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{ asset('web') }}/assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Portal Alumni UNIKS</h1>
      </a>
      @include('temaplate-web.navbar')
      

    </div>
  </header>

  <main class="main">

    @yield('content')

  </main>

  @include('temaplate-web.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('web') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('web') }}/assets/js/main.js"></script>

  @include('sweetalert::alert')

</body>

</html>