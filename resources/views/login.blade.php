<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js'])
</head>

<body>
    <div id="content">
        <a class="logo" href="/"><img src="{{ Vite::asset('resources/assets/logo/long-name.svg') }}"
                alt="Logo Vincent Masseron"></a>
        <div id="loginBox">
            <h3>Connexion à l'espace administrateur<h2>
            <form action="controller.php" method="POST">
                <x-form.input style="shadow" placeholder="Identifiant"
                    icon="{{ Vite::asset('resources/assets/icons/user.svg') }}"></x-form.input>
                <x-form.input type="password" style="shadow" placeholder="Mot de passe"
                    icon="{{ Vite::asset('resources/assets/icons/password.svg') }}"></x-form.input>


                {{-- <input id="login" name=action type="submit" value="Se connecter"> --}}
                <x-form.input type="submit" content="Se connecter"></x-form.input>
                <figure>
                    <!-- Pour réserver l'emplacement même si vide -->
                    {{-- Identifiant ou mot de passe incorrect --}}
                </figure>
            </form>
        </div>
    </div>
</body>

</html>
