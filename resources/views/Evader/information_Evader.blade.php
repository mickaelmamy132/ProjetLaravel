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
                        <a href="#">tableCondamner</a>
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

        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <p class="h3 text-success fw-bold">infos</p>
                </div>
            </div>
        </div>

        <!-- Modal supression partie 1-->
        <div class="modal fade" id="Modal_supprimer" tabindex="-1" aria-labelledby="Modal_supprimer" aria-hidden="true">
            <div class="modal-dialog modal-sl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Avertissement de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-danger text-center">{{ session('message') }}</div>
                            @endif
                            <div class="col-md-15 mb-3">
                                <p class="form-label text-align-center">voulez-vous vraiment supprimer le detenus<strong>
                                        nommé:</strong> {{ $condamners->nom }}
                                    {{ $condamners->prenom }}<strong> ecrou n° :</strong> {{ $condamners->id }}</p>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mr-5" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa fa-remove"></i></button>
                        <button type="button" class="btn btn-danger ml-3" data-bs-dismiss="Modal_supprimer"
                            data-bs-toggle="modal" data-bs-target="#Modal_supprimer2"><i class="fa fa-pen"></i></button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal supression partie 2-->
        <div class="modal fade" id="Modal_supprimer2" tabindex="-1" aria-labelledby="Modal_supprimer2" aria-hidden="true">
            <div class="modal-dialog modal-sl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">enthentification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/tableCondamner/supprimer/' . $condamners->id) }}" method="POST"
                            class="mx-auto">
                            @csrf
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">adresse mail
                                    :</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">mot de passe :</label>
                                <input type="password" class="form-control" id="voir" name="mot_de_pass" required>
                                <input class="jhj" type="checkbox" onclick="voirMotPasse()">
                            </div>

                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal" aria-label="Close"
                                onclick="rafraichirPage()">annuler</button>
                            <button type="submit" class="btn btn-danger mt-3">oui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <h1>Informations Personnelles</h1>
                @if (session()->has('message'))
                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                @endif
                <div style="float: left">
                    <img src="{{ asset('/imgCondamner/' . $condamners->photo) }}" alt="Photo de profil"
                        style="width: 190px; height: 200px; margin-bottom: 20px;">
                </div>
                <p><strong>N° Ecrou_prevenus:</strong> {{ $condamners->ecrou_prevenus }}-P </p>
                <p><strong>N°:</strong> {{ $condamners->numero }} </p>
                <p><strong>type:</strong> {{ $condamners->type }} </p>
                <p><strong>N° Ecrou:</strong> {{ $condamners->id }}-C </p>
                <p><strong>Nom:</strong> {{ $condamners->nom }} </p>
                <p><strong>prenom:</strong> {{ $condamners->prenom }} </p>
                <p><strong>naissance:</strong>
                    @if (strpos($condamners->naissance, '-') !== false)
                        @php
                            $dateNaissance = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $condamners->naissance);
                        @endphp
                        {{ 'le ' . ($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')) }}
                    @else
                        {{ $condamners->naissance }}
                    @endif
                </p>
                <p><strong>lieu:</strong> {{ $condamners->lieu }} </p><br>
                <p><strong>nationalité:</strong> {{ $condamners->nationalité }}</p>
                <p><strong>profession:</strong> {{ $condamners->profession }}</p>
                <p><strong>pere:</strong> {{ $condamners->pere }}</p><br>
                <p><strong>mere:</strong> {{ $condamners->mere }}</p>
                <p><strong>marié:</strong> {{ $condamners->marié }}</p>
                <p><strong>enfant:</strong> {{ $condamners->enfant }}</p><br>
                <p><strong>adresse:</strong> {{ $condamners->adresse }}</p>
                <p><strong>contact:</strong> {{ $condamners->contacte }}</p>
                <p><strong>categorie:</strong> {{ $condamners->categorie }} </p><br>
                <p><strong>status:</strong>
                    @if ($condamners->status)
                        {{ $condamners->status }}
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_status)->translatedFormat('j F Y') }}
                    @else
                        null
                    @endif
                </p><br>
                <p><strong>situation:</strong>
                    @if ($condamners->situation)
                        {{ $condamners->situation }}
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_situation)->translatedFormat('j F Y') }}
                    @else
                        null
                    @endif
                </p><br>
                <p><strong>sexe:</strong> {{ $condamners->sexe }}</p><br>
                <p><strong>age:</strong> {{ $condamners->age }}</p><br>
                <p><strong>date-ecrou:</strong>
                    {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_ecrou)->translatedFormat('j F Y') }}
                </p><br>
                <p><strong>inculpation:</strong> {{ $condamners->inculpation }}</p><br>
                <p><strong>classification:</strong>
                    @if ($condamners->classification)
                        {{ $condamners->classification }}
                    @else
                        null
                    @endif

                </p><br>
                <p><strong>peine:</strong> {{ $condamners->peine }} {{ $condamners->unite_peine }}</p><br>
                <p><strong>date liberation:</strong>
                    @if ($condamners->date_fin_peine)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_fin_peine)->translatedFormat('j F Y') }}
                    @else
                        null
                    @endif
                </p><br>
                <p><strong>remise peine:</strong> {{ $condamners->remise_peine }} {{ $condamners->unite_remise_peine }}
                </p><br>
                <p><strong>date remise:</strong>
                    @if ($condamners->date_fin_remise_peine)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_fin_remise_peine)->translatedFormat('j F Y') }}
                    @else
                        null
                    @endif
                </p><br>
                <div class="form-actions">
                    <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-warning mt-3"><i
                            class="fas fa-arrow-left"></i></a>
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
