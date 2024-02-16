@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>remise de peine du detenus</h1>
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
                        <a href="#" class="active">remise</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>remise du date</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form action="{{ URL::to('index/tableCondamner/edithPeine/' . $condamner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>veillez changer la peine d'apres les remises pour :</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>
                    {{-- <div class="form-input form-input-group">
                        <label for="">Nom: </label>
                        <p> {{ $condamner->nom }} </p>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Prenom: </label>
                        <p> {{ $condamner->prenom }} </p>
                    </div><br> --}}
                    <p>le detenus <strong>nommé:</strong>{{$condamner->nom}} {{$condamner->prenom}}</p>
                    <div class="" id="inculpationGroup">
                        <label for="inculpation">inculpation</label>
                        @php
                            $inculpations = explode(',', $condamner->inculpation);
                            $peines = $condamner->remise_peine === null ? explode(',', $condamner->peine) : explode(',', $condamner->remise_peine);
                            // $unites_peine = $condamner->remise_peine === null ? explode(',', $condamner->unite_peine) : null;
                            $unites_peine = $condamner->unite_remise_peine === null ? explode(',', $condamner->unite_peine) : explode(',', $condamner->unite_remise_peine);
                        @endphp

                        @foreach ($inculpations as $key => $inculpation)
                            <div class="inculpation mb-2">
                                <div class="input-group">
                                    <input disabled type="text" class="form-control" name="inculpation[]"
                                        placeholder="inculpation" value="{{ $inculpation }}" required>
                                    <input hidden type="text" class="form-control" name="inculpation[]"
                                        placeholder="inculpation" value="{{ $inculpation }}" required>
                                    <input type="number" class="form-control" name="peine[]" placeholder="peine en mois"
                                        value="{{ $peines[$key] }}" required>
                                        <select name="unite_peine[]" class="form-control" required>
                                            <option value="">...</option>
                                            <option value="jour" {{ $unites_peine && $unites_peine[$key] === 'jour' ? 'selected' : '' }}>Jours</option>
                                            <option value="mois" {{ $unites_peine && $unites_peine[$key] === 'mois' ? 'selected' : '' }}>Mois</option>
                                        </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger">retour</a>
                        <button type="submit" class="btn btn-success">enregistrer</button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </main>
@endsection
