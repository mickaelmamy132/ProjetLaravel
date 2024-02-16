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
                <form action="{{ URL::to('index/tableCondamner/ajoutCondamner/ajoutcondamnSanspeine/'.$prevenus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>verification apres jugement</h3>
                    <p> <strong> le prevenu nomme:</strong> {{ $prevenus->nom }} {{ $prevenus->prenom }} </p>
                    </p>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">status</label>
                        <select name="status" id="" disabled>
                            <option value="">...</option>
                            <option value="Travaux Force à perpétuité" {{$statut === 'Travaux Force à perpétuité' ? 'selected' : ''}}>Travaux Force à perpétuité</option> 
                            <option value="peine de mort" {{$statut === 'peine de mort' ? 'selected' : ''}}>peine de mort</option> 
                        </select>
                        <select name="status" id="" hidden>
                            <option value="">...</option>
                            <option value="Travaux Force à perpétuité" {{$statut === 'Travaux Force à perpétuité' ? 'selected' : ''}}>Travaux Force à perpétuité</option> 
                            <option value="peine de mort" {{$statut === 'peine de mort' ? 'selected' : ''}}>peine de mort</option> 
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
