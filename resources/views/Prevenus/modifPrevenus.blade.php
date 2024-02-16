@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>modifier le status du prevenus</h1>
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
                        <a href="#" class="active">edite_status</a>
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
                <form class="m" action="{{URL::to('index/tablePrevenus/editPrev/'.$prevenus->id)}}"
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
                            <option value="Cassassionnaire">Cassassionnaire</option>
                            <option value="Appelant"  {{$prevenus->status === 'Appelant' ? 'selected' : ''}}>Appelant</option>
                            <option value="Opposant"  {{$prevenus->status === 'Opposant' ? 'selected' : ''}}>Opposant</option>
                            {{-- <option value="Passager"  {{$prevenus->status === 'Passager' ? 'selected' : ''}}>Passager</option> --}}
                        </select><br>
                    </div>
                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">suivant</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
