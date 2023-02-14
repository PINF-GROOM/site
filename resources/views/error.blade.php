<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/error.css', 'resources/js/app.js'])
</head>
<body>
    <div id="content">
        <x-header></x-header>
        <div class="picText">
            <img src="{{ Vite::asset('resources/assets/icons/error.svg') }}" alt="icon error" class="picture"/>
            <div class="text">
                <p class="bold">
                    Erreur
                    @php
                        $error=404;
                        echo $error;
                    @endphp
                </p>
                <p>
                    Vous avez dû prendre un mauvais sentier et vous voici perdu.
                </p>

                <x-form.button>Revenir à l'accueil</x-form.button>
            </div>
        </div>
    </div>
</body>
</html>

