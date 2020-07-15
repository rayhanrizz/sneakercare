<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sneaker Care</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="border-bottom top-bar py-2 bg-dark" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="mb-0">
              <span class="mr-3"><strong class="text-white">Phone:</strong> <a href="tel://#">+62 8123 4567 890</a></span>
              <span><strong class="text-white">Email:</strong> <a href="#">sneakercare@example.com</a></span>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="social-media">
              <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-4">
            <h1 class="mb-0 site-logo"><a href="/" class="text-black h2 mb-0">Sneaker Care<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#fasilitas" class="nav-link">Facilities</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#price" class="nav-link">Price List</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  

    <div class="site-blocks-cover overlay" style="background-image: url(images/bg.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1><span class="typed-words"></span></h1>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  

    <section class="site-section" id="fasilitas">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Our Facilities</h2>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          @foreach($data as $fslts)
          <div class="col-md-6 col-lg-4">
            <a href="{{ url('/image/'.$fslts->gambar) }}" class="media-1" data-fancybox="gallery">
              <img src="{{ url('/image/'.$fslts->gambar) }}" alt="Image" class="img-fluid" width="100%">
              <div class="media-1-content">
                <h2>{{ $fslts->nama_fasilitas }} </h2>
              </div>
            </a>
          </div>
          @endforeach  
        </div>
      </div>
    </section>

    <section class="site-section border-bottom" id="services">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center" data-aos="fade-up">
            <h2 class="text-black h1 site-section-heading text-center">Our Services</h2>
          </div>
        </div>
        <div class="row">
          @foreach($lyn as $layanan)
          <div class="col-md-6">
            <div class="h-entry">
              <a href="#"><img src="{{ url('/image/'.$layanan->gambar) }}" alt="Image" class="img-fluid"></a>
              <h2 class="font-size-regular"><a href="#">{{ $layanan->nama_layanan }}</a></h2>
            </div> 
          </div>
          @endforeach 
        </div>
      </div>
    </section>

    <div class="site-section" id="price">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-6 order-md-1" data-aos="fade">
            <div class="row">
              <div class="col-12">
                <div class="text-left pb-1">
                  <h2 class="text-black h1 site-section-heading text-center">Price List</h2>
                </div>
              </div>
              <div class="col-12 mb-4">
                <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                </tr>
              </thead>
              <tbody>
               @forelse($prd as $product)
                <tr>
                  <td>{{ $product->nama_product}}</td>
                  <td>Rp {{ number_format($product->harga) }}</td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="site-section bg-light" id="contact">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="text-black h1 site-section-heading">Contact Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">Malang, Jawa Timur, Indonesia</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+62 8123 4567 890</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">sneakercare@example.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </section>
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Sneaker Care adalah sebuah jasa cuci sepatu yang ada di malang. Senaker Care menyediakan layanan Fast Clean dan Deep Clean.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#fasilitas">Facilities</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#price">Price List</a></li>
                  <li><a href="#contact">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <script src="js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: ["Semua Berawal Dari Bawah"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
            </script>

  <script src="js/main.js"></script>
  


  </body>
</html>