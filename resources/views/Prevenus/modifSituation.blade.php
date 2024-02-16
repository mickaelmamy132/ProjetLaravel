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
                        <a href="#" class="active">edite_situation</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>modifier le situation</h3>
                    <i class="fa fa-pen"></i>
                </div>
                <form class="m" action="{{URL::to('index/tablePrevenus/edit_situation_Prevenus/'.$prevenus->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3>les modifications de situation</h3>
                    <p> <strong> le prevenu nomme: {{$prevenus->nom}} </strong> a ete déclarer </p>
                    </p>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <select name="situation" id="" required>
                            <option value="">...</option>
                            <option value="transfere(e)" {{ $prevenus->situation === 'transfere(e)' ? 'selected' : '' }}>transfere(e)</option>
                            <option value="passagers(e)" {{ $prevenus->situation === 'passagers(e)' ? 'selected' : '' }}>passagers(e)</option>
                            <option value="en detention(e)" {{ $prevenus->situation === 'en detention(e)' ? 'selected' : '' }}>en detention(e)</option>
                            <option value="Evadé(e)"{{ $prevenus->situation === 'Evadé(e)' ? 'selected' : '' }}>Evadé(e)</option>
                            <option value="Décès(e)"{{ $prevenus->situation === 'Décès(e)' ? 'selected' : '' }}>Décès(e)</option>
                            <option value="Hospitalisè(e)"{{ $prevenus->situation === 'Hospitalisè(e)' ? 'selected' : '' }}>Hospitalisè(e)</option>
                        </select> 
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">date de declaration</label>
                        <input type="date" name="date_modif" required>
                    </div><br>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">effectuer</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </main>
@endsection
