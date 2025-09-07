@extends('layouts.head')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Vos clients</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <a id="showRowButton" class="add-button-container">+ Ajouter client</a>
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <form class="ml-9" action="{{ route('clients.recherche', $autoentrepreneur->id) }}"
                                    method="post">
                                    @csrf
                                        <div class="input-group">
                                            <button type="submit" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></button>

                                            <input type="text" name="recherche" class="form-control"
                                                placeholder="Rechercher...">
                                        </div>
                                </form>

                            </div>
                        </div>

                        <table class="table align-items-center mb-0" id="myTable">
                            @if (!empty($clients))
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Adresse</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Contact</th>


                                        <th colspan="2"
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opérations</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($clients as $fourniseure)
                                        <tr>
                                            <form method="post"
                                                action="{{ route('clients.update', $fourniseure->id) }}"
                                                class="p-6">
                                                @csrf
                                                @method('patch')
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <a type="button" class="toggle-operations"
                                                                data-fournisseur="{{ $fourniseure->id }}">
                                                                <span class="fa-stack fa-lg">
                                                                    
                                                                    <i class="fa fa-user fa-stack-1x"></i>
                                                                  </span>                                                            </a>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><input type="text"
                                                                    class="form-control invisible-input" name="nom"
                                                                    value="{{ $fourniseure->nom }}"></h6>
                                                            <p class="text-xs text-secondary mb-0"><input type="text"
                                                                    class="form-control invisible-input" name="email"
                                                                    value="{{ $fourniseure->email }}"></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"></p>
                                                    <p class="text-xs text-secondary mb-0"><input type="text"
                                                            class="form-control invisible-input" name="adresse"
                                                            value="{{ $fourniseure->adresse }}"></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><input
                                                            type="text" class="form-control invisible-input"
                                                            name="contact" value="{{ $fourniseure->contact }}"></span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <button type="submit" class="badge badge-sm bg-gradient-success"
                                                        type="submit">Enregistrer</button>
                                                </td>
                                            </form>
                                            <td class="align-middle">
                                                <form method="post"
                                                    action="{{ route('clients.destroy', $fourniseure->id) }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="bin-button" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 39 7" class="bin-top">
                                                            <line stroke-width="4" stroke="white" y2="5"
                                                                x2="39" y1="5"></line>
                                                            <line stroke-width="3" stroke="white" y2="1.5"
                                                                x2="26.0357" y1="1.5" x1="12"></line>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 33 39" class="bin-bottom">
                                                            <mask fill="white" id="path-1-inside-1_8_19">
                                                                <path
                                                                    d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z">
                                                                </path>
                                                            </mask>
                                                            <path mask="url(#path-1-inside-1_8_19)" fill="white"
                                                                d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z">
                                                            </path>
                                                            <path stroke-width="4" stroke="white" d="M12 6L12 29">
                                                            </path>
                                                            <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 89 80" class="garbage">
                                                            <path fill="white"
                                                                d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>


                                        @if (!empty($ventes))
                                            {{-- <h5 class=" flex-column justify-content-center px-2 py-1">Les operations de ce
                                                    fournisseur :</h5> --}}
                                            @php
                                                $i = 0;

                                            @endphp
                                            @foreach ($ventes as $achat)
                                                @if ($achat->id_client === $fourniseure->id)
                                                    @php
                                                        $i++;

                                                    @endphp
                                                    <tr class="operations-row" id="operationsRow{{ $fourniseure->id }}"
                                                        style="display: none;">
                                                        <td colspan="5">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>


                                                                    <a
                                                                        href="{{ route('devis.download.pdf', $achat->facture_id) }}">



                                                                        <img src="../assets/img/download-pdf.png"
                                                                            class="avatar avatar-sm me-3">
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">Numéro devis:
                                                                        {{ $achat->facture_id }}</h6>

                                                                    <p class="text-xs text-secondary mb-0">Prix total:
                                                                        {{ $achat->total_prix }}</p>
                                                                    <p class="text-xs text-secondary mb-0">Mode de
                                                                        paiement:
                                                                        {{ $achat->mode_paiement }}</p>
                                                                    <p class="text-xs text-secondary mb-0">Date
                                                                        d'opération:
                                                                        {{ $achat->date_operation }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @if ($i === 0)
                                                <tr class="operations-row" id="operationsRow{{ $fourniseure->id }}"
                                                    style="display: none;">

                                                    <td
                                                        colspan="5"class=" flex-column justify-content-center px-3 py-2">
                                                        {{ 'Aucune opération ' }} </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">{{ 'Aucun client' }}</td>
                                    </tr>
                            @endif

                            <tr id="hiddenRow" class="hidden-row">
                                <form method="post" action="{{ route('clients.add', $autoentrepreneur->id) }}"
                                    class="p-6">
                                    @csrf
                                    <td>

                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <a href="">
                                                    <img src="../assets/img/operation.jpg"
                                                        class="avatar avatar-sm me-3"></a>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><input type="text" class="form-control"
                                                        name="nom" placeholder="Nom de client"></h6>
                                                <p class="text-xs text-secondary mb-0"><input type="text"
                                                        class="form-control" name="email" placeholder="email"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                        <p class="text-xs text-secondary mb-0"><input type="text" class="form-control"
                                                name="adresse" placeholder="adresse"></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><input type="text"
                                                class="form-control" name="contact" placeholder="contact"></span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button class="badge badge-sm bg-gradient-success"
                                            type="submit">Enregistrer</button>
                                    </td>
                                </form>
                                <td class="align-middle">

                                    <button class="bin-button" id="hideDivLink">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 7"
                                            class="bin-top">
                                            <line stroke-width="4" stroke="white" y2="5" x2="39"
                                                y1="5"></line>
                                            <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357"
                                                y1="1.5" x1="12"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 33 39"
                                            class="bin-bottom">
                                            <mask fill="white" id="path-1-inside-1_8_19">
                                                <path
                                                    d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z">
                                                </path>
                                            </mask>
                                            <path mask="url(#path-1-inside-1_8_19)" fill="white"
                                                d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z">
                                            </path>
                                            <path stroke-width="4" stroke="white" d="M12 6L12 29">
                                            </path>
                                            <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 89 80"
                                            class="garbage">
                                            <path fill="white"
                                                d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>




                        {{-- <button id="showRowButton" class="add-button-container">+</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="card-header pb-0">
                        <h6>Statistiques des Clients</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Adresse</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nombre de Devis</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nombre de Revenus</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Pourcentage du Total des Devis</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statics as $static)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>

                                                        <!-- Assuming you want to display the client's logo here -->
                                                        <!-- Replace the src attribute with the appropriate client logo -->
                                                        <i class="ni ni-circle-08 p-2"></i>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $static->nom }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <!-- Assuming you want to display the client's address here -->
                                                <!-- Replace this placeholder with the actual address attribute -->
                                                <p class="text-sm font-weight-bold mb-0">{{ $static->adresse }}</p>
                                            </td>
                                            <td>
                                                <!-- Displaying the number of devis for the client -->
                                                <p class="text-sm font-weight-bold mb-0">{{ $static->devis_count }}</p>
                                            </td>
                                            <td>
                                                <!-- Displaying the number of devis for the client -->
                                                <p class="text-sm font-weight-bold mb-0">{{ $static->prix_total_client }}
                                                    DH</p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <!-- Calculating and displaying the percentage of devis compared to total devis -->
                                                @php
                                                    $pourcentage = number_format(($static->devis_count / $devisCount) * 100 ,1);
                                                @endphp
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span
                                                        class="me-2 text-xs font-weight-bold">{{ $pourcentage }}%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar"
                                                                aria-valuenow="{{ $pourcentage }}" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: {{ $pourcentage }}%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                            </td> --}}
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</div>
</main>
