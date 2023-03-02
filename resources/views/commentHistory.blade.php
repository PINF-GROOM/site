<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
</head>
<body>
    <div id="content">
        <x-header></x-header>
        <x-admin.comment-history name="Produit 1" location="Bordeaux, Nouvelle-Aquitaine, France" commentDate="30/03/2023" dates="22/11/2023 - 27/11/2023"  id="6" number="4" note="4.26" description="On remarque une grande similitude entre les courbes générées avant et après la modification. D’après nos recherches, la principale différence entre les 2 programmes maintenant concerne la mémoire." ></x-admin.historical>
    </div>
</body>
</html>
