@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>ajouter une personne</h1>
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
                        <a href="#" class="active">modification</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>modification</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form action="{{ URL::to('index/tableCondamner/ajoutCondamner/ajoutPrevenusPreventive/'.$prevenus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>les modifications apres jugement</h3>
                    <p> <strong> le prevenu nomme:</strong> {{ $prevenus->nom }} {{ $prevenus->prenom }} a reçu une peine de detention préventive cause: {{ $prevenus->inculpation }} </p>
                    </p>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">status</label>
                        <select name="status" id="" required disabled> 
                            <option value="">...</option>
                            <option value="Detention préventive" {{$statut === 'Detention préventive' ? 'selected' : ''}} >Detention préventive</option>
                        </select>
                        <select name="status" id="" required hidden> 
                            <option value="">...</option>
                            <option value="Detention préventive" {{$statut === 'Detention préventive' ? 'selected' : ''}} >Detention préventive</option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date d'ecrou</label>
                        <input type="date" name="date_ecrou" required>
                    </div><br>

                    <div class="" id="inculpationGroup">
                        <label for="inculpation">inculpation</label>
                        @foreach (explode(',', $prevenus->inculpation) as $key => $inculpation)
                            <div class="inculpation mb-2">
                                <div class="input-group">
                                    <input  type="text" class="form-control" name="inculpation[]"
                                        placeholder="inculpation" value="{{ $inculpation }}" required>
                                    <input type="number" class="form-control" name="peine[]" placeholder="peine en mois"
                                        value="" required>
                                    {{-- <input type="number" class="form-control" name="peine[]" placeholder="peine en mois"
                                        value="{{ explode(',', $prevenus->peine)[$key] }}"> --}}
                                    {{-- <div class="input-group-append">
                                        <button type="button" class="btn btn-danger remove-inculpation">enlever</button>
                                    </div> --}}
                                    <select name="unite_peine[]" class="form-control" required>
                                        <option value="">...</option>
                                        <option value="jour">Jours</option>
                                        <option value="mois">Mois</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <button type="button" class="btn btn-primary add-inculpation">ajout</button> --}}
                    <p>la peine est estimer en mois</p>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">effectuer</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
