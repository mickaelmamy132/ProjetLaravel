@php \Carbon\Carbon::setLocale('fr'); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des detenus</title>
    <style>
        .show {
            display: block !important;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a,
        .pagination span {
            padding: 5px 10px;
            font-size: 14px;
        }

        .dropdown-menu-up {
            top: auto;
            bottom: 100%;
        }

        #modale_utilisateur {
            display: none;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 67%;
            width: 50%;
            height: 50%;
            padding-top: 40px;
        }

        #modalContent {
            background-color: #fefefe;
            margin: 2% auto;
            padding-top: 10px;
            border: 1px solid #888;
            border-radius: 10%;
            position: relative top: 0;
            right: 0;
            width: 30%;
            height: 50%;
        }
    </style>
</head>

<body>
    {{-- sidebar --}}
    <section id="sidebar">
        @if (Session::has('utilisateur'))
            <?php $utilisateur = \App\Models\Utilisateur::find(Session::get('utilisateur')); ?>
            @if ($utilisateur)
                <a href="#" class="brand">
                    <i class="fa fa-smile"></i>
                    <span class="text">administrateur</span>
                </a>
                <ul class="side-menu top">
                    <li class="{{ request()->is('index') ? 'active' : '' }}">
                        <a href="{{ url('/index') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="text">DASHBOARD</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('index/tablePrevenus') ? 'active' : '' }}">
                        <a href="{{ URL::to('index/tablePrevenus') }}">
                            <i class="fa fa-exclamation"></i>
                            <span class="text">Prevenus</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('index/tableCondamner') ? 'active' : '' }}">
                        <a href="{{ URL::to('index/tableCondamner') }}">
                            <i class="fa fa-solid fa-handcuffs"></i>
                            <span class="text">Condamner</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('index/tableLiberer') ? 'active' : '' }}">
                        <a href="{{ URL::to('index/tableLiberer') }}">
                            <i class="fa fa-walking"></i>
                            <span class="text">Liberer</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('index/tableEvader') ? 'active' : '' }}">
                        <a href="{{ URL::to('index/tableEvader') }}">
                            <i class="fa fa-user-secret"></i>
                            <span class="text">Evader,Hospitaliser,Décès</span>
                        </a>
                    </li>
                </ul>
                <ul class="side-menu">

                    <li>
                        <a href="{{ URL::to('Login_up') }}" class="quitte">
                            <i class="fa fa-sign-out-alt"></i>
                            <span class="text">Se déconnecter</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ URL::to('Login_up') }}" class="quitte">
                            <i class="fa fa-sign-out-alt"></i>
                            <span class="text">se connecter</span>
                        </a>
                    </li>
            @endif
        @else
            <li>
                <a href="{{ URL::to('Login_up') }}" class="quitte">
                    <i class="fa fa-sign-out-alt"></i>
                    <span class="text">se connecter</span>
                </a>
            </li>
        @endif

        </ul>
    </section>
    {{-- fin sidebar --}}

    {{-- content --}}

    <section id="content">

        @if (Session::has('utilisateur'))
            <?php $utilisateur = \App\Models\Utilisateur::find(Session::get('utilisateur')); ?>
            @if ($utilisateur)
                <nav class="navbar">
                    <i class="fa fa-bars"></i>
                    <a href="#" class="nav-link"></a>

                    <a href="{{ URL::to('sign_in') }}"
                        style="background-color: rgb(38, 171, 38); padding: 5px; border-radius: 5px;">
                        <i class="fa fa-user" style="margin-left: 15px;"></i>
                        <i class="fa fa-plus"></i>
                    </a>

                    <a href="{{ URL::to('index/listeLiberer') }}" class="notification"><i class="fa fa-bell"
                            style="margin-left: 10px;">
                        </i>
                        <span class="num">{{ $condamnerNombre }}</span>
                    </a>

                    <div id="modale_utilisateur">
                        <div id="modalContent">
                            <div class="modal-body d-flex justify-content-center align-items-center">
                                <form action="{{ URL::to('index/Edite_utilisateur/' . $utilisateur->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <img src="{{ asset('/imageUtilisateur/' . $utilisateur->photo) }}"
                                        style="width: 80px;height: 80px; border-radius:15%; display: block; margin: 0 auto; border-radius: 50%;object-fit: cover;"
                                        class="profile" alt="">
                                    <p  style="text-align: center;">Utilisateur: {{ $utilisateur->nom }}</p>
                                    <div style=" display: block; margin: 0 auto; text-align: center;">
                                        <button type="submit" class="profile btn btn-info">
                                            modifier
                                        </button>
                                        <button  type="button" class="profile btn btn-danger"  id="closeModal"
                                            title="Afficher_utilisateur">
                                            fermer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <button id="profileButton" class="profile" title="Afficher_utilisateur" style=" border-radius: 40%; border: 0px;">
                        <img src="{{ asset('/imageUtilisateur/' . $utilisateur->photo) }}" class="profile"
                            alt="">
                    </button>
            @else
                <nav class="navbar">
                    <i class="fa fa-bars"></i>
                    <a href="#" class="nav-link"></a>

                    <a href="{{ URL::to('sign_in') }}"
                        style="background-color: green; padding: 5px; border-radius: 5px;">
                        <i class="fa fa-user" style="margin-left: 15px;"></i>
                        <i class="fa fa-plus"></i>
                    </a>

                    <a href="{{ URL::to('index/listeLiberer') }}" class="notification"><i class="fa fa-bell"
                            style="margin-left: 10px;">
                        </i>
                        <span class="num">{{ $condamnerNombre }}</span>
                    </a>

                    <a href="#" class="profile">
                        <img src="{{ asset('/image_Default/imae_default.jp') }}" class="profile" alt="">
                    </a>
                </nav>
            @endif
        @else
            <nav class="navbar">
                <i class="fa fa-bars"></i>
                <a href="#" class="nav-link"></a>

                <a href="{{ URL::to('sign_in') }}"
                    style="background-color: green; padding: 5px; border-radius: 5px;">
                    <i class="fa fa-user" style="margin-left: 15px;"></i>
                    <i class="fa fa-plus"></i>
                </a>

                <a href="{{ URL::to('index/listeLiberer') }}" class="notification"><i class="fa fa-bell"
                        style="margin-left: 10px;">
                    </i>
                    <span class="num">{{ $condamnerNombre }}</span>
                </a>

                <a href="#" class="profile">
                    <img src="{{ asset('/image_Default/imae_default.jp') }}" class="profile" alt="">
                </a>
            </nav>
        @endif
        {{-- fin main --}}

        {{-- ---debut--- --}}
        @yield('contenu')
        {{-- ------fin-- --}}

    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('profileButton');
            var modale = document.getElementById('modale_utilisateur');
            var closeModal = document.getElementById('closeModal');

            btn.addEventListener('click', function() {
                if (modale.style.display === 'block') {

                    modale.style.display = 'none';
                } else {
                    modale.style.display = 'block';
                    modale.style.right = '0';
                }
            });

            closeModal.addEventListener('click', function() {
                modale.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target === modale) {
                    modale.style.display = 'block';
                }
            });
        });
    </script>


    <script src="{{ asset('chart.js-3.3.2/package/dist/chart.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="{{ asset('javascript/script2.js') }}"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.js"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.min.js"></script>


</body>

</html>
