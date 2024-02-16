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
                        <a href="#" class="active">Verification apres jugement</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>Verification</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form action="{{ URL::to('index/tableCondamner/verification/' . $prevenus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>les Verification apres jugement</h3>
                    <p> <strong> le prevenu nomme:</strong> {{ $prevenus->nom }} {{ $prevenus->prenom }} </p>
                    </p>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">status</label>
                        <select name="status" id="" required>
                            <option value="">...</option>
                            <option value="Libérè">Libérè</option>
                            <option value="Detention préventive">Detention préventive</option>
                            <option value="Emprisonnement">Emprisonnement</option>
                            <option value="Travaux Force">Travaux Force</option>
                            <option value="Travaux Force à perpétuité">Travaux Force à perpétuité</option>
                            <option value="peine de mort">peine de mort</option>
                        </select>
                    </div><br>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">suivant</button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </main>
@endsection
