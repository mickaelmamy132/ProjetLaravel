<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>login</title>
</head>

<body style="background-image: url(imag_login.webp);
background-size: cover;">
    <form action="{{ URL::to('sign_up') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Ajouter le token CSRF -->
        <h3>Inscription</h3>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-danger text-center">{{ session('message') }}</div>
            @endif
        </div>
        <label for="">Nom d'utilisateur</label>
        <input type="text" name="nom" placeholder="Entre votre nom" min="4" required>
        <label for="">choississez votre photo</label>
        <input type="file" name="photo">
        <label for="">Entrez votre mot de passe</label>
        <input type="password" name="password" id="voir" placeholder="Entre votre mot de passe" min="4" required>
        <input class="jhj" type="checkbox" onclick="voirMotPasse()">
        <label for="">Confirmez votre mot de passe</label>
        <input type="password" name="re_password" placeholder="Confirmez votre mot de passe" required><br>
        <a href="{{ URL::to('/Login_up') }}">Se connecter avec un compte</a>
        <button type="submit">Ajouter</button>
    </form>


    <script src="{{ asset('javascript/script2.js') }}"></script>
</body>

</html>
