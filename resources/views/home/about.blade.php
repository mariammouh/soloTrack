<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Solo Track </title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{route('home')}}">            <span >
              <img src="images/logo1.png" height="40" width="40"   alt=""><span  >OLO TRACK</span>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('home')}}">ACCUEIL</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('about')}}">À PROPOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('service')}}">SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('why')}}">POURQUOI NOUS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('team')}}">ÉQUIPE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}"> <i class="fa fa-user" aria-hidden="true"></i>   CONNEXION</a>
              </li>
              <form class="form-inline">
                <!-- <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"> 
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button> -->
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2>
         
        <span> À</span>  PROPOS 
        </h2>
        <p>
          Découvrez notre histoire, nos valeurs et notre engagement envers vous, nos utilisateurs. Apprenez-en plus sur notre mission et notre vision pour vous offrir les meilleurs services possibles.        </p>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/dot logo.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              Nous sommes Dot Koncept
            </h3>
            <p>Nos derniers projets incarnent notre engagement envers l'innovation technologique, notamment dans le domaine de l'intelligence artificielle et de l'apprentissage automatique. Grâce à ces technologies de pointe, nous développons des solutions qui transcendent les attentes et ouvrent de nouvelles perspectives.</p>
            <p>Imaginez une application de gestion pour autoentrepreneurs qui va au-delà de la simple tenue de comptabilité. En utilisant des algorithmes d'apprentissage automatique, notre application analyse les données financières et les comportements des utilisateurs pour fournir des recommandations personnalisées. Que vous soyez un freelance, un consultant ou un petit commerçant, cette application vous aide à prendre des décisions éclairées pour développer votre activité.</p>
            <p>L'intégration de la reconnaissance vocale et de la vision par ordinateur dans nos projets révolutionne également l'expérience utilisateur. Par exemple, imaginez un système de facturation qui permet aux utilisateurs de simplement dicter les détails d'une facture, tandis que l'application les convertit automatiquement en texte et enregistre les données nécessaires. Ou encore, une fonctionnalité de numérisation des reçus qui utilise la vision par ordinateur pour extraire automatiquement les informations pertinentes, simplifiant ainsi le processus de comptabilité.</p>
            <p>En combinant notre expertise technique avec une compréhension approfondie des dernières avancées en matière de machine learning et d'intelligence artificielle, nous sommes en mesure de repousser les limites de ce qui est possible dans le domaine du développement d'applications web et mobiles. Notre objectif est de fournir des produits de qualité supérieure qui non seulement répondent aux besoins actuels, mais anticipent également les besoins futurs de nos utilisateurs, les aidant ainsi à réussir dans un monde en constante évolution.</p>
            
              <div class="btn-box">
                <a href="{{route('register')}}" class="btn1">
                  Comencez
                </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end about section -->

  <!-- info section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Adresse
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Avenue Ghandi Imm 70 2ème Etage NR 7, Agadir 80000, Agadir
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Appel +212 709764534
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Contact@SoloTrack.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              Une application de gestion conçue spécialement pour les autoentrepreneurs, vous permettant de gérer facilement vos factures, suivre vos clients, et organiser vos tâches. L'outil parfait pour simplifier la gestion de votre entreprise.            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Liens
            </h4>
            <div class="info_links">
              <a class="active" href="index.html">
                Accueil
              </a>
              <a class="" href="about.html">
                À Propos
              </a>
              <a class="" href="service.html">
                Services
              </a>
              <a class="" href="why.html">
                Pourquoi Nous
              </a>
              <a class="" href="team.html">
                Équipe
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Abonnez-vous
          </h4>
          <form action="#">
            <input type="text" placeholder="Entrez votre email" />
            <button type="submit">
              S'abonner
            </button>
          </form>
        </div>
      </div>
      <section class="footer_section">
      <div class="container">
      <p>
        &copy; <span id="displayYear"></span> Tous les droits sont réservés par
        <a href="https://html.design/">Solo track</a>
      </p></div></section>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>