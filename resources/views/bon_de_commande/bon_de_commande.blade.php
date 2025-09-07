@extends('layouts.head')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Vos bons de commande :</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class=" d-flex align-items-center navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 ">

                            <a href="{{route('bon_de_commandes.add',$autoentrepreneur->id)}}" class="add-button-container">+ Ajouter bon de commande</a>
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
                                @if (!empty($bon_de_commandes))
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                fournisseur</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Produits</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Mode paiement</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date operation</th>
            
                                           
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                opération</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bon_de_commandes as $bon_de_commande)
                                            <tr id="TableRow" >
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <a
                                                                href="{{ route('bon_de_commandes.download.pdf', $bon_de_commande->id_bon_de_commande) }}">
                                                                <img src="../assets/img/download-pdf.png"
                                                                    class="avatar avatar-sm me-3">
                                                            </a>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $bon_de_commande->fournisseur_nom }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $bon_de_commande->fournisseur_adresse }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        @if(!empty($ProduitsChaquebon_de_commandes))
                                                        @foreach ($ProduitsChaquebon_de_commandes as $produit )
                                                            @if($produit->id_bon_de_commande ==$bon_de_commande->id_bon_de_commande)
                                                   
                                                        <h6 class="mb-0 text-sm">{{ $produit->produit_nom }}</h6>
                                                        <p class="text-xs text-secondary mb-0">Prix unitaire:
                                                            {{ $produit->produit_prix }}</p>
                                                                 <p class="text-xs text-secondary mb-0">Quantite:
                                                                {{ $produit->quantite }}</p>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $bon_de_commande->quantite }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $bon_de_commande->mode_paiement }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $bon_de_commande->date_operation }}</span>
                                                </td>
                                            
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $bon_de_commande->total_prix }}</span>
                                                </td>
                                                <td class="align-middle text-center"> 
                                                    <button id="showUpdateRow" class="editBtn"> <svg height="1em" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                    <form  method="post" action="{{ route('bon_de_commandes.destroy', $bon_de_commande->id) }}"
                                                        class="p-0">
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


                                            
                                <tr id="UpdateRow" class="hidden-row">
                                    <form method="post" action="{{ route('bon_de_commandes.update', $bon_de_commande->id_bon_de_commande) }}"
                                        class="p-6">
                                        @csrf
                                        @method('patch')
                                        <td>

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <select name="fournisseur" id="fournisseurSelect" class="form-select">
                                                        <option value="" id="ShowfournisseurInput">Nouveau fournisseur </option>

                                                        @if ($fournisseurs)
                                                            @foreach ($fournisseurs as $fournisseur)
                                                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </h6>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        @if(!empty($ProduitsChaquebon_de_commandes))
                                                        @foreach ($ProduitsChaquebon_de_commandes as $produit )
                                                            @if($produit->id_bon_de_commandes ==$bon_de_commande->id_bon_de_commandes)
                                                    
                                                        <h6 class="mb-0 text-sm">{{ $produit->produit_nom }}</h6>
                                                        <p class="text-xs text-secondary mb-0">Prix unitaire:
                                                            {{ $produit->produit_prix }}</p>
                                                            <p class="text-xs text-secondary mb-0">Quantite:
                                                                {{ $produit->quantite }}</p>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                    </div>
                                                    <select name="produit" id="ProduitSelect" class="form-select">
                                                        <option value="" id="ShowProduitInput">Nouveau produit

                                                        @if ($produits)
                                                            @foreach ($produits as $produit)
                                                                <option value="{{ $produit->id }}">{{ $produit->nom }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                        </option>

                                                    </select>
                                                </h6>
                                            </div>
                                            
                                        </td>
                                        <td class="align-middle text-center">
                                            <input type="number" class="form-control" placeholder="qantite" name="qantite" value="{{ $bon_de_commande->quantite }}">
                                        </td>
                                        <td class="align-middle text-center">
                                            <input type="text" class="form-control" name="mode_paiement" value="{{ $bon_de_commande->mode_paiement }}">
                                        </td>
                                        <td class="align-middle text-center">
                                            <input type="date" class="form-control" name="date_operation" value="{{ $bon_de_commande->date_operation }}">
                                        </td>
                                     
                                        <td class="align-middle text-center text-sm" id="SaveOperation">
                                            <button class="badge badge-sm bg-gradient-success"
                                                type="submit">Enregistrer</button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="bin-button" id="hideUpdateRow">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 7"
                                                    class="bin-top">
                                                    <line stroke-width="4" stroke="white" y2="5" x2="39"
                                                        y1="5"></line>
                                                    <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357"
                                                        y1="1.5" x1="12"></line>
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
                                        </td>
                                    </form>
                                </tr>
                                        @endforeach
                                   
                                @else
                                <tr class="m-6 col-auto">
                                        <td  colspan="5">{{ 'Aucune opération' }}</td>
                                    </tr>
                                @endif


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
        </div>
    </div>
    <script>
        document.getElementById('add-produit-btn').addEventListener('click', function () {
           var container = document.getElementById('produit-container');
       
           // Create a new div for the new row content
           var newRow = document.createElement('div');
           newRow.className = 'd-flex flex-row justify-content-between align-items-center';
       
           // Create select element wrapper
           var selectWrapper = document.createElement('div');
           selectWrapper.className = 'produit-select-wrapper';
       
           // Create select element
           var select = document.createElement('select');
           select.name = 'produits[]';
           select.className = 'form-select produit-select';
       
           // Assuming $produits is passed to the view and converted to JSON
           var produits = {!! json_encode($produits) !!};
           produits.forEach(function (produit) {
               var option = document.createElement('option');
               option.value = produit.id;
               option.textContent = produit.nom;
               select.appendChild(option);
           });
       
           selectWrapper.appendChild(select);
       
           // Create input element wrapper
           var inputWrapper = document.createElement('div');
           inputWrapper.className = 'input-wrapper';
       
           // Create input element
           var input = document.createElement('input');
           input.type = 'number';
           input.className = 'form-control quantite';
           input.style.width = '100px';
           input.name = 'quantite[]';
       
           inputWrapper.appendChild(input);
       
           // Create remove button
           var button = document.createElement('button');
           button.type = 'button';
           button.className = 'undo';
           button.textContent = '-';
           button.addEventListener('click', function () {
               container.removeChild(newRow);
           });
       
           // Append all elements to the newRow div
           newRow.appendChild(selectWrapper);
           newRow.appendChild(inputWrapper);
           newRow.appendChild(button);
       
           // Append the newRow div to the produit-container td
           container.appendChild(newRow);
       });
       
       
       </script>
@endsection

</div>
</main>
