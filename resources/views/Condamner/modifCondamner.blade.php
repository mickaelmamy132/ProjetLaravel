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
                        <a href="#" class="active">edite</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>modifier le situation</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form class="m" action="{{URL::to('index/tableCondamner/editCondamner/'.$condamner->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>situation</h3>
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
                            <option value="en detention(e)" {{ $condamner->situation === 'en detention(e)' ? 'selected' : '' }}>en detention(e)</option>
                            <option value="Evadé(e)"{{ $condamner->situation === 'Evadé(e)' ? 'selected' : '' }}>Evadé(e)</option>
                            <option value="Décès(e)"{{ $condamner->situation === 'Décès(e)' ? 'selected' : '' }}>Décès(e)</option>
                            <option value="Hospitalisè(e)"{{ $condamner->situation === 'Hospitalisè(e)' ? 'selected' : '' }}>Hospitalisè(e)</option>
                        </select> 
                    </div>
                    <div class="form-actionsM">
                        <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
