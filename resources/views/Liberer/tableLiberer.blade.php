@extends('layouts.index')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Liberer</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">tableLiberer</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="box-info" style="width: 350px;">
            <li>
                <i class="fa fa-calendar-check"></i>
                <span class="text">
                    <h3>liberer</h3>
                    <p>nombre :{{ $nombreLiberer }}</p>
                </span>
            </li>
            {{-- <li>
                <i class="fa fa-user-shield"></i>
                <span class="text">
                    <h3>condamner</h3>
                    <p>present</p>
                </span>
            </li>
            <li>
                <i class="fa fa-shield-alt"></i>
                <span class="text">
                    <h3>condamner</h3>
                    <p>present</p>
                </span>
            </li> --}}
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>listes des libéres</h3>
                    <form action="{{ URL::to('index/tableLiberer') }}" method="GET">
                        <div class="form-input">
                            <input type="search" name="search" placeholder="Recherche..." value="{{ request('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <table>

                    <head>
                        <tr>
                            <th>photo</th>
                            <th>ecrou</th>
                            <th>N°</th>
                            <th>type</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>status</th>
                            <th>age</th>
                            <th>action</th>
                        </tr>
                    </head>
                    @forelse ($liberer as $liberers)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('/temp/' . $liberers->photo) }}">
                                </td>
                                <td>{{ $liberers->id }}</td>
                                <td>{{ $liberers->numero }}-c</td>
                                <td>{{ $liberers->type }}</td>
                                <td>{{ $liberers->nom }}</td>
                                <td>{{ $liberers->prenom }}</td>
                                <td>{{ $liberers->status }}</td>
                                <td>{{ $liberers->age }}</td>
                                <td>
                                    <div class=" d-flex-colum justify-content-center align-items-center">
                                        <a href="{{ URL::to('index/tablelibre/information/' . $liberers->id) }}"
                                            class="btn btn-warning my-1">information</i></a>

                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modele_16_{{ $liberers->id }}"><i class="fa fa-print"></i>
                                        </button>

                                        {{-- modale pour le liberer --}}
                                        <div class="modal fade" id="modele_16_{{ $liberers->id }}"tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title justify-content-center align-items-center text-align-center"
                                                            id="exampleModalLabel">imprimer du liberé</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div
                                                        class="modal-body d-flex justify-content-center align-items-center">
                                                        <form action="{{ URL::to('index/certificat_liberer/'.$liberers->id) }}"
                                                            method="POST" class="mx-auto">
                                                            @csrf
                                                            <div class="card-body">
                                                                @if (session()->has('message'))
                                                                    <div class="alert alert-danger text-center">
                                                                        {{ session('message') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-15 mb-3">
                                                                <label for="validationCustom03"
                                                                    class="form-label text-align-center">Maison Centrale
                                                                    de:</label>
                                                                <input type="text" class="form-control" name="maison"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-15 mb-3">
                                                                <label for="validationCustom03"
                                                                    class="form-label text-align-center">destination</label>
                                                                <input type="text" class="form-control" name="destination"
                                                                    required>
                                                            </div>
                                                           
                                                            <div class="col-md-15 mb-3">
                                                                <label for="validationCustom03"
                                                                    class="form-label text-align-center">motif</label>
                                                                <input type="text" class="form-control" name="motif"
                                                                    required>
                                                            </div>
                                                            
                                                            <div class="col-md-15 mb-3">
                                                                <label for="validationCustom03"
                                                                    class="form-label text-align-center">date</label>
                                                                <input type="date" class="form-control" name="date"
                                                                    required>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary mt-3" data-bs-dismiss="modal">imprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Aucun résultat trouvé.</td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </main>
@endsection
