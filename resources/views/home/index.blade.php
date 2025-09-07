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
  <link rel="shortcut icon" href="images/logo1.png" type="">

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

<body>

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
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">ACCUEIL<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
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
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                     SOLO<br>
                      TRACK
                    </h1>
                    <p>
                      Que vous soyez un graphiste, un rédacteur, un développeur ou tout autre professionnel indépendant, notre application est là pour vous accompagner à chaque étape de votre parcours.                     <div class="btn-box">
                        <a href="{{route('register')}}"  class="btn1">
                       Comencez
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/Designer-amico.svg"   alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      SOLO <br>
                      TRACK
                    </h1>
                    <p>
                      Découvrez notre application dédiée aux freelancers, conçue pour simplifier la gestion de votre travail et de votre entreprise. Notre application offre une gamme complète d'outils et de fonctionnalités pour vous aider à gérer tous les aspects de votre activité freelance, le tout depuis un seul endroit pratique.                    </p>
                    <div class="btn-box">
                      <a href="{{route('register')}}" class="btn1">
                        Comencez
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/home.svg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      SOLO <br>
                      TRACK
                    </h1>
                    <p>
                      Avec notre application, vous pouvez gérer efficacement votre travail et votre entreprise, rester organisé et concentré sur ce qui compte vraiment : la réalisation de vos projets et la croissance de votre activité freelance. Essayer notre application dès aujourd'hui et libérez-vous des tracas administratifs pour vous concentrer sur votre passion.                    </p>
                    <div class="btn-box">
                      <a href="{{route('register')}}" class="btn1">
                        Comencez
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/home2.svg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
          Nos <span>Services</span>
          </h2>
          <p>
            Notre site propose divers services pour les autoentrepreneurs afin de les aider dans leur activité professionnelle.          </p>
        </div>
        <div class="row">
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/customer.png" alt="">

              </div>
              <div class="detail-box">
                <h5>
                  GESTION DES CLIENTS  
                </h5>
                <p>
                  Simplifiez la gestion de vos clients en centralisant toutes leurs informations au même endroit. Suivez leurs coordonnées, historiques d'achat et préférences pour offrir un service personnalisé et efficace, tout en renforçant vos relations clientèle.
                  <br>   </p>        
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/box.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Gérer les produits et le stock
                </h5>
                <p>
             Optimisez la gestion de votre inventaire en suivant les produits, les fournisseurs et les niveaux de stock. Notre système vous permet également de surveiller les mouvements d'inventaire pour une gestion proactive.                </p>
             
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/project-management.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Gérer votre inventaire
                </h5>
                <p>
                Simplifiez la gestion de votre inventaire avec notre 
                  système intuitif ,
                   facilitant le suivi des inventaires et la planification des achats.
                    Grâce à notre plateforme, vous pouvez gérer votre inventaire de manière efficace
                     et optimiser vos opérations d'achat.
                </p>
              
              </div>
            </div>
          </div>
        </div>
        <div class="btn-box">
          <a href="{{route('service')}}" >
            Voir tout
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


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
            <p>
              nous sommes passionnés par le développement de projets web et d'applications novateurs et performants. Notre équipe s'engage à créer des solutions qui anticipent l'évolution de l'intelligence artificielle et de l'apprentissage automatique. En combinant expertise technique et compréhension des dernières avancées, nous repoussons les limites pour offrir des produits de qualité supérieure.            </p>
            <p>
              Optimisez votre activité avec notre application de gestion pour autoentrepreneurs. Suivez vos finances, créez des devis et factures, gérez vos clients et fournisseurs en quelques clics. Simplifiez votre quotidien et développez votre entreprise avec facilité.            </p>
              <a href="{{route('about')}}" >
              Lire la suite
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          POURQUOI <span> NOUS</span>
        </h2>
      </div>
      <div class="why_container">
        <div class="box">
          <div class="img-box">
            <img src="images/folder.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Données sécurisées
            </h5>
            <p>
              Notre site garantit la sécurité de vos données grâce à des protocoles de sécurité avancés, assurant la confidentialité et l'intégrité de vos informations sensibles.
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/access.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Performances rapides
            </h5>
            <p>
              Bénéficiez d'une performance rapide et fluide sur notre plateforme, permettant une navigation efficace et une expérience utilisateur optimale.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/to-use.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Utilisation simplifiée
            </h5>
            <p>
              La simplicité d'utilisation est au cœur de notre site, offrant une interface conviviale et intuitive pour une manipulation facile et une prise en main rapide. </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/saving.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Gain de temps
            </h5>
            <p>
              Économisez du temps précieux grâce à nos fonctionnalités optimisées et nos processus automatisés, vous permettant de maximiser votre productivité et de vous concentrer sur l'essentiel.   </p>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="{{route('why')}}" >
          
              Voir tout
           
        </a>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- team section -->
  <section class="team_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2 class="">
          Notre <span> equipe </span>
        </h2>
      </div>

      <div class="team_container">
        <div class="row">
          <div class="col-lg-6 col-sm-5">
            <div class="box ">
              <div class="img-box">
                <img src="images/chef.png" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Anass EL HOUISSIQUE
                </h5>
                <p>
                  Chef d'equipe
                </p>
                CEO de Dot Koncept
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-4">
            <div class="box ">
              <div class="img-box">
                <img src="images/me.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                 Mariam MOUH
                </h5>
                <p>
                  Membre d'équipe
                </p>
                Développeuse web et d'applications
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                
              </div>
            </div>
          </div>
        
        </div>
      </div> 
      <div class="btn-box">
        <a href="{{route('team')}}" >
          
              Voir tout
           
        </a>
      </div>
    </div>
  </section>
  <!-- end team section -->


  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Ce que disent nos <span>clients </span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Ahmed Hassan
                    </h6>
                    <p>
                      Hassan Consulting
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Ce site web est une bénédiction. Grâce à lui, j'ai pu organiser mes factures et suivre mes clients de près. Malgré cela, Ahmed Hassan a fourni un service de consultation de gestion médiocre, ses conseils manquaient souvent de pertinence malgré les ressources disponibles.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Fatima Khalil
                    </h6>
                    <p>
                      Khalil Solutions Informatiques
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Ce site web est un véritable sauveteur. Il m'a aidé à organiser mes factures et à garder une trace de mes clients. Malgré cela, Fatima Khalil n'a pas réussi à organiser efficacement son équipe. Cela a conduit à des retards dans les projets et une qualité de travail inférieure.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/team-4.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Yasmine Ali
                    </h6>
                    <p>
                      Ali Conception Graphique
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Ce site web est un véritable soulagement. Grâce à lui, j'ai pu gérer mes factures plus facilement et garder un suivi de mes clients. Malgré ces avantages, Yasmine Ali n'a pas su exploiter pleinement les outils de conception disponibles. Ses créations manquaient d'originalité malgré les fonctionnalités offertes.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/team-3.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Omar Mahmoud
                    </h6>
                    <p>
                      Mahmoud Construction
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Ce site web est un vrai sauveur. Il m'a aidé à organiser mes factures et à suivre mes clients sans tracas. Cependant, Omar Mahmoud n'a pas suivi correctement les protocoles de sécurité recommandés, mettant ainsi en danger la sécurité de son équipe malgré les ressources fournies.
                </p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- end client section -->


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
                  Tel: +212 709764534
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