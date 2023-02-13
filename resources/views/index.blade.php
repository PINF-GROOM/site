<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <div id="content">
        <x-header></x-header>
        <x-index.card img="{{Vite::asset('resources/assets/demo/demo1.jpg')}}" designation="Produit 1" localisation="Donville-les-Bains, Normandie, France" couchages="5" description="On remarque une grande similitude entre les courbes générées avant et après la modification. D’après nos recherches, la principale différence entre les 2 programmes maintenant concerne la mémoire." etoiles="5,0" id="6" lien="lorem" ></x-index.card>
        <x-index.card img="{{Vite::asset('resources/assets/demo/demo1.jpg')}}" designation="Produit 1" localisation="Bordeaux" couchages="5" description="Rien à dire" etoiles="5,0" id="6" lien="fgkiol" ></x-index.card>
        <x-index.card img="{{Vite::asset('resources/assets/demo/demo1.jpg')}}" designation="Produit au nom beaucoup trop long" localisation="Bordeaux" couchages="5" description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, fuga doloribus optio rem molestiae in reprehenderit magnam accusamus natus soluta sequi, similique possimus vel animi dolor rerum dolore quibusdam sint?" etoiles="5,0" id="6" lien="fgkiol" ></x-index.card>
        <x-index.card img="{{Vite::asset('resources/assets/demo/demo1.jpg')}}" designation="Produit 1" localisation="Bordeaux" couchages="5" description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, fuga doloribus optio rem molestiae in reprehenderit magnam accusamus natus soluta sequi, similique possimus vel animi dolor rerum dolore quibusdam sint?" etoiles="5,0" id="6" lien="fgkiol" ></x-index.card>
    </div>
</body>
</html>
