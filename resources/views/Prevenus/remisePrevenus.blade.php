@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>remise de peine du prevenus</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">tablePrevenus</a>
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
                <form action="{{ URL::to('index/tablePrevenus/edithPeine/'.$prevenus->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>veillez changer la peine d'apres les remises pour :</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>
                    <div class="form-input form-input-group">
                        <label for="">Nom: </label>
                       <p> {{$prevenus->nom}} </p>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Prenom: </label>
                        <p> {{$prevenus->prenom}} </p>
                    </div><br>
                    

                    <div class="" id="inculpationGroup">
                        <label for="inculpation">peine</label>
                     
                        @php
                            $inculpations = explode(',', $prevenus->inculpation);
                            $peines = $prevenus->remise_peine === null ? explode(',', $prevenus->peine) : explode(',', $prevenus->remise_peine);
                        @endphp

                        @foreach ($inculpations as $key => $inculpation)
                            <div class="inculpation mb-2">
                                <div class="input-group">
                                    <input hidden type="text" class="form-control" name="inculpation[]"
                                        placeholder="inculpation" value="{{ $inculpation }}" required>
                                    <input type="number" class="form-control" name="peine[]" placeholder="peine en mois"
                                        value="{{ $peines[$key] }}" required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <button type="submit" class="btn btn-success">enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
