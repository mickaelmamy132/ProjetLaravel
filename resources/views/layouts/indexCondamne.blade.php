@php \Carbon\Carbon::setLocale('fr'); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleCondam.css') }}">
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

        .pagination a, .pagination span {
            padding: 5px 10px;
            font-size: 14px; /* Ajustez la taille de la police selon vos besoins */
        }
    </style>
</head>

<body>
    {{-- sidebar --}}
    <section id="sidebar">
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

                <a href="#" class="profile">
                    <img src="{{ asset('/imageUtilisateur/' . $utilisateur->photo) }}" class="profile"
                        alt="">
                </a>
            </nav>
        @else
            <nav class="navbar">
                <i class="fa fa-bars"></i>
                <a href="#" class="nav-link"></a>

                <a href="#" class="profile">
                    <img src="{{ asset('/image_Default/imae_default.jp') }}" class="profile" alt="">
                </a>
            </nav>
        @endif
    @else
        <nav class="navbar">
            <i class="fa fa-bars"></i>
            <a href="#" class="nav-link"></a>

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

    <script src="{{ asset('chart.js-3.3.2/package/dist/chart.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="{{ asset('javascript/script2.js') }}"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.js"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.min.js"></script>




</body>

</html>
