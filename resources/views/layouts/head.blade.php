<!DOCTYPE html>
<html lang="en">

@php
  
    $logo = '../';
    $dash = '';
    $profile = '';
    $produit = '';
    $fournisseure = '';
    $clients = '';
    $ventes = '';
    $devis= '';
    $bon_de_commande='';
    $depense='';
    if ($navAside == 'dashboard') {
        $dash = 'active';
        $logo = '';
    } elseif ($navAside == 'profile') {
        $profile = 'active';
        $logo = '';
    } elseif ($navAside == 'produits') {
        $produit = 'active';
        $logo = '../';
    } elseif ($navAside == 'fournisseures') {
        $fournisseure = 'active';
        $logo = '../';
    } elseif ($navAside == 'clients') {
        $clients = 'active';
        $logo = '../';
    } elseif ($navAside == 'ventes') {
        $ventes = 'active';
        $logo = '../';
    }
  elseif ($navAside == 'devis') {
        $devis = 'active';
        $logo = '../';
    } 
    elseif ($navAside == 'bon_de_commande') {
        $bon_de_commande = 'active';
        $logo = '../';
    } 
    elseif ($navAside == 'depense') {
        $depense = 'active';
        $logo = '../';
    } 
@endphp



<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ $logo }}images/logo1.png" type="">
    <title>
        Solo Track
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    
    <link id="pagestyle" href="{{$logo}}../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        /* Modal Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 15;
            left: 40;
            width: auto;
            height: auto;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99999;
        }

        /* Modal Container */
        .modal-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Modal Content */
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 1200px; /* Adjust width as needed */
        }

        /* Modal Close Button */
        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Form Style */
        .modal-content form {
            max-width: 100%;
        }

        /* Add your additional form styling here */
    </style>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body class="g-sidenav-show  bg-gray-100"> 
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 mb-0 pb-0"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" {{ route('home') }}" target="_blank">
                <img src="{{ $logo }}../images/logo1.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class=" font-weight-bold font-weight-bolder "
                    style="font-size: 20px; margin-left : 0px; text-align: start;
        display: inline-block; vertical-align: top;">OLO
                    TRACK</span>
            </a>
        </div>
 
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse mb-0 pb-0 h-auto w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  {{ $dash }}" href="{{ route('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Tableau de bord</span>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">

                <li class="nav-item">
                    <a class="nav-link    {{ $clients }} " href="{{ route('clients', $autoentrepreneur->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg height="236px" width="236px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 392.60 392.60" xml:space="preserve" fill="#1c2163" stroke="#1c2163"
                                stroke-width="6.674166000000001">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                    stroke="#CCCCCC" stroke-width="4.711176"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#FFFFFF;"
                                        d="M370.812,275.071c0-52.687-42.861-95.677-95.677-95.677s-95.612,42.99-95.612,95.677 s42.861,95.677,95.677,95.677S370.812,327.887,370.812,275.071z">
                                    </path>
                                    <path style="fill:<svg height=" 236px"="" width="236px" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.60 392.60"
                                        xml:space="preserve" fill="#000000" stroke="#000000"
                                        stroke-width="0.003925980000000001">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path style="fill:#FFFFFF;"
                                                d="M370.812,275.071c0-52.687-42.861-95.677-95.677-95.677s-95.612,42.99-95.612,95.677 s42.861,95.677,95.677,95.677S370.812,327.887,370.812,275.071z">
                                            </path>
                                            <path style="fill:#1c2163;"
                                                d="M200.275,184.76c-0.259-0.129-0.453-0.323-0.646-0.453c-9.438-5.624-19.459-10.279-29.931-13.705 l-38.335,67.232c-4.202,7.37-14.739,7.37-18.941,0L74.15,170.537c-10.408,3.491-20.493,8.016-29.931,13.705 c-13.834,8.275-22.432,23.337-22.432,39.434v43.442H158.19C160.388,234.085,176.226,204.671,200.275,184.76z">
                                            </path>
                                            <g>
                                                <path style="fill:#ffffff;"
                                                    d="M275.135,201.374c-40.663,0-73.762,33.034-73.762,73.762c0,40.663,33.099,73.826,73.826,73.826 s73.826-33.164,73.762-73.826C348.962,234.537,315.798,201.374,275.135,201.374z">
                                                </path>
                                                <path style="fill:#ffffff;"
                                                    d="M121.794,21.786c-23.208,0-42.02,18.877-42.02,42.02c0,23.208,18.877,42.02,42.02,42.02 s42.02-18.877,42.02-42.02S144.937,21.786,121.794,21.786z">
                                                </path>
                                            </g>
                                            <g>
                                                <path style="fill:#1c2163;"
                                                    d="M275.135,157.608c-20.17,0-39.176,5.107-55.79,14.158c-2.715-2.327-5.624-4.396-8.598-6.206 c-13.511-8.145-28.121-14.287-43.442-18.489c-4.784-1.293-9.891,0.776-12.347,5.107l-33.164,58.182l-33.099-58.182 c-2.457-4.331-7.499-6.4-12.347-5.107c-15.321,4.202-29.931,10.343-43.442,18.489C12.606,177.713,0,199.952,0,223.612v54.303 c0,6.012,4.848,10.925,10.925,10.925h147.653c6.788,58.311,56.501,103.693,116.558,103.693 c64.776,0,117.463-52.687,117.463-117.463S339.911,157.608,275.135,157.608z M158.19,266.99H21.851v-43.378 c0-15.968,8.598-31.095,22.432-39.434c9.438-5.624,19.459-10.279,29.931-13.705l38.335,67.297c4.202,7.37,14.739,7.37,18.941,0 l38.335-67.297c10.408,3.491,20.493,8.016,29.931,13.705c0.259,0.129,0.453,0.323,0.646,0.453 C176.226,204.606,160.388,233.956,158.19,266.99z M275.135,370.747c-52.752,0-95.612-42.861-95.612-95.677 c0-52.687,42.861-95.677,95.677-95.677s95.612,42.99,95.612,95.677S327.952,370.747,275.135,370.747z">
                                                </path>
                                                <path style="fill:#1c2163;"
                                                    d="M275.135,243.2c5.818,0,10.537,4.719,10.537,10.537c0,6.012,4.848,10.925,10.925,10.925 c6.077,0,10.925-4.848,10.925-10.925c0-13.964-8.986-25.859-21.398-30.384v-4.202c0-6.012-4.848-10.925-10.925-10.925 c-6.012,0-10.925,4.848-10.925,10.925v4.202c-12.412,4.461-21.398,16.356-21.398,30.384c0,17.778,14.481,32.323,32.323,32.323 c5.818,0,10.537,4.719,10.537,10.537s-4.719,10.537-10.537,10.537c-5.818,0-10.537-4.719-10.537-10.537 c0-6.012-4.848-10.925-10.925-10.925c-6.012,0-10.925,4.848-10.925,10.925c0,13.964,8.986,25.859,21.398,30.384v4.202 c0,6.012,4.848,10.925,10.925,10.925c6.077,0,10.925-4.848,10.925-10.925v-4.331c12.412-4.461,21.398-16.356,21.398-30.384 c0-17.778-14.481-32.323-32.323-32.323c-5.818,0-10.537-4.719-10.537-10.537S269.382,243.2,275.135,243.2z">
                                                </path>
                                                <path style="fill:#1c2163;"
                                                    d="M121.794,127.677c35.168,0,63.806-28.638,63.806-63.806c0.065-35.168-28.574-63.806-63.806-63.806 c-35.168,0-63.806,28.638-63.806,63.806C57.923,99.038,86.626,127.677,121.794,127.677z M121.794,21.851 c23.208,0,42.02,18.877,42.02,42.02s-18.877,42.02-42.02,42.02s-42.02-18.877-42.02-42.02S98.586,21.851,121.794,21.851z">
                                                </path>
                                            </g>
                                        </g>;"
                                        d="M200.275,184.76c-0.259-0.129-0.453-0.323-0.646-0.453c-9.438-5.624-19.459-10.279-29.931-13.705
                                        l-38.335,67.232c-4.202,7.37-14.739,7.37-18.941,0L74.15,170.537c-10.408,3.491-20.493,8.016-29.931,13.705
                                        c-13.834,8.275-22.432,23.337-22.432,39.434v43.442H158.19C160.388,234.085,176.226,204.671,200.275,184.76z"&gt;
                                    </path>
                                    <g>
                                        <path style="fill:#ffffff;"
                                            d="M275.135,201.374c-40.663,0-73.762,33.034-73.762,73.762c0,40.663,33.099,73.826,73.826,73.826 s73.826-33.164,73.762-73.826C348.962,234.537,315.798,201.374,275.135,201.374z">
                                        </path>
                                        <path style="fill:#ffffff;"
                                            d="M121.794,21.786c-23.208,0-42.02,18.877-42.02,42.02c0,23.208,18.877,42.02,42.02,42.02 s42.02-18.877,42.02-42.02S144.937,21.786,121.794,21.786z">
                                        </path>
                                    </g>
                                    <g>
                                        <path style="fill:#1c2163;"
                                            d="M275.135,157.608c-20.17,0-39.176,5.107-55.79,14.158c-2.715-2.327-5.624-4.396-8.598-6.206 c-13.511-8.145-28.121-14.287-43.442-18.489c-4.784-1.293-9.891,0.776-12.347,5.107l-33.164,58.182l-33.099-58.182 c-2.457-4.331-7.499-6.4-12.347-5.107c-15.321,4.202-29.931,10.343-43.442,18.489C12.606,177.713,0,199.952,0,223.612v54.303 c0,6.012,4.848,10.925,10.925,10.925h147.653c6.788,58.311,56.501,103.693,116.558,103.693 c64.776,0,117.463-52.687,117.463-117.463S339.911,157.608,275.135,157.608z M158.19,266.99H21.851v-43.378 c0-15.968,8.598-31.095,22.432-39.434c9.438-5.624,19.459-10.279,29.931-13.705l38.335,67.297c4.202,7.37,14.739,7.37,18.941,0 l38.335-67.297c10.408,3.491,20.493,8.016,29.931,13.705c0.259,0.129,0.453,0.323,0.646,0.453 C176.226,204.606,160.388,233.956,158.19,266.99z M275.135,370.747c-52.752,0-95.612-42.861-95.612-95.677 c0-52.687,42.861-95.677,95.677-95.677s95.612,42.99,95.612,95.677S327.952,370.747,275.135,370.747z">
                                        </path>
                                        <path style="fill:#1c2163;"
                                            d="M275.135,243.2c5.818,0,10.537,4.719,10.537,10.537c0,6.012,4.848,10.925,10.925,10.925 c6.077,0,10.925-4.848,10.925-10.925c0-13.964-8.986-25.859-21.398-30.384v-4.202c0-6.012-4.848-10.925-10.925-10.925 c-6.012,0-10.925,4.848-10.925,10.925v4.202c-12.412,4.461-21.398,16.356-21.398,30.384c0,17.778,14.481,32.323,32.323,32.323 c5.818,0,10.537,4.719,10.537,10.537s-4.719,10.537-10.537,10.537c-5.818,0-10.537-4.719-10.537-10.537 c0-6.012-4.848-10.925-10.925-10.925c-6.012,0-10.925,4.848-10.925,10.925c0,13.964,8.986,25.859,21.398,30.384v4.202 c0,6.012,4.848,10.925,10.925,10.925c6.077,0,10.925-4.848,10.925-10.925v-4.331c12.412-4.461,21.398-16.356,21.398-30.384 c0-17.778-14.481-32.323-32.323-32.323c-5.818,0-10.537-4.719-10.537-10.537S269.382,243.2,275.135,243.2z">
                                        </path>
                                        <path style="fill:#1c2163;"
                                            d="M121.794,127.677c35.168,0,63.806-28.638,63.806-63.806c0.065-35.168-28.574-63.806-63.806-63.806 c-35.168,0-63.806,28.638-63.806,63.806C57.923,99.038,86.626,127.677,121.794,127.677z M121.794,21.851 c23.208,0,42.02,18.877,42.02,42.02s-18.877,42.02-42.02,42.02s-42.02-18.877-42.02-42.02S98.586,21.851,121.794,21.851z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
                <li class="nav-item mt-3">

                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Facturation</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{$devis}}" href="{{route('devis', $autoentrepreneur->id)}}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="223px" height="223px" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#1c2163" stroke-width="0.495">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M4.5 7H4V8H4.5V7ZM10.5 8H11V7H10.5V8ZM8.5 10H8V11H8.5V10ZM10.5 11H11V10H10.5V11ZM4.5 4H4V5H4.5V4ZM6.5 5H7V4H6.5V5ZM10.5 0.5L10.8536 0.146447L10.7071 0H10.5V0.5ZM13.5 3.5H14V3.29289L13.8536 3.14645L13.5 3.5ZM4.5 8H10.5V7H4.5V8ZM8.5 11H10.5V10H8.5V11ZM4.5 5H6.5V4H4.5V5ZM12.5 14H2.5V15H12.5V14ZM2 13.5V1.5H1V13.5H2ZM2.5 1H10.5V0H2.5V1ZM13 3.5V13.5H14V3.5H13ZM10.1464 0.853553L13.1464 3.85355L13.8536 3.14645L10.8536 0.146447L10.1464 0.853553ZM2.5 14C2.22386 14 2 13.7761 2 13.5H1C1 14.3284 1.67157 15 2.5 15V14ZM12.5 15C13.3284 15 14 14.3284 14 13.5H13C13 13.7761 12.7761 14 12.5 14V15ZM2 1.5C2 1.22386 2.22386 1 2.5 1V0C1.67157 0 1 0.671574 1 1.5H2Z"
                                        fill="#1c2163"></path>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Devis</span>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('bon_de_commandes', $autoentrepreneur->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="256px" height="256px"
                                viewBox="0 0 32.00 32.00" xml:space="preserve" fill="#1c2163" stroke="#1c2163"
                                stroke-width="0.352">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">
                                        .sharpcorners_een {
                                            fill: #1c2163;
                                        }

                                        .st0 {
                                            fill: #1c2163;
                                        }
                                    </style>
                                    <path class="sharpcorners_een"
                                        d="M10,27h4c0,1.105-0.895,2-2,2S10,28.105,10,27z M23,29c1.105,0,2-0.895,2-2h-4 C21,28.105,21.895,29,23,29z M30,9H6.819l-1-5H2v2h2.181l4,20H26v-2H9.819l-0.6-3H26L30,9z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Bons de commande</span>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">

                <li class="nav-item">
                    <a class="nav-link  {{ $produit }}" href="{{ route('produits', $autoentrepreneur->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg fill="#000000" viewBox="0 0 32 32"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g transform="matrix(1,0,0,1,-144,-288)">
                                        <g transform="matrix(1.2,0,0,1,-29.6,-3)">
                                            <path
                                                d="M168,300L148,300L148,318C148,318.53 148.176,319.039 148.488,319.414C148.801,319.789 149.225,320 149.667,320C153.433,320 162.567,320 166.333,320C166.775,320 167.199,319.789 167.512,319.414C167.824,319.039 168,318.53 168,318C168,312.935 168,300 168,300Z"
                                                style="fill:#ffffff;"></path>
                                        </g>
                                        <path
                                            d="M148,297C148,297 149.581,293.839 150.447,292.106C150.786,291.428 151.479,291 152.236,291C155.527,291 164.473,291 167.764,291C168.521,291 169.214,291.428 169.553,292.106C170.419,293.839 172,297 172,297"
                                            style="fill:#ffffff;"></path>
                                        <path
                                            d="M167.764,290L152.236,290C151.1,290 150.061,290.642 149.553,291.658L147.115,296.535C147.041,296.674 147,296.832 147,297L147,315C147,315.796 147.316,316.559 147.879,317.121C148.441,317.684 149.204,318 150,318C154.52,318 165.48,318 170,318C170.796,318 171.559,317.684 172.121,317.121C172.684,316.559 173,315.796 173,315C173,309.935 173,297 173,297C173,296.832 172.959,296.674 172.885,296.535L170.447,291.658C169.939,290.642 168.9,290 167.764,290ZM164,298L164,301C164,301.53 163.789,302.039 163.414,302.414C163.039,302.789 162.53,303 162,303C160.89,303 159.11,303 158,303C157.47,303 156.961,302.789 156.586,302.414C156.211,302.039 156,301.53 156,301L156,298L149,298L149,315C149,315.265 149.105,315.52 149.293,315.707C149.48,315.895 149.735,316 150,316L170,316C170.265,316 170.52,315.895 170.707,315.707C170.895,315.52 171,315.265 171,315L171,298L164,298ZM152,314L154,314C154.552,314 155,313.552 155,313C155,312.448 154.552,312 154,312L152,312C151.448,312 151,312.448 151,313C151,313.552 151.448,314 152,314ZM152,310L156,310C156.552,310 157,309.552 157,309C157,308.448 156.552,308 156,308L152,308C151.448,308 151,308.448 151,309C151,309.552 151.448,310 152,310ZM162,301L158,301C158,301 158,298 158,298L162,298L162,301ZM163.18,292L163.847,296L170.382,296L168.658,292.553C168.489,292.214 168.143,292 167.764,292L163.18,292ZM156.82,292L152.236,292C151.857,292 151.511,292.214 151.342,292.553L149.618,296L156.153,296L156.82,292ZM158.18,296L158.847,292L161.153,292L161.82,296L158.18,296Z"
                                            style="fill:#1c2163;"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Produits</span>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">


                <li class="nav-item">
                    <a class="nav-link {{ $fournisseure }}"
                        href="{{ route('fournisseures', $autoentrepreneur->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill="#1c2163"
                                        d="M16 4l-8.060-4-7.94 4v1h1v11h2v-9h10v9h2v-11h1v-1zM4 6v-1h2v1h-2zM7 6v-1h2v1h-2zM10 6v-1h2v1h-2z">
                                    </path>
                                    <path fill="#1c2163" d="M6 9h-1v-1h-1v3h3v-3h-1v1z"></path>
                                    <path fill="#1c2163" d="M6 13h-1v-1h-1v3h3v-3h-1v1z"></path>
                                    <path fill="#1c2163" d="M10 13h-1v-1h-1v3h3v-3h-1v1z"></path>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Fournisseurs</span>
                    </a>
                </li>

                <hr class="horizontal dark mt-0">


                <li class="nav-item">
                    <a class="nav-link  {{$depense}}  "
                        href="{{ route('depenses', $autoentrepreneur->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                width="203px" height="203px" fill="#1c2163" stroke="#1c2163"
                                stroke-width="0.00512">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#D3D7DF;" d="M396.8,448H115.2v51.2H448V64h-51.2V448z"></path>
                                    <path style="fill:#E9EBEF;" d="M64,12.8V448h332.8V12.8H64z"></path>
                                    <g>
                                        <path style="fill:#1c2163;"
                                            d="M311.134,296.926v-49.579c3.447,0.802,6.4,2.048,8.764,3.746c4.702,3.524,7.151,8.721,7.484,15.701 c0,4.173,1.348,7.646,4.036,10.325c4.847,4.821,13.841,4.599,17.997-0.051c2.628-2.671,3.959-6.153,3.959-10.274 c0-13.124-4.574-23.902-13.636-32.102c-7.509-6.647-17.126-10.752-28.612-12.151v-6.05c0-7.1-4.676-11.699-11.913-11.699 c-7.1,0-11.691,4.599-11.691,11.699v5.999c-11.537,1.323-21.35,5.427-29.21,12.151c-10.24,8.926-15.428,20.821-15.428,35.422 c0,12.774,4.702,23.228,13.935,31.078c7.091,6.101,17.135,10.871,30.703,14.524v53.623c-5.897-1.246-10.641-3.354-14.114-6.221 c-6.101-5.171-9.011-12.851-8.892-23.526c0-4.096-1.263-7.552-3.541-9.822c-4.489-5.026-13.739-4.873-17.801-0.247 c-2.509,2.5-3.789,5.871-3.789,10.078c0,19.473,6.025,34.099,17.954,43.529c7.339,5.521,17.476,9.225,30.174,11.025v10.351 c0,7.228,4.591,11.904,11.691,11.904c7.236,0,11.913-4.676,11.913-11.904v-10.129c12.066-1.852,22.451-6.451,30.925-13.696 c10.854-9.301,16.358-21.376,16.358-35.857c0-13.679-4.864-24.602-14.438-32.452C336.922,306.449,326.178,301.423,311.134,296.926z M287.539,290.15c-5.948-2.176-10.385-4.753-13.235-7.646c-3.49-3.601-5.188-8.149-5.188-13.952c0-7.074,2.526-12.271,7.936-16.324 c3.012-2.253,6.528-3.874,10.487-4.898V290.15z M322.961,363.477c-3.439,2.551-7.398,4.429-11.827,5.623v-46.549 c9.062,2.85,13.312,5.478,15.309,7.296c3.661,3.226,5.513,8.704,5.513,16.222C331.964,353.553,329.114,359.074,322.961,363.477z">
                                        </path>
                                        <path style="fill:#1c2163;"
                                            d="M51.2,0v460.8h51.2V512h358.4V51.2h-51.2V0H51.2z M76.8,435.2V25.6H384v409.6H76.8z M435.2,76.8 v409.6H128v-25.6h281.6v-384H435.2z">
                                        </path>
                                        <rect x="102.4" y="51.2" style="fill:#1c2163;" width="256" height="25.6">
                                        </rect>
                                        <rect x="102.4" y="153.6" style="fill:#1c2163;" width="76.8"
                                            height="25.6"></rect>
                                        <rect x="102.4" y="358.4" style="fill:#1c2163;" width="76.8"
                                            height="25.6"></rect>
                                        <rect x="102.4" y="102.4" style="fill:#1c2163;" width="128"
                                            height="25.6"></rect>
                                        <rect x="256" y="102.4" style="fill:#1c2163;" width="102.4" height="25.6">
                                        </rect>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dépenses</span>
                    </a>
                </li>
             
               
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">paramètres globaux</h6>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link {{ $profile }} " href="{{ route('profile.edit') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
              
            </ul>
        </div>
























        <div class="sidenav-footer mx-3 mb-0">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                <div class="full-background"
                    style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true"
                            id="sidenavCardIcon"></i>
                    </div>
                    <div class="docs-info">
                        <h6 class="text-white up mb-0">Besoin d'aide ?</h6>
                        <p class="text-xs font-weight-bold">Veuillez consulter notre assistance</p>
                        <a  onclick="showModal()"
                            target="_blank" class="btn btn-white btn-sm w-100 mb-0">Contactez-nous</a>
                    </div>
                </div>
            </div>
            <a class="btn bg-gradient-primary mt-3 w-100"
                href=""></a>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> --}}
                    </ol>
                    {{-- <h6 class="font-weight-bolder mb-0">Dashboard</h6> --}}
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Rechercher ...">
                        </div> --}}
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        {{-- <li class="nav-item d-flex align-items-center">
                  <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
                </li> --}}
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <form method="POST" action="{{ route('logout') }}"
                                    class="nav-link text-body font-weight-bold d px-0">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                        <i class="fa-solid fa-right-from-bracket text-body font-weight-bold"></i>
                                        <span class="d-sm-inline d-none text-body font-weight-bold">Déconnexion</span>
                                    </x-dropdown-link>
                                </form>
                            </a>
                        </li>

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        {{-- <li class="nav-item px-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                  </a>
                </li> --}}
                
     
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            
                          
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                @if(!empty($notifications))
                              @foreach ($notifications as $notification )
                           
                                <li>
                                    <a class="dropdown-item border-radius-md" >
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    {{$notification->reponse}}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    {{$notification->updated_at}}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach 
                                @else
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <i class="fa fa-bell me-1"></i>

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Acune notification pour le moment
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                   
                                                   
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            </ul> 
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




        @yield('content')

        <footer class="footer py-5">
            <div class="container">

                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> SoloTrack by DotKoncept.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        </div>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg ">
                {{-- <div class="card-header  ">
                    {{--      <h5 class="mt-3 mb-0"></h5>
                        <p></p>
                    </div> 
                   
                    <!-- End Toggle Button -->
                </div> --}}
                <div class="float-end mt-2">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Couleurs de la barre latérale</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger"
                                onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Type de navigation latérale</h6>
                        <p class="text-sm">Choisissez entre 2 types de navigation latérale différents.</p>
                    </div>
                    <div class="d-flex">
                        
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                            onclick="sidebarType(this)">Transparent</button>
                            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                                onclick="sidebarType(this)">Blanc</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">Vous pouvez changer le type de navigation latérale uniquement en vue de bureau.</p>
                    <!-- Navbar Fixe -->
                    <div class="mt-5 d-flex">
                        <h6 class="mb-0">Barre de navigation fixe</h6>
                      <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                      </div>
                    </div>
                    <hr class="horizontal dark my-3">
                    <div class="mt-2 d-flex">
                      <h6 class="mb-0">Clair / Sombre</h6>
                      <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                      </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <div class="d-flex ">
                    <div id="google_translate_element"></div></div>
                    <hr class="horizontal dark my-sm-4">
                    <a class="btn bg-gradient-dark w-100"
                    onclick="showModal()">Contactez-nous</a>
                    <a class="btn btn-outline-dark w-100"
                    href=" {{ route('home') }}" target="_blank">
                        retourner à la page d'accueil</a>
                    <div class="w-100 text-center">
                     
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close" onclick="hideModal()">×</span>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-6">
                                <div class="position-relative bg-gradient-primary h-100 m-0 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/contact.jpg'); background-size: cover;"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h4 class="font-weight-bolder">Contactez-nous</h4>
                                        <p class="mb-0">Entrez la catégorie de votre consultation et votre message pour nous contacter</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('contact.submit',$autoentrepreneur->id) }}" method="POST" role="form">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="category">Catégorie de consultation :</label>
                                                <select id="category" name="category" class="form-select p-1 ms-3 me-3 rounded-2 w-auto">
                                                    <option value="Gestion financière">Gestion financière</option>
                                                    <option value="Marketing et branding">Marketing et branding</option>
                                                    <option value="Opérations et logistique3">Opérations et logistique</option>
                                                    <option value="Ressources humaines">Ressources humaines</option>
                                                    <option value="Conformité légale et réglementaire">Conformité légale et réglementaire</option>
                                                    <option value="Technologie et services informatiques">Technologie et services informatiques</option>
                                                    <option value="Planification stratégique">Planification stratégique</option>
                                                    <option value="Service client et satisfaction">Service client et satisfaction</option>
                                                    <option value="Gestion des risques">Gestion des risques</option>
                                                    <option value="Ventes et développement commercial">Ventes et développement commercial</option>
                                                </select>
                                            </div>
    
                                            <div class="mb-3">
                                                <label class="form-label">Message :</label>
                                                <textarea class="form-control" rows="4" name="message"></textarea>
                                            </div>
    
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg   btn-lg w-auto btn-contact">Envoyer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>      </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'fr',
                includedLanguages: 'en,es',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

        <script>
            function showModal() {
                document.getElementById('modalOverlay').style.display = 'block';
            }
        
            function hideModal() {
                document.getElementById('modalOverlay').style.display = 'none';
            }
        </script>
        

        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/chartjs.min.js"></script>
      
       
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <script>function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'fr',
                includedLanguages: 'en,fr,ar',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
        
        // Call the translation function when the user selects a different language
        document.addEventListener("DOMContentLoaded", function() {
            var langSelect = document.getElementById('lang-select'); // Assuming you have a language selection dropdown
            langSelect.addEventListener('change', function() {
                var selectedLang = langSelect.value;
                translatePage(selectedLang);
            });
        });
        
        // Translation function
        function translatePage(lang) {
            var translateService = new google.translate.TranslateService();
            translateService.translate(document.body, lang);
        }</script>
        <script>
         //      document.getElementById("showDivLink").addEventListener("click", function(event) {
              //     event.preventDefault();
             //      document.getElementById("hiddenDiv").style.display = "block";
            //   }); 
            document.getElementById('showDivLink').addEventListener("click", function(event) {
                event.preventDefault();
   
            document.getElementById('hiddenDiv').classList.remove('hidden-row');
          


        
    });
        </script>

<script>
    document.getElementById("showCategorieButton").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("CategorieForm").classList.remove('hidden-row');
        document.getElementById('showCategorieButton').style.display = "none";
        document.getElementById('CategorieForm').classList.add('p-0 d-flex align-items-center');

    });
</script>

        {{-- <script>
            document.getElementById('clientSelect').addEventListener('change', function() {
                if (this.value === "") {
                    document.getElementById('ClientInput').classList.remove('hidden-row');

                    document.getElementById('SaveOperation').classList.add('hidden-row');

                    document.getElementById('hideDivLink').classList.add('hidden-row');

                } else {

                    document.getElementById('ClientInput').classList.add('hidden-row');
                }
            });
        </script> --}}

        <script>
            document.getElementById('ProduitSelect').addEventListener('change', function() {
                if (this.value === "") {
                    document.getElementById('ProduitInput').classList.remove('hidden-row');
                    document.getElementById('SaveOperation').classList.add('hidden-row');

                    document.getElementById('hideDivLink').classList.add('hidden-row');
                } else {
                    document.getElementById('ProduitInput').classList.add('hidden-row');
                }
            });
        </script>
   <script>
    document.getElementById('showUpdateRow').addEventListener("click", function(event) {
                event.preventDefault();
   
            document.getElementById('UpdateRow').classList.remove('hidden-row');
            document.getElementById('TableRow').classList.add('hidden-row');


        
    });
</script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButtons = document.querySelectorAll('.toggle-operations');
                toggleButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const fournisseurId = this.getAttribute('data-fournisseur');
                        const operationsRow = document.getElementById('operationsRow' + fournisseurId);
                        operationsRow.style.display = operationsRow.style.display === 'none' ?
                            'table-row' : 'none';
                    });
                });
            });
        </script>
        <script>
            document.querySelectorAll('.operation-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    showOperation(this);
                });
            });

            function showOperation(link) {
                var div = document.getElementById('myDiv');

                // Show the div
                div.style.display = 'block';
            }
            document.getElementById('showRowButton').addEventListener('click', function() {
                document.getElementById('hiddenRow').classList.toggle('hidden-row');
            });
            document.getElementById('showDivButton').addEventListener('click', function() {
                document.getElementById('hiddenDiv').classList.toggle('hidden-row');
            });
            document.getElementById("hideDivLink").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("hiddenRow").style.display = "none";
            });

            document.getElementById("hideUpdateRow").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("UpdateRow").style.display = "none";
            });

        
        </script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
     
</body>

</html>
