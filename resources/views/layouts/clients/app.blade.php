<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('clients/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('clients/css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('clients/css/owl.carousel.css') }}">
     <link rel="stylesheet" href="{{ asset('clients/css/owl.theme.default.min.css') }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
 
     <title>
            @yield('title') {{ config('app.name', 'Laravel') }}
     </title>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Car Rental Website</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="/services">Services</a></li>
                         <li><a href="/about-us">About Us</a></li>
                         <li><a href="/contact">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                   <i class="fa fa-user" aria-hidden="true">Account</i>
                                   <span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true">My Account</i></a></li>
                                   <li><a href="about-us.html">Bookings</a></li>
                                   <li><a href="team.html">Team</a></li>
                              </ul>
                         </li>

                         <li>
                              <a class="text text-info " href="{{ route('cart') }}"> <i class="fa fa-cart-arrow-down mr-2 cart " aria-hidden="true"></i>Cart <span class="" >
                                   <span class="badge badge-pill badge-danger">
                                        
                                        @if (session('cart'))
                                             {{ $cartCount }}
                                        @else
                                             0
                                        @endif
                                        


                                   </span>
                                   </span> </a>
                             
                         </li>
                        
                    </ul>

               </div>

          </div>
     </section>
     
     <div id="app">
          @yield('content') 
     </div>

        

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>212 Barrington Court <br>New York, ABC 10001</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2020 Company Name</p>
                                   <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="{{ asset('clients/js/jquery.js') }}"></script>
     <script src="{{ asset('clients/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('clients/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('clients/js/smoothscroll.js') }}"></script>
     <script src="{{ asset('clients/js/custom.js') }}"></script>

</body>
</html>