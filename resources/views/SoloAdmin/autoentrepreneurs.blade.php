@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                          <h6 class="text-white text-capitalize ps-3">Auto-entrepreneurs de la plateforme </h6>
                        </div>
                      </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <form class="ml-9 mt-5" action="{{ route('admin.recherche') }}"
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
    @if (!empty($autoentrepreneurs))
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autoentrepreneur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adresse</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de Clients</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de Fournisseurs</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre d'Opérations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autoentrepreneurs as $autoentrepreneur)
                <tr>
                    <td class="text-xs font-weight-bold mb-0">
                        <div class="d-flex px-2 py-1">
                            <div>
                                <a>
                                    <span class="fa-stack fa-lg">
                                        
                                        <i class="material-icons opacity-10">worker</i>
                                      </span>                                                            </a>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $autoentrepreneur->Nom_entreprise }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $autoentrepreneur->email }}</p>
                            </div>
                        </div>
                        
                        
                    </td>
                    <td class="text-xs font-weight-bold mb-0">{{ $autoentrepreneur->adresse }}</td>
                    <td class="text-center text-xs font-weight-bold mb-0">{{ $autoentrepreneur->contact }}</td>
                    <td class="text-center text-xs font-weight-bold mb-0">{{ $autoentrepreneur->nbr_client }}</td>
                    <td class="text-center text-xs font-weight-bold mb-0">{{ $autoentrepreneur->nbr_fournisseur }}</td>
                    <td class="text-center text-xs font-weight-bold mb-0">{{ $autoentrepreneur->nbr_operation }}</td>
                </tr>
            @endforeach
        </tbody>
    @endif
</table>

</div>
</div>
</div>
</div>
</div>
@endsection

</div>
</main>