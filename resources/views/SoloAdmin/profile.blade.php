@extends('layouts.admin')

@section('content')
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../images/admin.jpeg');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../images/logo1.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $admin->username }}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{ $admin->name }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">email</i>
                                    <span class="ms-1"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-1">Informations du profil</h6>
                                <p class="text-sm">Mettez à jour les informations de profil de votre compte</p>
                            </div>
                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('admin.profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">Nom</h6>
                                    <label for="full_name"></label>
                                    <input type="text" value="{{ $admin->name }}" id="full_name" name="nom"
                                        class="form-control p-2   mt-3 shadow-sm" aria-label="Nom complet">
                                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Nom d'utilisateur
                                    </h6>
                                    <input type="text" value="{{ $admin->username }}" id="full_name" name="usernom"
                                        class="form-control p-2  mt-3 shadow-sm" aria-label="Nom complet">
                                    <div class="text-center fit-content">
                                        <button type="submit"
                                            class="btn bg-gradient-dark  my-4 mb-2 col-auto">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-6">
                        <div class="card card-plain h-100 ">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-1">Paramètres de la plateforme</h6>
                                <p class="text-sm">Assurez-vous que votre compte utilise un mot de passe long et aléatoire
                                    pour rester sécurisé.</p>
                            </div>
                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('admin.password.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')



                                    <input type="text" id="full_name" name="old"
                                        class="form-control  mt-3 p-2  shadow-sm" placeholder="Mot de passe actuel"
                                        aria-label="Nom complet">

                                    <input type="text" id="full_name" name="new"
                                        class="form-control  mt-3 p-2 shadow-sm" placeholder="Nouveau Mot de passe"
                                        aria-label="Nom complet">
                                    <input type="text" id="full_name" name="confirm"
                                        class="form-control  p-2 mt-3 shadow-sm" placeholder="Confirmer le mot de passe"
                                        aria-label="Nom complet">



                                    <div class="text-center fit-content">
                                        <button type="submit"
                                            class="btn bg-gradient-dark  my-4 mb-2 col-auto">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row gx-4 mb-2">



                <div class="col-16 col-xl-8">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Consultations</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                @if (!empty($consultations))
                                    @foreach ($consultations as $consultation)
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-3 p-3 shadow-sm w-auto">
                                            <div class="avatar ms-3 me-3">
                                                <img src="../{{$consultation->logo}}" alt="{{$consultation->logo}}"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center w-auto">
                                                <h6 class="mb-0 text-sm">{{ $consultation->Nom_entreprise }}</h6>
                                                <p class="mb-0 text-xs">
                                                    {{ $consultation->categorie }}</p>
                                                <p class="text-uppercase text-body text-xs font-weight-bolder mt-3 w-auto" >
                                                    {{ $consultation->message }}</p>

                                                    @if ($consultation->reponse !== null)
                                                    <p class=" mt-2 ms-1"><strong>votre réponse :</strong> {{ $consultation->reponse }}</p>
                                               
                                            @else
                                            <form class="reply-form mt-2" style="display: none;" method="POST"
                                            action="{{ route('admin.consultation.reply', $consultation->id) }}">
                                            @csrf
                                            <input type="text" name="reponse" placeholder="reponse ici" required
                                                class="form-control mb-2">
                                            <button type="submit" class="btn btn-primary btn-sm ">Envoyer</button>
                                        </form>
                                    </div>
                           
                                        <a
                                            class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto reply-btn w-auto">Répondre</a>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    const replyButtons = document.querySelectorAll('.reply-btn');
    replyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const replyForm = this.previousElementSibling.querySelector('.reply-form');
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
            this.style.display = 'none'; // Hide the clicked reply button
        });
    });
});

        </script>
    @endsection

</div>
</main>
