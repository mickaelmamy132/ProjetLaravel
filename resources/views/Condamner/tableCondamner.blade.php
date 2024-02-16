@extends('layouts.index')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>condamner</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">tableCondamner</a>
                    </li>
                </ul>
            </div>
            <a href="{{ URL::to('index/tableCondamner/Liste_condamner') }}"
                style="margin-left: 350px;justify-content: center;align-items: center;grid-gap: 10px;"
                class="btn-telecharger">
                <i class="fa fa-book"></i>
                <span class="text">Condamner</span>
            </a>
            <a href="{{ URL::to('index/tableCondamner/ajoutCondamner') }}" class="btn-telecharger">
                <i class="fa fa-plus"></i>
                <span class="text">ajouter</span>
            </a>
        </div>
        <ul class="box-info">

            <li>
                <i class="fa fa-solid fa-handcuffs"></i>
                <span class="text">
                    <h3>Emprisonner</h3> 
                    <p>nombre : {{ $nombreCondamnés }} </p>
                </span>
            </li>
            <li>
                <i class="fa fa-hard-hat"></i>
                <span class="text">
                    <h3>Travaux forcer</h3>
                    <p>nombre : {{ $nombreCondamnés_force }} </p>
                </span>
            </li>

            <li>
                <i class="fa fa-exclamation-triangle"></i>
                <span class="text">
                    <h3>Peine de mort et perpétuité</h3>
                    <p>nombre : {{ $association }} </p>
                </span>
            </li>

            <li>
                <i class="fa fa-shield-alt"></i>
                <span class="text">
                    <h3>preventive</h3>
                    <p>nombre : {{ $nombreCondamnés_preventive }} </p>
                </span>
            </li>

        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>listes des condamners</h3>
                    <form action="{{ URL::to('index/tableCondamner') }}" method="GET">
                        <div class="form-input">
                            <input type="search" name="search" placeholder="Recherche..." value="{{ request('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                @endif
                <table>

                    <head>
                        <tr>
                            <th>photo</th>
                            <th>ecrou</th>
                            <th>N°</th>
                            <th>type</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>categorie</th>
                            <th>status</th>
                            <th>age</th>
                        </tr>
                    </head>
                    @forelse ($condamners as $condamner)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('/imgCondamner/' . $condamner->photo) }}">
                                </td>
                                <td>{{ $condamner->id }}-C</td>
                                <td>{{ $condamner->numero }}</td>
                                <td>{{ $condamner->type }}</td>
                                <td>{{ $condamner->nom }}</td>
                                <td>{{ $condamner->prenom }}</td>
                                <td>{{ $condamner->categorie }}</td>
                                <td>{{ $condamner->status }}</td>
                                <td>{{ $condamner->age }}</td>
                                <td>
                                    <div class="dropdown" id="dropdown{{ $condamner->id }}">
                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                            type="button">action</button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item"
                                                    href="{{ URL::to('index/tableCondamner/informationCond/' . $condamner->id) }}">information</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ URL::to('index/tableCondamner/edit/' . $condamner->id) }}">modifier
                                                    situation</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ URL::to('index/tableCondamner/remise/' . $condamner->id) }}">remise
                                                    de peine</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{URL::to('index/tableCondamner/Liberation_Cond_view/'.$condamner->id)}}">Liberation conditionnelle</a>
                                            </li>
                                        </ul>
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
                {{-- <a class="dropdown-item" href="{{URL::to('index/tableCondamner/Liberation_Cond/'.$condamner->id)}}">Liberation conditionnelle</a> --}}
            </div>

        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');

            dropdowns.forEach(function(dropdown) {
                const dropdownMenu = dropdown.querySelector('.dropdown-menu');
                // const dropdownMenuF = dropdown.querySelector('.dropdown-menu-end');

                dropdown.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('show');
                    dropdownMenu.classList.add('dropdown-menu-up');
                });
            });
        });
    </script>
@endsection
