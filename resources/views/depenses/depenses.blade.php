@extends('layouts.head')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Vos dépenses</h6>
                    </div>
                    
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <div class="d-flex align-items-center">
                                <div class=" d-flex align-items-center navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 ">

                                <label for="cat" class="me-3 card-header pb-3">Vos catégories:</label>
                                <select name="" id="cat" class="form-select produit-select form-control me-3">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                                    @endforeach
                                    <option value="0">Nouveau</option>
                                </select>  <button id="showRowButton" class="add-button-container p-2">+ Ajouter dépense</button> 

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
                                {{-- <form id="CategorieForm" method="POST" class="hidden-row p-0" action="{{route('fournisseures.addCategorie', $autoentrepreneur->id)}}">
                                    @csrf
                                    <input type="text" class="form-control produit-select" name="Newcategorie">
                                    <button class="btn btn-sm" type="submit">Ajouter</button>
                                </form>
                                <a id="showCategorieButton" class="add-button-container p-2 me-2">+ Ajouter Catégorie</a>
                                --}}
                            </div>
                            <table class="table align-items-center mb-5" id="myTable">
                                @if (!empty($depenses))
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Montant</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Dépense</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Limite Dépense</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mode de Paiement</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                                            <th colspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opérations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($depenses as $depense)
                                            <tr>
                                                <form method="post" action="{{ route('depenses.update', $depense->id) }}" class="p-0">
                                                    @csrf
                                                    @method('patch')
                                                    <td>
                                                        <input type="text" class="form-control invisible-input" name="description" value="{{ $depense->description }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control invisible-input" name="montant" value="{{ $depense->montant }}">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="date" class="form-control invisible-input" name="date_depense" value="{{ $depense->date_depense }}">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="date" class="form-control invisible-input" name="date_limit_depense" value="{{ $depense->date_limit_depense }}">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="text" class="form-control invisible-input" name="mode_paiement" value="{{ $depense->mode_paiement }}">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <select name="categorie" id="cat" class="form-select form-control invisible-input">
                                                            @foreach ($categories as $categorie)
                                                                <option value="{{ $categorie->id }}" @if($categorie->categorie == $depense->categorie) selected value="{{ $depense->categorie}}" @endif>{{ $categorie->categorie }}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                      
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <button type="submit" class="badge badge-sm bg-gradient-success">Enregistrer</button>
                                                    </td>
                                                </form>
                                                <td class="align-middle">
                                                    <form method="post" action="{{ route('depenses.destroy', $depense->id) }}" class="p-0">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="bin-button" type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 7" class="bin-top">
                                                                <line stroke-width="4" stroke="white" y2="5" x2="39" y1="5"></line>
                                                                <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357" y1="1.5" x1="12"></line>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 33 39" class="bin-bottom">
                                                                <mask fill="white" id="path-1-inside-1_8_19">
                                                                    <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                                                                </mask>
                                                                <path mask="url(#path-1-inside-1_8_19)" fill="white" d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"></path>
                                                                <path stroke-width="4" stroke="white" d="M12 6L12 29"></path>
                                                                <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 89 80" class="garbage">
                                                                <path fill="white" d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">{{ 'Aucune dépense' }}</td>
                                        </tr>
                                @endif
                    
                                    <tr id="hiddenRow" class="hidden-row">
                                        <form method="post" action="{{ route('depenses.add', $autoentrepreneur->id) }}" class="p-6">
                                            @csrf
                                            <td>
                                                <input type="text" class="form-control invisible-input" name="description" placeholder="Description">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control invisible-input" name="montant" placeholder="Montant">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="date" class="form-control invisible-input" name="date_depense">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="date" class="form-control invisible-input" name="date_limit_depense">
                                            </td>
                                            <td class="align-middle text-center">
                                                <input type="text" class="form-control invisible-input" name="mode_paiement" placeholder="Mode de Paiement">
                                            </td>
                                            <td class="align-middle text-center">
                                                <select name="categorie" id="cat" class="form-select produit-select form-control me-3">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                                                    @endforeach
                                                    <option value="0">Nouveau</option>
                                                </select>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <button class="badge badge-sm bg-gradient-success" type="submit">Enregistrer</button>
                                            </td>
                                        </form>
                                        <td class="align-middle">
                                            <button class="bin-button" id="hideDivLink">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 7" class="bin-top">
                                                    <line stroke-width="4" stroke="white" y2="5" x2="39" y1="5"></line>
                                                    <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357" y1="1.5" x1="12"></line>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 33 39" class="bin-bottom">
                                                    <mask fill="white" id="path-1-inside-1_8_19">
                                                        <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                                                    </mask>
                                                    <path mask="url(#path-1-inside-1_8_19)" fill="white" d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"></path>
                                                    <path stroke-width="4" stroke="white" d="M12 6L12 29"></path>
                                                    <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 89 80" class="garbage">
                                                    <path fill="white" d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
 
@endsection

</div>
</main>
