@extends('layouts.head')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Vos produits</h6>
                        <p class="text-sm">{{ $autoentrepreneur->Nom_entreprise }}</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class=" d-flex align-items-center navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 ">

                            <button id="showDivLink" class="add-button-container col-auto p-2">+ Ajouter produit</button>
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <form class="ml-9" action="{{ route('devis.recherche', $autoentrepreneur->id) }}"
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
                                @if (!empty([$produits]))
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-0">
                                                Example</th>
                                            <th colspan="2"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nom et prix</th>


                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder col-1 opacity-7">
                                                Stock</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description</th>
                                            <th colspan="2"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Opérations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produits as $produit)
                                            <tr>
                                                <form method="POST" action="{{ route('produits.update', $produit->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <td class="align-middle text-center col-0">
                                                        <div class="position-relative">
                                                            <a class="d-block shadow-xl border-radius-xl">
                                                                <img src="../{{ $produit->example }}"
                                                                    alt="{{ $produit->example }}"
                                                                    class="img-fluid shadow border-radius-xl"
                                                                    style="max-width: 200px; max-height: 200px;">
                                                            </a>
                                                        </div>

                                                    </td>
                                                    <td colspan="2">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <input type="text" class="form-control invisible-input"
                                                                    value="{{ $produit->nom }}" name="nom"
                                                                    placeholder="nom de produit">
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <input type="text" value="{{ $produit->prix }}"
                                                                    class="form-control invisible-input" name="prix"
                                                                    placeholder="prix">
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <p class="text-xs font-weight-bold mb-0"></p>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <input type="number"  min="1"  value="{{ $produit->stock }}"
                                                                class="form-control invisible-input col-1" name="stock"
                                                                placeholder="stock">
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">
                                                            <input type="text" value=" {{ $produit->description }}"
                                                                class="form-control invisible-input" name="description"
                                                                placeholder="description">
                                                        </span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <button type="submit" class="badge badge-sm bg-gradient-success"
                                                            type="submit">Enregistrer</button>
                                                    </td>
                                                </form>
                                                <td class="align-middle">
                                                    <form method="post"
                                                        action="{{ route('produits.destroy', $produit->id) }}"
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
                                        @endforeach
                                @endif
                                <form method="POST" action="{{ route('produits.add', $autoentrepreneur->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tr id="hiddenDiv" class="hidden-row">

                                        <td class="align-middle text-center">
                                            <div class="input-field ">

                                                <label class="custum-file-upload custum-produit-upload" for="file">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill=""
                                                            viewBox="0 0 22 22">
                                                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                                            <g stroke-linejoin="round" stroke-linecap="round"
                                                                id="SVGRepo_tracerCarrier"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path fill=""
                                                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="text">
                                                        <span>Click-ez ici</span>
                                                    </div>
                                                    <input type="file" id="file" name="photo">
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <input type="text" class="form-control" value=""
                                                        name="nom" placeholder="nom de produit">
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <input type="text" class="form-control" name="prix"
                                                        placeholder="prix">
                                                </p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"></p>
                                            <p class="text-xs text-secondary mb-0">
                                                <input type="number" min="1" class="form-control" name="stock"
                                                    placeholder="stock">
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <input type="text" class="form-control" name="description"
                                                    placeholder="description">
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-sm mb-0">Sauvgarder</button>
                                                <div class="avatar-group mt-2">

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </form>
                                </tbody>
                            </table>

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
                    <h6>Statistiques des Produits</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix Unitaire</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre de Ventes</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Revenu Total</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pourcentage du Total des Ventes</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productStatics as $productStatic)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{ $productStatic->nom }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $productStatic->prix }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $productStatic->devis_count }}</p>
                                    </td>
                                    <td>
                                        @php
                                            $revenuTotal = $productStatic->devis_count * $productStatic->prix;
                                        @endphp
                                        <p class="text-sm font-weight-bold mb-0">{{ $revenuTotal }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        @php
                                            $pourcentageVentes = ($productStatic->devis_count / $totalDevis) * 100;
                                        @endphp
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">{{ number_format($pourcentageVentes, 1) }}%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="{{ $pourcentageVentes }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pourcentageVentes }}%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                
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
