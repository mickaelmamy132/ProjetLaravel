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
                <form action="{{ URL::to('index/tableCondamner/editCondamnerSituation/'.$condamner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>les modifications de situation</h3>
                    <p> <strong> le prevenu nomme: {{$condamner->nom}} </strong> a ete déclarer </p>
                    </p>

                    <div class="card-body"> 
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div> 

                    <div class="form-input form-input-group">
                        <select name="situation" id="" required>
                            <option value="">...</option>
                            <option value="transfere(e)" {{ $condamner->situation === 'transfere(e)' ? 'selected' : '' }}>transfere(e)</option>
                            <option value="passagers(e)" {{ $condamner->situation === 'passagers(e)' ? 'selected' : '' }}>passagers(e)</option>
                            <option value="en detention(e)" {{ $situation === 'en detention(e)' ? 'selected' : '' }}>en detention(e)</option>
                            <option value="Evadé(e)"{{ $situation === 'Evadé(e)' ? 'selected' : '' }}>Evadé(e)</option>
                            <option value="Décès(e)"{{ $situation === 'Décès(e)' ? 'selected' : '' }}>Décès(e)</option>
                            <option value="Hospitalisè(e)"{{ $situation === 'Hospitalisè(e)' ? 'selected' : '' }}>Hospitalisè(e)</option>
                        </select> 
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">date de declaration</label>
                        <input type="date" name="date_modif" required>
                    </div><br>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
