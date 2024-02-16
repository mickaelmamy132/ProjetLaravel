@extends('layouts.index')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Evader</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">tableEvader</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="box-info">
            <li>
                <i class="fa fa-user-secret"></i>
                <span class="text">
                    <h3>Evader</h3>
                    <p>nombre: {{$evader}} </p>
                </span>
            </li>
            <li>
                <i class="fa fa-ambulance"></i>
                <span class="text">
                    <h3>Hospitalisé</h3>
                    <p>nombre: {{$hospitaliser}} </p>
                </span>
            </li>
            <li>
                <i class="fa fa-cross"></i>
                <span class="text">
                    <h3>Décès</h3>
                    <p>nombre: {{$deces}} </p>
                </span>
            </li>
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>listes des evader</h3>
                    <form action="{{URL::to('index/tableEvader')}}" method="GET">
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
                                <td>{{ $condamner->id }}-c</td>
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
                                                    href="{{ URL::to('index/tableEvader/informationCond/' . $condamner->id) }}">information</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ URL::to('index/tableCondamner/edit/' . $condamner->id) }}">modifier
                                                    situation</a></li>
                                            {{-- <li><a class="dropdown-item"
                                                    href="{{ URL::to('index/tableCondamner/remise/' . $condamner->id) }}">remise
                                                    de peine</li> --}}
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

            </div>
            {{-- <div class="todo">
                <div class="head">
                    <h3>status</h3>
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-filter"></i>
                </div>
                <ul class="todo-list">
                    <li>
                        <p>list</p>
                        <i class="fa fa-ellipsis-v"></i>
                    </li>
                </ul>
            </div> --}}
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

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

            dropdownSubmenus.forEach(function(submenu) {
                submenu.addEventListener('mouseenter', function() {
                    this.querySelector('.dropdown-menu').classList.add('show');
                });

                submenu.addEventListener('mouseleave', function() {
                    this.querySelector('.dropdown-menu').classList.remove('show');
                });
            });
        });
    </script>
@endsection
