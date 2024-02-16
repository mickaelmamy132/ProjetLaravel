@php \Carbon\Carbon::setLocale('fr'); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleAjout.css') }}">
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des detenus</title>
</head>

<body>
    {{-- sidebar --}}
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="fa fa-smile"></i>
            <span class="text">administrateur</span>
        </a>
        
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
    {{-- fin content --}}

    {{-- end sidebar --}}



    <script src="{{ asset('javascript/script2.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.js"></script>
    <script src="/bootstrap-5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
