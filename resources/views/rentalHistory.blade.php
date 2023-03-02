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
        <x-admin.historical name="Produit 1" location="Bordeaux, Nouvelle-Aquitaine, France" dates="22/11/2023 - 27/11/2023" status="P" contact="adresse.mail@gmail.com" number="5" estimate="4512" id="6" link="ghj.html" ></x-admin.historical>
        <x-admin.historical name="Produit 1" location="Bordeaux, Nouvelle-Aquitaine, France" dates="22/11/2023 - 27/11/2023" status="A" contact="adresse.mail@gmail.com" number="5" estimate="4512" id="6" link="ghj.html" ></x-admin.historical>
        <x-admin.historical name="Produit 1" location="Bordeaux, Nouvelle-Aquitaine, France" dates="22/11/2023 - 27/11/2023" status="PF" contact="adresse.mail@gmail.com" number="5" estimate="4512" id="6" link="ghj.html" ></x-admin.historical>
        <x-admin.historical name="Produit 1" location="Bordeaux, Nouvelle-Aquitaine, France" dates="22/11/2023 - 27/11/2023" status="AF" contact="adresse.mail@gmail.com" number="5" estimate="4512" id="6" link="ghj.html" ></x-admin.historical>
    </div>
</body>
</html>
