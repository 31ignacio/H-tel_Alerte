<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Récupérer le jeton CSRF -->
    @yield('scripts')

    <title>HotelAlerte</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('../../css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../../css/style.css') }}" type="text/css">

        {{-- css pour logo --}}
    <style>
        .logo {
            font-family: 'Arial Black', Gadget, sans-serif;
            font-size: 1rem;
            color: #333;
        }
        .logo .highlight {
            color: #dfa974;
            font-size: 2rem;
        }
        .logo .dot {
            color: #dfa974;
            font-size: 2rem;
            line-height: 0.8;
        }
    </style>

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
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>

        <div class="header-configure-area">
            @auth

            <a href="{{route('client.create')}}" class="bk-btn mt-1 mb-1" style="border-radius: 20px;">Signaler un client</a>

            @endauth
            

        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{route('hotel.accueil')}}">Accueil</a></li>
                {{-- <li><a href="">Menu</a></li> --}}

                    @auth
                        
                    @if(Auth::user()->email == 'ahehehinnou31@gmail.com')
                        <li><a href="{{ route('hotel.liste') }}">Hôtels</a></li>
                    @endif
                <li><a href="">Signalements</a>
                    <ul class="dropdown">
                        <li><a href="{{route('client.create')}}">Signaler un client</a></li>
                        <li><a href="{{route('client.liste')}}">Liste des signalements</a></li>
                        
                    </ul>
                </li>
                @endauth
                    <li><a href="{{route('hotel.contact')}}">Contact</a></li>
                @auth
                    <li><a href="">Profil</a>
                        <ul class="dropdown">
                            
                            <li><a href="{{route('hotel.profil')}}">Profil</a></li>
                            <li><a href="{{route('logout')}}">Déconnexion</a></li>
                            
                        </ul>
                    </li>
                @endauth
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="tn-right">
                             
                            @auth
                                <a href="{{route('client.create')}}" class="bk-btn mt-1 mb-1" style="border-radius: 20px;">Signaler un client</a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ route('hotel.accueil') }}">
                                <h3 class="logo">Hôtel<span class="highlight">_Alerte</span><span class="dot">.</span></h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="{{ request()->routeIs('hotel.accueil') ? 'active' : '' }}"><a href="{{ route('hotel.accueil') }}">Accueil</a></li>
                                    
                                    @auth
                                    @if(Auth::user()->email == 'ahehehinnou31@gmail.com')
                                    <li class="{{ request()->routeIs('hotel.liste') ? 'active' : '' }}"><a href="{{ route('hotel.liste') }}">Hôtels</a></li>
                                    @endif
                                        <li class="{{ request()->routeIs('hotel.mesAnnonces') ? 'active' : '' }}"><a href="{{ route('hotel.mesAnnonces') }}">Mes annonces</a></li>
                            
                                        <li class="{{ request()->routeIs('client.create') || request()->routeIs('client.liste') ? 'active' : '' }}">
                                            <a href="#">Signalements</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('client.create') }}">Signaler</a></li>
                                                <li><a href="{{ route('client.liste') }}">Signalements</a></li>
                                            </ul>
                                        </li>
                                    @endauth
                                    
                                    <li class="{{ request()->routeIs('hotel.contact') ? 'active' : '' }}"><a href="{{ route('hotel.contact') }}">Contact</a></li>
                            
                                    @auth
                                        <li class="{{ request()->routeIs('hotel.profil') ? 'active' : '' }}">
                                            <a href="#">Profil</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('hotel.profil') }}">Profil</a></li>
                                                <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                                            </ul>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
                                <p style="font-size: 12px;"> Copyright © <script>document.write(new Date().getFullYear())</script> Tous droits réservés | Hôtel_Alerte - Votre sécurité est notre priorité</p>
                            </p>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- Js Plugins -->
  <script src="https://cdn.kkiapay.me/k.js"></script>
  <script src="{{ asset('../../js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('../../js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('../../js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('../../js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('../../js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('../../js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('../../js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('../../js/main.js') }}"></script>


</body>

</html>
