@extends('layouts.indexInfos')
@section('contenu')
    <main>
        @php \Carbon\Carbon::setLocale('fr'); @endphp
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
                        <a href="#">table_prevenus</a>
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
            <div class="modal-dialog">
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
                                        nommé:</strong> {{ $prevenus->nom }}
                                    {{ $prevenus->prenom }}<strong> ecrou n° :</strong> {{ $prevenus->id }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="modal"
                            aria-label="Close">Non</button>
                        <button type="button" class="btn btn-danger ml-3" data-bs-dismiss="Modal_supprimer"
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/tablePrevenus/supprimer/' . $prevenus->id) }}" method="POST"
                            class="mx-auto">
                            @csrf
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center"> nom
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
                            <button type="submit" class="btn btn-danger mt-3">oui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-data">
            <div class="todo">
                <h1>Informations Personnelles</h1>
                <div style="float: left">
                    <img src="{{ asset($prevenus->photo) }}" alt="Photo de profil"
                        style="width: 190px; height: 200px; margin-bottom: 20px;">
                </div>
                <p><strong>N° ecrou:</strong> {{ $prevenus->id }}-P </p>
                <p><strong>N° dossier:</strong> {{ $prevenus->numero }}</p>
                <p><strong>type:</strong> {{ $prevenus->type }}</p>
                <p><strong>Nom:</strong> {{ $prevenus->nom }} </p>
                <p><strong>prenom:</strong> {{ $prevenus->prenom }} </p>
                <p><strong>naissance:</strong>
                    @if (strpos($prevenus->naissance, '-') !== false)
                        @php
                            $dateNaissance = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $prevenus->naissance);
                        @endphp
                        {{ ' le ' . ($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')) }}
                    @else
                        {{ $prevenus->naissance }}
                    @endif
                </p>
                <p><strong>lieu:</strong> {{ $prevenus->lieu }} </p><br>
                @if ($prevenus->cin)
                <p><strong>Cin:</strong> {{ $prevenus->cin }} </p><br>
                <p><strong>date de délivrance:</strong>{{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_delivrance)->translatedFormat('j F Y') }}</p><br>

                @else
                @endif

                <p><strong>nationalité:</strong> {{ $prevenus->nationalité }} </p>
                <p><strong>profession:</strong> {{ $prevenus->profession }} </p>
                <p><strong>pere:</strong> {{ $prevenus->pere }}</p><br>
                <p><strong>mere:</strong> {{ $prevenus->mere }}</p>
                <p><strong>marié:</strong> {{ $prevenus->marié }}</p>
                <p><strong>enfant:</strong> {{ $prevenus->enfant }}</p><br>
                <p><strong>adresse:</strong> {{ $prevenus->adresse }}</p>
                <p><strong>contact:</strong> {{ $prevenus->contacte }}</p>
                <p><strong>categorie:</strong> {{ $prevenus->categorie }}</p><br>
                <p><strong>status:</strong>{{ $prevenus->status }}
                    @if ($prevenus->date_status)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_status)->translatedFormat('j F Y') }}
                    @else
                        {{ $prevenus->status }}
                    @endif
                </p><br>
                <p><strong>Etat:</strong>{{ $prevenus->etat }}
                    @if ($prevenus->date_etat)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_etat)->translatedFormat('j F Y') }}
                </p><br>
            @else
                @endif
                </p><br>
                <p><strong>situation:</strong>{{ $prevenus->situation }}
                    @if ($prevenus->date_situation)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_situation)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p>
                <br>
                <p><strong>sexe:</strong> {{ $prevenus->sexe }}</p><br>
                <p><strong>age:</strong> {{ $prevenus->ageDate . ' ans' }} ({{ $prevenus->age }})</p><br>
                <p><strong>date-ecrou:</strong>
                    @if ($prevenus->date_ecrou)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_ecrou)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p>
                <br>
                <p><strong>inculpation:</strong> {{ $prevenus->inculpation }}</p><br>
                <p><strong>classification:</strong>
                    @if ($prevenus->classification)
                        {{ $prevenus->classification }}
                    @else
                    @endif

                </p><br>
                <p><strong>peine:</strong>
                    @if ($prevenus->peine)
                        {{ $prevenus->peine }}
                        {{ $prevenus->unite_peine }}
                    @else
                    @endif
                </p>
                <br>

                <p><strong>mandataire:</strong> {{ $prevenus->mandataire }}</p><br>
                @if ($prevenus->status !=="non jugé")
                @else
                    <p><strong>observation:</strong>{{ $prevenus->observation }}
                        @if ($prevenus->date_observation)
                            {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_observation)->translatedFormat('j F Y') }}
                        @else
                        @endif
                    </p>
                    <br>
                @endif


                <p><strong>date liberation ou mandataire:</strong>
                    @if ($prevenus->date_fin_peine)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_fin_peine)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>

                <p><strong>date de liberation apres jugement ou prolongation MD:</strong>
                    @if ($prevenus->date_fin_remise_peine)
                        {{ ' le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_fin_remise_peine)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>
                <div class="form-actions">
                    <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-warning mt-3"><i
                            class="fas fa-arrow-left"></i></a>
                    <a href="{{ URL::to('index/tablePrevenus/informationPrev/historique/' . $prevenus->id) }}"
                        class="btn btn-info mt-3"><i class="fas fa-history"></i></a>
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
