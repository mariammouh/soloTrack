{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}

{{-- =========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/images/logo1.png">
  <title> Solo Track </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "  href="{{route('home')}}">            <span >
            <img src="images/logo1.png" height="40" width="40"   alt=""><span class="font-weight-bolder text-logo text-gradient" 
            style="" >OLO TRACK</span>
          </span>
        </a>
      <!-- <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-up.html">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-in.html">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
        </li>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
          </li>
        </ul>
      </div> -->
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/back.jpeg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
                <h1 class="text-white mb-2 mt-5">Bienvenue !</h1>
                <p class="text-lead text-white">Remplissez ce formulaire pour créer votre compte sur SoloTrack.</p></div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-8 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              {{-- <div class="card-header text-center pt-4">
                <h5>Register with</h5>
              </div>
              <div class="row px-xl-5 px-sm-4 px-3">
                <div class="col-3 ms-auto px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink32">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="facebook-3" transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                          <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                          <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" id="Path" fill="#FFFFFF"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="col-3 px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="apple-black" transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                          <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144" id="Shape"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="col-3 me-auto px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                          <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                          <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                          <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                          <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>



                <!-------------robeerrtt ------->
                <div class="mt-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    or
                  </p>
                </div>
              </div> --}}
              <div class="card-body">
                
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-xl-5 px-sm-4 px-3">
                      <div class="input-field ">
                        <label for="image">Sélectionnez une image/logo pour profile:</label>
                        <label class="custum-file-upload" for="file">
                          <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                              <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                              <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                              <g id="SVGRepo_iconCarrier">
                                <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                              </g>
                            </svg>
                          </div>
                          <div class="text">
                            <span>Click-ez ici</span>
                          </div>
                          <input type="file" id="file" name="photo">
                      </div>
                    </div>                            
                    <!-- Name -->
                    <div class="row px-xl-5 px-sm-4 px-3">
                      <div class="col-4 ms-auto px-2 mb-4">
                          <label for="full_name">Nom</label>
                          <input type="text" class="form-control" placeholder="Ex: Jean Dupont" aria-label="Nom" aria-describedby="name-addon" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                          @error('name')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" placeholder="Ex: jean.dupont@example.com" aria-label="Email" aria-describedby="email-addon" name="email" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="ICE">ICE (Identifiant Commun d'Entreprise)</label>
                          <input type="text" class="form-control" placeholder="Ex: 1234567890" aria-label="ICE" aria-describedby="ice-addon" name="ICE" value="{{ old('ICE') }}" required autocomplete="ICE">
                          @error('ICE')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  
                  <!-- Additional Inputs -->
                  <div class="row px-xl-5 px-sm-4 px-3">
                    <div class="col-4 px-2 mb-4">
                      <label for="nom_entreprise">Nom de l'entreprise</label>
                      <input type="text" class="form-control" placeholder="Ex: Ma Super Entreprise" aria-label="Nom de l'entreprise" aria-describedby="nom_entreprise-addon" name="nom_entreprise" value="{{ old('nom_entreprise') }}">
                      @error('nom_entreprise')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="date_creation">Date de création de l'entreprise</label>
                          <input type="date" class="form-control" aria-label="Date de création de l'entreprise" aria-describedby="date_creation-addon" name="date_creation" value="{{ old('date_creation') }}">
                          @error('date_creation')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="TP">TP (Taxe Professionnelle)</label>
                          <input type="text" class="form-control" placeholder="Ex: 9876543210" aria-label="TP" aria-describedby="tp-addon" name="TP" value="{{ old('TP') }}">
                          @error('TP')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="row px-xl-5 px-sm-4 px-3">
                      <div class="col-4 px-2 mb-4">
                          <label for="CNCC">Code CNCC (Code National de la Chambre de Commerce)</label>
                          <input type="text" class="form-control" placeholder="Ex: CNCC123456" aria-label="CNCC" aria-describedby="cncc-addon" name="CNCC" value="{{ old('CNCC') }}">
                          @error('CNCC')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="numero_autoentrepreneur">Numéro Autoentrepreneur</label>
                          <input type="text" class="form-control" placeholder="Ex: AE987654321" aria-label="Numéro Autoentrepreneur" aria-describedby="numero_autoentrepreneur-addon" name="numero_autoentrepreneur" value="{{ old('numero_autoentrepreneur') }}">
                          @error('numero_autoentrepreneur')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="taux_tax">Taux de Tax</label>
                          <input type="number" step="0.01" class="form-control" placeholder="Ex: 20.00" aria-label="Taux de Tax" aria-describedby="taux_tax-addon" name="taux_tax" value="{{ old('taux_tax') }}">
                          @error('taux_tax')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="row px-xl-5 px-sm-4 px-3">
                      <div class="col-4 px-2 mb-4">
                          <label for="domain_travail">Domaine de travail</label>
                          <input type="text" class="form-control" placeholder="Ex: Technologie, Santé" aria-label="Domaine de travail" aria-describedby="domain_travail-addon" name="domain_travail" value="{{ old('domain_travail') }}">
                          @error('domain_travail')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="contact">Téléphone portable</label>
                          <input type="tel" class="form-control" placeholder="Ex: 0612345678" aria-label="Téléphone portable" aria-describedby="contact-addon" name="contact" value="{{ old('contact') }}">
                          @error('contact')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="adresse">Adresse</label>
                          <input type="text" class="form-control" placeholder="Ex: 123 Rue Principale" aria-label="Adresse" aria-describedby="adresse-addon" name="adresse" value="{{ old('adresse') }}">
                          @error('adresse')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="row px-xl-5 px-sm-4 px-3">
                      <div class="col-4 px-2 mb-4">
                          <label for="identifiant_fiscal">Identifiant Fiscal</label>
                          <input type="text" class="form-control" placeholder="Ex: IF123456789" aria-label="Identifiant Fiscal" aria-describedby="identifiant_fiscal-addon" name="identifiant_fiscal" value="{{ old('identifiant_fiscal') }}">
                          @error('identifiant_fiscal')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="password">Mot de passe</label>
                          <input type="password" class="form-control" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="password-addon" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                          @error('password')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                      <div class="col-4 px-2 mb-4">
                          <label for="password_confirmation">Confirmez le mot de passe</label>
                          <input type="password" class="form-control" placeholder="Confirmez le mot de passe" aria-label="Confirmez le mot de passe" aria-describedby="password_confirmation-addon" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                          @error('password_confirmation')
                              <p class="text-sm text-red-600">{{ $message }}</p>
                          @enderror
                      </div>
                  </div>
                  
                
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        J'accepte les <a href="javascript:;" class="text-dark font-weight-bolder">Termes et conditions</a>
                    </label>
                </div>
                
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">S'inscrire</button>
                    </div>
                    <p class="text-sm mt-3 mb-0">Vous avez déjà un compte ? <a href="javascript:;" class="text-dark font-weight-bolder">Connectez-vous</a></p>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
 <footer class="footer py-5">
      <div class="container">
        <!-- <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
            </a>
          </div>
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div> -->
        <div class="row">
          <div class="col-8 mx-auto text-center mt-0">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script>  SoloTrack by DotKoncept.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
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
</body>

</html> 