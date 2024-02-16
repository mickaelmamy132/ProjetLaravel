@extends('layouts.index')
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
                        <a href="#" class="active">liste des toutes les Categorie</a>
                    </li>
                </ul>
            </div>
            {{-- <a href="{{ URL::to('index/impStat') }}" class="btn-telecharger">
                <i class="fa fa-download"></i>
                <span class="text">model 16</span>
            </a> --}}
            <button type="button" class="btn-telecharger" data-bs-toggle="modal" data-bs-target="#modele_16"><i
                    class="fa fa-download"></i>
                modele 16
            </button>

            <button type="button" class="btn-telecharger" data-bs-toggle="modal" data-bs-target="#modele_17"><i
                    class="fa fa-download"></i>
                modele 17
            </button>

            <button type="button" class="btn-telecharger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="fa fa-download"></i>
                synthèse
            </button>

        </div>
        <!-- Button trigger modal -->


        <!-- Modal modele 16-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">synthèse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/impStat') }}" method="POST" class="mx-auto">
                            @csrf
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Maison Centrale
                                    de:</label>
                                <input type="text" class="form-control" name="maison" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">Imprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- modle pour modele 18 --}}


        </div>

        <!-- Modal modele 17-->
        <div class="modal fade" id="modele_17" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">modele 17 imprimer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/imprimerstatisstique') }}" method="POST" class="mx-auto">
                            @csrf
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Maison Centrale
                                    de:</label>
                                <input type="text" class="form-control" name="maison" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Nom du
                                    GREFFIER-COMPTABLE:</label>
                                <input type="text" class="form-control" name="greffier" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">imprimer</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div> --}}
            </div>
        </div>
        </div>
        {{-- fin du modele 17 --}}

        {{-- modale pour le modele 16 --}}
        <div class="modal fade" id="modele_16" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title justify-content-center align-items-center text-align-center"
                            id="exampleModalLabel">modele 16</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <form action="{{ URL::to('index/imprimerTableau') }}" method="POST" class="mx-auto">
                            @csrf
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Maison Centrale
                                    de:</label>
                                <input type="text" class="form-control" name="maison" required>
                            </div>
                            <div class="col-md-15 mb-3">
                                <label for="validationCustom03" class="form-label text-align-center">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">imprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        </div>
        {{-- fin du modale 16 --}}

        <ul class="box-info">
            <li>
                <i class="fa fa-solid fa-handcuffs"></i>
                <span class="text">
                    <h3>condamner</h3>
                    <p>nombre: {{ $condamner }}</p>
                </span>
            </li>
            <li>
                <i class="fa fa-exclamation"></i>
                <span class="text">
                    <h3>prevenus</h3>
                    <p>nombre: {{ $prevenus }}</p>
                </span>
            </li>
            <li>
                <i class="fa fa-walking"></i>
                <span class="text">
                    <h3>liberer</h3>
                    <p>nombre: {{ $liberer }} </p>
                </span>
            </li>
        </ul>
        {{--  style="display: inline-block; width: 40%; margin-right: 7%;" --}}



        <div class="table-data" style="display: inline-block; width: 45%;margin-right: 2%;margin-left: 2%;">
            <div class="order">
                <div class="head">
                    <h3>Evasion</h3>
                </div>
                <div class="todo">
                    <canvas id="bar" aria-label="chart" role="img"></canvas>
                    <script src="{{ asset('chart.js-3.3.2/package/dist/chart.min.js') }}"></script>
                    <script>
                        const barCanvas = document.getElementById('bar');

                        const BarChart = new Chart(barCanvas, {
                            type: "bar",
                            data: {
                                labels: ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre",
                                    "octobre", "novembre", "decembre"
                                ],
                                datasets: [{
                                    data: [{{ $janvier }}, {{ $fevrier }}, {{ $mars }},
                                        {{ $avril }}, {{ $mai }}, {{ $juin }},
                                        {{ $juillet }}, {{ $Aout }}, {{ $septembre }},
                                        {{ $octobre }}, {{ $novembre }}, {{ $decembre }}
                                    ],
                                    backgroundColor: ["yellow", "green", "yellow", "green", "yellow", "green", "yellow",
                                        "green", "yellow", "green", "yellow", "green"
                                    ],
                                }]
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="table-data" style="display: inline-block; width: 45%;">
            <div class="order">
                <div class="head">
                    <h3>Hospitalisation</h3>
                </div>
                <div class="todo">
                    <canvas id="bart" aria-label="chart" role="img"></canvas>
                    <script src="{{ asset('chart.js-3.3.2/package/dist/chart.min.js') }}"></script>
                    <script>
                        const barCanvast = document.getElementById('bart');

                        const BarChartt = new Chart(barCanvast, {
                            type: "bar",
                            data: {
                                labels: ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre",
                                    "octobre", "novembre", "decembre"
                                ],
                                datasets: [{
                                    data: [{{ $janvier2 }}, {{ $fevrier2 }}, {{ $mars2 }},
                                        {{ $avril2 }}, {{ $mai2 }}, {{ $juin2 }},
                                        {{ $juillet2 }}, {{ $Aout2 }}, {{ $septembre2 }},
                                        {{ $octobre2 }}, {{ $novembre2 }}, {{ $decembre2 }}
                                    ],
                                    backgroundColor: ["yellow", "green", "yellow", "green", "yellow", "green", "yellow",
                                        "green", "yellow", "green", "yellow", "green"
                                    ],
                                }]
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="table-data" style="display: inline-block; width: 50%;margin-left: 25%;">
            <div class="order">
                <div class="head">
                    <h3>DECES</h3>
                </div>
                <canvas id="pieCanvas" aria-label="chart" role="img"></canvas>

                <script src="{{ asset('chart.js-3.3.2/package/dist/chart.min.js') }}"></script>

                <script>
                    const pieCanvas = document.getElementById('pieCanvas');

                    const PieChart = new Chart(pieCanvas, {
                        type: "bar",
                        data: {
                            labels: ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre",
                                "octobre", "novembre", "decembre"
                            ],
                            datasets: [{
                                data: [{{ $janvier3 }}, {{ $fevrier3 }}, {{ $mars3 }},
                                    {{ $avril3 }}, {{ $mai3 }}, {{ $juin3 }},
                                    {{ $juillet3 }}, {{ $Aout3 }}, {{ $septembre3 }},
                                    {{ $octobre3 }}, {{ $novembre3 }}, {{ $decembre3 }}
                                ],
                                backgroundColor: ["yellow", "green", "yellow", "green", "yellow", "green", "yellow",
                                    "green", "yellow", "green", "yellow", "green"
                                ],
                            }]
                        }
                    });
                </script>
            </div>
        </div>
    </main>
@endsection
