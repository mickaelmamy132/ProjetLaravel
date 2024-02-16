@extends('layouts.indexInfos')
@section('contenu')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Les information simplementaire</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">tableliberer</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">information</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Modal supression partie 1-->
        <div class="modal fade" id="Modal_supprimer" tabindex="-1" aria-labelledby="Modal_supprimer" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Avertissement de suppression</h5>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <div class="col-md-15 mb-3">
                                <p class="form-label text-align-center">voulez-vous vraiment supprimer le detenus
                                    libérer<strong>
                                        nommé:</strong> {{ $liberer->nom }}
                                    {{ $liberer->prenom }}<strong> ecrou n° :</strong> {{ $liberer->ecrou_prevenus }}</p>
                            </div>
                        </div>

                        
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="modal" aria-label="Close">Non</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="Modal_supprimer"
                            data-bs-toggle="modal" data-bs-target="#Modal_supprimer2">Oui</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal supression partie 2-->
        <div class="modal fade" id="Modal_supprimer2" tabindex="-1" aria-labelledby="Modal_supprimer2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">enthentification</h5>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/tableLiberer/supprimer/' . $liberer->id) }}" method="POST"
                            class="mx-auto">
                            @csrf

                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">nom
                                    :</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">mot de passe :</label>
                                <input type="password" class="form-control" id="voir" name="mot_de_pass" required>
                                <input class="jhj" type="checkbox" onclick="voirMotPasse()">
                            </div>

                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal" aria-label="Close"
                                onclick="rafraichirPage()">annuler</button>
                            <button type="submit" class="btn btn-danger mt-3">supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <p class="h3 text-success fw-bold">infos</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-danger text-center">{{ session('message') }}</div>
            @endif
        </div>

        <div class="table-data">
            <div class="todo">
                <h1>Informations Personnelles</h1>
                <div style="float: left">
                    <img src="{{ asset('/temp/' . $liberer->photo) }}" alt="Photo de profil"
                        style="width: 190px; height: 200px; margin-bottom: 20px;">
                </div>
                <p><strong>N° Ecrou_prevenus:</strong> {{ $liberer->ecrou_prevenus }}-C </p>
                <p><strong>N° Ecrou:</strong> {{ $liberer->id }}-C </p>
                <p><strong>numero:</strong> {{ $liberer->numero }} </p>
                <p><strong>type:</strong> {{ $liberer->type }} </p>
                <p><strong>Nom:</strong> {{ $liberer->nom }} </p>
                <p><strong>prenom:</strong> {{ $liberer->prenom }} </p>
                <p><strong>naissance:</strong>
                    @if (strpos($liberer->naissance, '-') !== false)
                        @php
                            $dateNaissance = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $liberer->naissance);
                        @endphp
                        {{ 'le ' . ($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')) }}
                    @else
                        {{ $liberer->naissance }}
                    @endif
                </p>
                <p><strong>a:</strong> {{ $liberer->lieu }} </p><br>
                <p><strong>nationalité:</strong> {{ $liberer->nationalité }}</p>

                @if ($liberer->cin)
                <p><strong>cin:</strong> {{ $liberer->cin }}</p>
                <p><strong>date de delivrance:</strong> {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $liberer->date_delivrance)->translatedFormat('j F Y') }}</p>
                @else
                @endif
                
                <p><strong>profession:</strong> {{ $liberer->profession }}</p>
                <p><strong>pere:</strong> {{ $liberer->pere }}</p><br>
                <p><strong>mere:</strong> {{ $liberer->mere }}</p>
                <p><strong>marié:</strong> {{ $liberer->marié }}</p>
                <p><strong>enfant:</strong> {{ $liberer->enfant }}</p><br>
                <p><strong>adresse:</strong> {{ $liberer->adresse }}</p>
                <p><strong>FKT:</strong> {{ $liberer->cartier }}</p>
                <p><strong>region de:</strong> {{ $liberer->region1 }}</p>
                <p><strong>commune :</strong> {{ $liberer->commune1 }}</p>
                <p><strong>district :</strong> {{ $liberer->district1 }}</p>
                <p><strong>contact:</strong> {{ $liberer->contacte }}</p>
                <p><strong>categorie:</strong> {{ $liberer->categorie }}</p><br>
                <p><strong>status:</strong> {{ $liberer->status }}</p><br>
                <p><strong>sexe:</strong> {{ $liberer->sexe }}</p><br>
                <p><strong>age:</strong> {{ $liberer->age }}</p><br>
                <p><strong>date de libération:</strong>
                    {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $liberer->date_liberation)->translatedFormat('j F Y') }}
                </p><br>
                <p><strong>inculpation:</strong> {{ $liberer->inculpation }}</p><br>
                <p><strong>mandataire:</strong> {{ $liberer->mandataire }}</p><br>
                <div class="form-actions">
                    <a href="{{ URL::to('index/tableLiberer') }}" class="btn btn-warning mt-3"><i
                            class="fas fa-arrow-left"></i></a>
                    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal"
                        data-bs-target="#Modal_supprimer"><i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <script>
            function voirMotPasse() {
                var indice = document.getElementById("voir");
                if (indice.type === "password") {
                    indice.type = "text";
                } else {
                    indice.type = "password";
                }
            }

            function rafraichirPage() {
                location.reload();
            }
        </script>
    </main>
@endsection
