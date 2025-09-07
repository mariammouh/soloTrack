@extends('layouts.head')




    @section('content')
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/back.jpeg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="        {{$autoentrepreneur->logo   }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
             {{Auth::user()->name   }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{$autoentrepreneur->Nom_entreprise   }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>document</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(154.000000, 300.000000)">
                              <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                              <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-4">
          <div class="card h-100">
              <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Vos prochains rappels </h6>
                 
              </div>
              <div class="card-body p-3">
              
                <ul class="  px-2 py-3 me-sm-n4">
             
                @if(!empty($notifications))
               
              @foreach ($notifications as $notification )
              <div class="row">
                <div class="col">
                 
                        <div class="d-flex">
                            <div class="avatar avatar-sm bg-gradient-secondary  me-2  my-auto">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-credit-card fa-stack-1x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    Attention, vous avez une dépense prochaine : 
                            <br>{{ $notification->description }} d'un montant de {{ $notification->montant }}DH.
                                </h6>
                                <p class="text-xs text-secondary text-danger mb-0 ">
                                    <i class="fa fa-clock me-1"></i>
                                    {{$notification->date_limit_depense}}
                                </p>
                            </div>
                        </div>
                   
                </div>
            </div>
            <hr class="horizontal dark mt-1">

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
              </div>
          </div>
      </div>
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Modifier le mot de passe</h6>
                  
                </div>
                <div class="col-md-4 text-end">
                  <a href="#profile">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
                @include('profile.partials.update-password-form')
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Supprimer le compte</h6>
            </div>
            <div class="card-body p-3">
                @include('profile.partials.delete-user-form')
            </div>
          </div>
        </div>
        <div class="col-12 mt-4" id="profile"> 
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Informations du profil</h6>
              <p class="text-sm">Mettez à jour les informations de profil de votre compte</p>
            </div>
            <div class="card-body p-3">
              <div class="row">
             
                 
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
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
                        <!-- Additional Inputs -->
                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="col-4 px-2 mb-4">
                                <label for="full_name">Nom de l'entreprise</label>
                                <input type="text" value="{{$autoentrepreneur->Nom_entreprise}}" id="full_name" name="nom_ense" class="form-control" placeholder="{{$autoentrepreneur->Nom_entreprise}}" aria-label="Nom complet">
                                <!-- Error handling for nom_ense -->
                                @error('nom_ense')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4 px-2 mb-4">
                                <label for="full_name">Email</label>
                                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" value="    {{Auth::user()->email   }}" required autocomplete="email">
                                @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="col-4 px-2 mb-4">
                              <label for="TP">TP (Taxe Professionnelle)</label>
                              <input type="text" class="form-control" placeholder="Ex: 9876543210" aria-label="TP" aria-describedby="tp-addon" name="TP" value="{{ $autoentrepreneur->TP }}">
                              @error('TP')
                                  <span class="text-red-500">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                    
                        <!-- Domain de travail -->
                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="col-4 px-2 mb-4">
                                <label for="snn_id">Domaine de travail</label>
                                <input type="text" id="snn_id" name="domain_travail" class="form-control" placeholder="Domaine de travail" aria-label="SNN / ID gouvernemental" value="{{$autoentrepreneur->Domain_de_travail}}">
                                <!-- Error handling for domain_travail -->
                                @error('domain_travail')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Téléphone portable -->
                            <div class="col-4 px-2 mb-4">
                                <label for="cell_phone">Téléphone portable</label>
                                <input type="tel" id="cell_phone" name="contact" class="form-control" placeholder="Téléphone portable" aria-label="Téléphone portable" value="{{$autoentrepreneur->contact }}">
                                <!-- Error handling for contact -->
                                @error('contact')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4 px-2 mb-4">
                              <label for="CNCC">Code CNCC (Code National de la Chambre de Commerce)</label>
                              <input type="text" class="form-control" placeholder="Ex: CNCC123456" aria-label="CNCC" aria-describedby="cncc-addon" name="CNCC" value="{{ $autoentrepreneur->CNCC }}">
                              @error('CNCC')
                                  <span class="text-red-500">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                    
                        <!-- Identifiant Fiscal -->
                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="col-4 px-2 mb-4">
                                <label for="contact_email">Identifiant Fiscal</label>
                                <input type="text" id="contact_email" name="if" class="form-control" placeholder="Identifiant Fiscal" aria-label="E-mail de contact" value="{{$autoentrepreneur->Identifiant_Fiscal }}">
                                <!-- Error handling for if -->
                                @error('if')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Adresse -->
                            <div class="col-4 px-2 mb-4">
                                <label for="street_address">Adresse</label>
                                <input type="text" id="street_address" name="adresse" class="form-control" placeholder="Adresse" aria-label="Adresse" value="{{ $autoentrepreneur->adresse }}">
                                <!-- Error handling for adresse -->
                                @error('adresse')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4 px-2 mb-4">
                              <label for="taux_tax">Taux de Tax</label>
                              <input type="number" step="0.01" class="form-control" placeholder="Ex: 20.00" aria-label="Taux de Tax" aria-describedby="taux_tax-addon" name="taux_tax" value="{{ $autoentrepreneur->taux_tax }}">
                              @error('taux_tax')
                                  <span class="text-red-500">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>
                        <div class="row px-xl-5 px-sm-4 px-3">
                          <div class="mb-4 col-6 px-2"> 
                            <label for="ICE">ICE (Identifiant Commun d'Entreprise)</label>
                          <input type="text" class="form-control" placeholder="Ex: 1234567890" aria-label="ICE" aria-describedby="ice-addon" name="ICE" value="{{ $autoentrepreneur->ICE }}" required autocomplete="ICE">
                          @error('ICE')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                          </div> 
                          <div class="mb-4 col-6 px-2"> 
                          <label for="numero_autoentrepreneur">Numéro Autoentrepreneur</label>
                          <input type="text" class="form-control" placeholder="Ex: AE987654321" aria-label="Numéro Autoentrepreneur" aria-describedby="numero_autoentrepreneur-addon" name="numero_autoentrepreneur" value="{{$autoentrepreneur->numero_autoentrepreneur }}">
                          @error('numero_autoentrepreneur')
                              <span class="text-red-500">{{ $message }}</span>
                          @enderror
                        </div>  </div>
                        </div>
                    
                        
                    
                        <div class="text-center fit-content">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Enregistrer</button>
                        </div>
                    </form>
           
        
        </div>
      </div></div>
     
    
    
    
    
      </script>

      @endsection</div></main>