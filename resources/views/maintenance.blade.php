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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/header.js'])
</head>

<body>
    <x-header></x-header>
    <div>
        <img src="{{ Vite::asset('resources/assets/icons/maintenance.svg') }}" alt="icon maintenance">
        <div>
            <h1>Site en Maintenance</h1>
            <p>Le site est actuellement en maintenance technique et n'est pas disponible. Veuillez réessayer plus tard.</p>
            <x-form.button>Revenir à l'acceuil</x-form.button>
        </div>
    </div>
</body>

</html>
