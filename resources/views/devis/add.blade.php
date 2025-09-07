@extends('layouts.head')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Ajouter devis</h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <form id="devis-form-id" method="post" enctype="multipart/form-data" action="{{ route('devis.store', $autoentrepreneur->id) }}" class="p-4">
                            @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Numéro</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Client</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-3 ml-4">
                                        Produits</th>
                                   
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mode paiement</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date operation</th>

                                </tr>
                            </thead>
                         
                            <tbody id="produit-table-body">
                              
                                    <tr>

                                        <td class="align-middle text-center">
                                            <input type="number" class="form-control" value="{{ $numero_devis }}"
                                                name="numero_devis">
                                        </td>
                                        <td class=" align-middle text-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <select name="client" id="clientSelect" class="form-select form-control">
                                                        @if ($clients)
                                                            @foreach ($clients as $client)
                                                                <option value="{{ $client->id }}">{{ $client->nom }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                        <option value="" id="ShowClientInput"> Nouveau client</option>
                                                    </select>
                                                </h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center" id="produit-container">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div class="produit-select-wrapper">
                                                    <select name="produits[]" class="form-select produit-select form-control">
                                                        <option value="0">Nouveau</option>

                                                        @foreach ($produits as $produit)
                                                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                                        @endforeach                                                      
                                                    </select>
                                                </div>
                                                <input type="number" placeholder="quantite"  class="form-control quantite" style="width: 100px;" name="quantite[]">
                                                <button type="button" id="add-produit-btn" class="btn btn-sm">+</button>
                                            </div>
                                        </td>
                                        
                                       
                                        <td class="align-middle text-center">
                                            <input type="text" class="form-control" name="mode_paiement">
                                        </td>
                                        <td class="align-middle text-center">
                                            <input type="date" class="form-control" name="date_operation">
                                        </td>


                                       

                                    </tr>

                                    <th colspan="8"
                                        class="text-center m-5 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nouveau client
                                    </th>
                                    <tr>

                                        <td class="align-middle text-center" colspan="2">
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <input type="text" class="form-control" name="nomClient"
                                                            placeholder="Nom de client">
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <input type="text" class="form-control" name="email"
                                                            placeholder="email">
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center" colspan="2">
                                            <p class="text-xs font-weight-bold mb-0"></p>
                                            <p class="text-xs text-secondary mb-0">
                                                <input type="text" class="form-control" name="adresse"
                                                    placeholder="adresse">
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <input type="text" class="form-control" name="contact"
                                                    placeholder="contact">
                                            </span>
                                        </td>


                                    </tr>
                                    <th colspan="8"
                                        class="text-center m-5 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nouveau produit
                                    </th>
                                    <tr>

                                        <td class="align-middle text-center">
                                            <div class="input-field">
                                                <label class="custum-file-upload custum-produit-upload" for="file">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill=""
                                                        viewBox="0 0 28 28">
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
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <input type="text" class="form-control" value="" name="nomProduit"
                                                        placeholder="nom de produit">
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
                                                <input type="number" class="form-control" name="stock"
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
                                            <input type="number" placeholder="quantite" class="form-control form-control-xs col-1" name="qantiteNew">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center text-sm" id="SaveOperation">
                                            <button class="badge badge-sm bg-gradient-success ml-3" type="submit">Enregistrer</button>
                                        </td>
                                        <td>
                                            <a class="bin-button btn_bottom" href="{{ route('devis', $autoentrepreneur->id) }}">
                                           
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
                                            </a></td>
                                    </tr>
                            </tbody>
                        </table>

                    </form>


                    </div>
                </div>
            </div>
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

