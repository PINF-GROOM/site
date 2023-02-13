<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="content">
        <x-header></x-header>
        <x-form.button disabled small icon="{{ Vite::asset('resources/assets/icons/download.svg') }}">Bouton</x-form.button>
        <x-index.card img="{{Vite::asset('resources/assets/logo/long-name.svg')}}" designation="Produit 1" localisation="Bordeaux" couchages="5" description="dfghjkl" etoiles="5" id="6" lien="fgkiol" ></x-index.card>
    </div>
</body>
</html>
