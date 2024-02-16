@extends('layouts.index')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Prevenus</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">tablePrevenus</a>
                    </li>
                </ul>
            </div>
            <a href="{{URL::to('index/tablePrevenus/liste_prevenus')}}" style="margin-left: 350px;justify-content: center;align-items: center;grid-gap: 10px;" class="btn-telecharger">
                <i class="fa fa-book"></i>
                <span class="text">Prevenus</span>
            </a>
            <a href="{{URL::to('index/tablePrevenus/ajoutPrevenus')}}" class="btn-telecharger">
                <i class="fa fa-plus"></i>
                <span class="text">ajouter</span>
            </a> 
        </div>
        <ul class="box-info">
            <li>
                <i class="fa fa-exclamation"></i>
                <span class="text">
                    <h3>prevenus</h3>
                    <p>nombre: {{ $nombrePrevenus }}</p>
                </span>
            </li>
            <li>
                <i class="fa fa-user-shield"></i>
                <span class="text">
                    <h3>Inculpes</h3>
                    <p>nombre: {{ $nombreInculpes }} </p>
                </span>
            </li>
            <li>

                <i class="fa fa-shield-alt"></i>
                <span class="text">
                    <h3>Accuses</h3>
                    <p>nombre: {{ $nombreAccuses }} </p>
                </span>
            </li>
        </ul>
        <!-- resources/views/votre_vue.blade.php -->

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Liste des prévenus, inculpés et accusés</h3>
                    <form action="{{ URL::to('index/tablePrevenus') }}" method="GET">
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
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Ecrou</th>
                            <th>n°</th>
                            <th>type</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prevenus as $prevenuses)
                            <tr>
                                <td>
                                    <img src="{{ asset($prevenuses->photo) }}">
                                </td>
                                <td>{{ $prevenuses->id }}-P</td>
                                <td>{{ $prevenuses->numero }}</td>
                                <td>{{ $prevenuses->type }}</td>
                                <td>{{ $prevenuses->nom }}</td>
                                <td>{{ $prevenuses->prenom }}</td>
                                <td>{{ $prevenuses->categorie }}</td>
                                <td>{{ $prevenuses->status }}</td>
                                <td>{{ $prevenuses->age }}</td>
                                <td>
                                    <div class="dropdown" id="dropdown{{ $prevenuses->id }}">
                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                            type="button">Action</button>
                                        <ul class="dropdown-menu dropdown-menu-end-top">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('index/tablePrevenus/informationPre/' . $prevenuses->id) }}">Information
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('index/tablePrevenus/editInformation/' . $prevenuses->id) }}">Modifier
                                                    information
                                                </a>
                                            </li>
                                            {{-- pour les prolongation --}}
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item" href="#">
                                                    <span>mandat de dépôt</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ URL::to('index/tablePrevenus/prolongation/' . $prevenuses->id) }}">prolongation
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ URL::to('index/tablePrevenus/prolongation_OTPCA/' . $prevenuses->id) }}">OTPCA/OPCI
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            {{-- pour les situation et status --}}
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item" href="#">
                                                    <span>Situation/Etat</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ URL::to('index/tablePrevenus/edit/'. $prevenuses->id) }}">modifier le
                                                            situation
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ URL::to('index/tablePrevenus/edit_status/'. $prevenuses->id) }}">modifier l'etat
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('index/tablePrevenus/apreJugement_verifi/' . $prevenuses->id) }}">Après
                                                    jugement
                                                </a>
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
