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
                <form action="{{ URL::to('index/tableCondamner/ajoutCondamner/ajoutcondamnLiberer/'.$prevenus->id) }}" method="POST"
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
                        <input type="text" name="status" value="{{ $statut }}" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date de liberation</label>
                        <input type="date" name="date_liberation" required>
                    </div><br>

                    <div class="form-actions">
                        <a href="{{ URL::to('#') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">effectuer</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
