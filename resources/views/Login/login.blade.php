<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>login</title> 
</head>
 
<body style="background-image: url(imag_login.webp);
background-size: cover;">
    
        <form action="{{ URL::to('/Login_in') }}" method="POST">
            @csrf
            <h3>Login</h3>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-danger text-center">{{ session('message') }}</div>
                @endif
            </div>
            <label for="">Entrez votre Nom d'utilisateur</label> 
            <input type="text" name="nom" placeholder="Nom d'utilisateur" required>
            <label for="">Entrez votre mot de passe</label>
            <input type="password" name="password" id="voir" placeholder="Entre votre mot de passe" required>
            <input class="jhj" type="checkbox" onclick="voirMotPasse()">
            <button type="submit">connecter</button>
        </form>
  
    <script src="{{ asset('javascript/script2.js') }}"></script>
</body>

</html>
