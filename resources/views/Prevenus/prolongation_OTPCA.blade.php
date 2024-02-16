@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>ajout d'un prolongation</h1>
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
                        <a href="#" class="active">prolongation_OTPCA_ou_OPCI</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>OTPCCA_ou_OPCI</h3>
                    <i class="fa fa-pen"></i>
                </div>
                <form class="m" action="{{ URL::to('index/tablePrevenus/prolongation_OTPCA_CO/'. $prevenus->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>observation</h3>
                    @if (session()->has('message'))
                        <div class="alert alert-danger text-center">{{ session('message') }}</div>
                    @endif
                    <p> <strong> le prevenu nomme: {{ $prevenus->nom }} </strong></p>
                    <p> <strong> par le juge: {{ $prevenus->mandataire }} </strong> </p>
                    <p> <strong> n° dossier: {{ $prevenus->numero }}/{{ $prevenus->type }} </strong> a reçu une </p>
                    </p>
 
                    <div class="card-body">
                    </div>

                    <div class="form-input form-input-group">
                        <select name="OTPCA" id="">
                            <option value="">...</option>
                            <option value="OTPCA">OTPCA</option>
                            <option value="OPCI">OPCI</option>
                        </select>
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">date de declaration</label>
                        <input type="date" name="date_modif" required max="3">
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
