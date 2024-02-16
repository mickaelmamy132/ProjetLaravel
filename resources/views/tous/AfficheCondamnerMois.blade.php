@extends('layouts.indexCondamne')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>DASHBOARD</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">liste des toutes les condamner et prevenus qui seront libérè le mois prochain</a>
                    </li>
                </ul>
            </div>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>listes des condamners</h3>
                        <i class="fa fa-search"></i>
                        <i class="fa fa-filter"></i>
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
                        @foreach ($condamners as $condamner)
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
                                                        href="{{ URL::to('index/tableCondamner/informationCond_libere/' . $condamner->id) }}">information
                                                    </a> 
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            
                        @endforeach
                    </table>
                    
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger mt-3"><i
                        class="fas fa-arrow-left"></i></a>
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
