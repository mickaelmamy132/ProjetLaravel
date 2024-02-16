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
                <p><strong>FKT:</strong> {{ $condamners->cartier1 }}</p>
                <p><strong>Region :</strong> {{ $condamners->region1 }}</p>
                <p><strong>commune :</strong> {{ $condamners->commune1 }}</p>
                <p><strong>district :</strong> {{ $condamners->district1 }}</p>
                <p><strong>contact:</strong> {{ $condamners->contacte }}</p>
                <p><strong>categorie:</strong> {{ $condamners->categorie }} </p><br>
                <p><strong>status:</strong>{{ $condamners->status }}
                    @if ($condamners->date_status)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_status)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>
                <p><strong>situation:</strong>{{ $condamners->situation }}
                    @if ($condamners->date_situation)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_situation)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>
                <p><strong>sexe:</strong> {{ $condamners->sexe }}({{ $condamners->age }})</p><br>
                <p><strong>age:</strong> {{ $condamners->ageDate . ' ans' }}</p><br>
                <p><strong>date-ecrou:</strong>
                    {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_ecrou)->translatedFormat('j F Y') }}
                </p><br>
                <p><strong>inculpation:</strong> {{ $condamners->inculpation }}</p><br>
                <p><strong>classification:</strong>
                    @if ($condamners->classification)
                        {{ $condamners->classification }}
                    @else
                    @endif

                </p><br>
                <p><strong>peine:</strong> {{ $condamners->peine }} {{ $condamners->unite_peine }}</p><br>
                <p><strong>date liberation:</strong>
                    @if ($condamners->date_fin_peine)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_fin_peine)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>
                <p><strong>remise peine:</strong> {{ $condamners->remise_peine }} {{ $condamners->unite_remise_peine }}
                </p><br>
                <p><strong>date remise:</strong>
                    @if ($condamners->date_fin_remise_peine)
                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamners->date_fin_remise_peine)->translatedFormat('j F Y') }}
                    @else
                    @endif
                </p><br>
                <div class="form-actions">
                    <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger mt-3"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </main>
@endsection
