<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/templetPdf.css" type="text/css" media="all" />
</head>

<body>
  <div>
    <div class="py-4">
      <div class="px-14 py-6">
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-full align-top">
                <div>
                  <img src="<?php echo $data[0]['logo']; ?>" class="h-12" />
                </div>
              </td>

              <td class="align-top">
                <div class="text-sm">
                  <table class="border-collapse border-spacing-0">
                    <tbody>
                      <tr>
                        <td class="border-r pr-4">
                          <div>
                            <p class="whitespace-nowrap text-slate-400 text-right">Date</p>
                            <p class="whitespace-nowrap font-bold text-main text-right"><?php echo $data[0]['date_operation']; ?></p>
                          </div>
                        </td>
                        <td class="pl-4">
                          <div>
                            <p class="whitespace-nowrap text-slate-400 text-right">Numéro de facture</p>
                            <p class="whitespace-nowrap font-bold text-main text-right"><?php echo $data[0]['facture_id']; ?></p>

                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="bg-slate-100 px-14 py-6 text-sm">
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-1/2 align-top">
                <div class="text-sm text-neutral-600">
                  <p class="font-bold">Fournisseur Entreprise : {{$data[0]['fournisseur_nom']}}</p>
                  <p>Contact: {{$data[0]['fournisseur_contact']}}</p>
                  <p>E-mail:  {{$data[0]['fournisseur_email']}}</p>
                  <p>Adresse: {{$data[0]['fournisseur_adresse']}}</p>
                </div>
              </td>
              <td class="w-1/2 align-top text-right">
                <div class="text-sm text-neutral-600">
                  <p class="font-bold">Entreprise Client : {{$data[0]['auto_nom']}}</p>
                  <p>Contact: {{$data[0]['auto_contact']}}</p>
                  <p>E-mail:  {{$data[0]['auto_email']}}</p>
                  <p>Adresse: {{$data[0]['auto_adresse']}}</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="px-14 py-10 text-sm text-neutral-700">
        <table class="w-full border-collapse border-spacing-0">
          <thead>
            <tr>
              <td class="border-b-2 border-main pb-3 pl-3 font-bold text-main">#</td>
              <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Détails du produit</td>
              <td class="border-b-2 border-main pb-3 pl-2 text-center font-bold text-main">Qté.</td>

              {{-- <td class="border-b-2 border-main pb-3 pl-2 text-right font-bold text-main">Prix</td> --}}

              {{-- <td class="border-b-2 border-main pb-3 pl-2 pr-3 text-right font-bold text-main">Total prix</td> --}}
            </tr>
          </thead>
          <tbody>
            @php
            $i=1;
           
          @endphp
          @foreach ($produits as $produit)
            
          <tr>
          <td class="border-b py-3 pl-3">{{$i++}}.</td>
          <td class="border-b py-3 pl-2"><?php echo $produit['produit_nom']; ?></td>
          <td class="border-b py-3 pl-2 text-center"><?php echo $produit['Quantité']; ?></td>
        

        </tr>
          @endforeach
          
            <tr>
              <td colspan="7">
                <table class="w-full border-collapse border-spacing-0">
                  <tbody>
                    <tr>
                      <td class="w-full"></td>
                      <td>
                        <table class="w-full border-collapse border-spacing-0">
                          <tbody>
                            {{-- <tr>
                              <td class="border-b p-3">
                                <div class="whitespace-nowrap text-slate-400">Total net :</div>
                              </td>
                              <td class="border-b p-3 text-right">
                                <div class="whitespace-nowrap font-bold text-main"></div>
                              </td>
                            </tr> --}}
                           
                            {{-- <tr>
                              <td class="bg-main p-3">
                                <div class="whitespace-nowrap font-bold text-white">Total :</div>
                              </td>
                              <td class="bg-main p-3 text-right">
                                <div class="whitespace-nowrap font-bold text-white"></div>
                              </td>
                            </tr> --}}
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-14 text-sm text-neutral-700">
        <p class="text-main font-bold">Details de paiement :</p>
       
        <p> Mode de paiement : <?php echo $data[0]['Modedepaiement']; ?><p>

      </div>
     

      {{-- <div class="px-14 py-10 text-sm text-neutral-700">
        <p class="text-main font-bold">Notes</p>
        <p class="italic"></p>
      </div> --}}

      <footer class="fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
        SOLO TRACK DOCS
        <span class="text-slate-300 px-2">|</span>
        CONTACT@solotrack.com
        <span class="text-slate-300 px-2">|</span>
        +1-202-555-0106
      </footer>
    </div>
  </div>
</body>

</html>
