<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Récupérer le jeton CSRF -->

    <title>HotelAlerte</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (229) 40735335</li>
                            <li>
                                <i class="fa fa-envelope"></i> 
                                <a href="mailto:ariExpertiz@gmail.com" style="text-decoration: none; color: black;" title="Envoyer un mail">
                                    <span style="color: black;">ariExpertiz@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="tn-right">

                            @auth
                                
                            <a href="{{route('client.create')}}" class="bk-btn mt-1 mb-1">Signaler un client</a>
                            
                             <div class="language-option">
                                <img src="img/avatar5.png" alt="">
                                <span>Votre Profil <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="{{route('hotel.profil')}}">Profil</a></li>
                                        <li><a href="{{route('logout')}}">Off</a></li>
                                    </ul>
                                </div>
                            </div> 
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>




    <br>
    @yield('content')




    <!-- Footer Section Begin -->
    <footer class="footer-section">
    
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                      @if (Auth::check())
  
                        <ul>
                            <li><a href="{{route('client.create')}}">Signaler client</a></li>
                            <li><a href="{{route('client.liste')}}">Liste signalement</a></li>
                            <li><a href="{{route('hotel.contact')}}">Contact</a></li>

                        </ul>
                      @else
                          <ul>
                              <li><a href="{{route('login')}}">Signaler client</a></li>
                              <li><a href="{{route('login')}}">Liste signalement</a></li>
                              <li><a href="{{route('hotel.contact')}}">Contact</a></li>

                          </ul>
                      @endif
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text">
                              <p>
                                  <p style="font-size: 12px;"> Copyright © <script>document.write(new Date().getFullYear())</script> Tous droits réservés | Hôtel Alerte - Votre sécurité est notre priorité</p>
                              </p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
  
  
  <!-- Search model Begin -->
  <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch"><i class="icon_close"></i></div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Search here.....">
          </form>
      </div>
  </div>
  <!-- Search model end -->

  <!-- Js Plugins -->
  <script src="https://cdn.kkiapay.me/k.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
