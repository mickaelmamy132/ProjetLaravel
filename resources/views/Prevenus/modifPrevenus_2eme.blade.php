@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>modifier le status du detenus</h1>
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
                        <a href="#" class="active">edite_Etat</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>modifier l'Etat'</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form class="m" action="{{URL::to('index/tablePrevenus/editPrevenus/'.$prevenus->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf 
                    <h3>Etat</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>
                    <div class="form-input form-input-group"> 
                        <label for="">etat: </label>
                        <select name="etat" id="" required>
                            <option value="">...</option>
                            <option value="non jugé" {{ $etat === 'non jugé' ? 'selected' : '' }}>non jugé</option>
                            <option value="Cassassionnaire" {{ $etat === 'Cassassionnaire' ? 'selected' : '' }}>Cassassionnaire</option>
                            <option value="Appelant"  {{ $etat === 'Appelant' ? 'selected' : '' }}>Appelant</option>
                            <option value="Opposant"  {{ $etat === 'Opposant' ? 'selected' : '' }}>Opposant</option>
                            <option value="Passager"  {{ $etat === 'Passager' ? 'selected' : '' }}>Passager</option>
                        </select><br>
                    </div>
                    <div class="form-input form-input-group">
                        <label for="">date de declaration</label>
                        <input type="date" name="date_modif" required>
                    </div><br>
                    <div class="form-actionsM">
                        <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
