<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utils & Assets</title>

    <!-- Scripts -->
    <script>
    </script>

    <!-- Styles -->
    @vite(['resources/css/error.css', 'resources/js/app.js', 'resources/js/header.js'])
</head>

<body>
    <div id="content">
        <x-header></x-header>
        <div class="picText">
            <img class="picture" src="{{ Vite::asset('resources/assets/icons/maintenance.svg') }}" alt="icon maintenance">
            <div class="text">
                <h1 class="bold">Site en Maintenance</h1>
                <p>Le site est actuellement en maintenance technique et n'est pas disponible. <br/>Veuillez réessayer plus tard.</p>
                <x-form.button class="button">Revenir à l'acceuil</x-form.button>
            </div>
        </div>
    </div>
</body>

</html>
