<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vincent Masseron</title>


    {{-- Carte --}}
    <link href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" rel="stylesheet"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" crossorigin=""></script>
    <script type="text/javascript">

    </script>


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/carousel.css', 'resources/css/product.css', 'resources/js/app.js'])
</head>

<body>
    <x-header></x-header>
    <div id="content">
        <div class="productTop">
            <div id="carousel"></div>
            <div id="imagePopup"></div>
            <div class="productInfos">
                <div>
                    <h1>Désignation du produit</h1>
                    <p>Ville, région ou département</p>
                    <div>
                        <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt='bed icon' height='20'
                            width='30' />
                        <p>5 couchages</p>
                    </div>
                </div>
                <div class="rating">
                    <div>
                        <label>3,5</label>
                        <div class="stars">
                            <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}"
                                alt='rating icon fullstar' height='20' width='30' />
                            <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}"
                                alt='rating icon fullstar' height='20' width='30' />
                            <img src="{{ Vite::asset('resources/assets/icons/fullStar.svg') }}"
                                alt='rating icon fullstar' height='20' width='30' />
                            <img src="{{ Vite::asset('resources/assets/icons/halfStar.svg') }}"
                                alt='rating icon fullstar' height='20' width='30' />
                            <img src="{{ Vite::asset('resources/assets/icons/emptyStar.svg') }}"
                                alt='rating icon fullstar' height='20' width='30' />
                        </div>
                    </div>
                    <a class="discreet" href="prout">(Voir les avis)</a>
                </div>
            </div>
        </div>
        <p>Le Chalet Rytola est un magnifique chalet mitoyen au centre de Chamonix, faisant parti du nouvel hameau "Nid
            des Pècles". Ce chalet, au design moderne et nordique, vous offre une vue resplendissante sur le massif du
            Mont-Blanc, ce qui en fait un endroit idéal pour un séjour à Chamonix.
            <br /><br />
            Le Chalet Rytola a quatre chambres spacieuses avec salles de bains privées, ainsi qu'une salle de jeux dans
            laquelle il est possible d'ajouter trois list supplémentaires.
            Sur la terrasse, vous trouverez un jacuzzi, des transats, un barbecue, ainsi que des tables et chaises.
            Au sein du hameau Nid des Pècles, vous avez accès à un sauna et une salle de fitness, toutes deux partagées.
            Afin de rendre votre séjour encore plus agréable, nous pouvons vous offrir des services supplémentaires,
            tels que la préparation de vos petits-déjeuners, faire vos courses, s'occuper de la location de matériel de
            montagne, et autres services de conciergerie.
            <br /><br />
            La Chalet Rytola est à 5 minutes de marche du centre-ville, et un parking gratuit, souterrain, et exclusife
            au hameau est aussi à votre disposition lors de votre séjour.
            Ce chalet est la destination idéale pour une experience de luxe, en famille ou entre amis, dans la belle
            vallée de Chamonix.
            <br /><br />
            Le prix inclus le linge de lit, les serviettes et peignoirs, et le nettoyage du chalet.
            <br />
            Durant votre séjour, vous aurez un accès total au Chalet Rytola.
            Vous aurez aussi des créneaux horaires que vous pourrez utiliser pour réserver l'accès au sauna et à la
            salle de fitness.
        </p>
        <section id="reservation">
            <div class="box" id="calendar"></div>
            <div class="reservationInformations box">
                <h3>Réserver</h3>
                <p><strong>Du</strong> 22/11/2022 <strong>au</strong> 22/11/2022<br />
                    Séjour de 1 jour(s).
                </p>
                <div class="reservationDatas">
                    <div>
                        <p><strong>Saison</strong></p>
                        <p>Hiver</p>
                    </div>
                    <div>
                        <p><strong>Estimation<label>*</label></strong></p>
                        <p>2 138, 69 €</p>
                    </div>
                </div>
                <x-form.button>Réserver</x-form.button>
                <dfn><label>*</label> Estimation à caractère informatif uniquement. Le vrai prix est communiqué lors de
                    la confirmation de réservation.</dfn>
            </div>
        </section>
        <section id="moreInformations">
            <h2>Plus d'informations</h2>
            <div>
                <div class="moreInformationCard box">
                    <h3>Équipement du logement</h3>
                    <div class="moreInformationsItem">
                        <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt="beds icon">
                        <p>Cuisine équipée</p>
                    </div>
                    <div class="moreInformationsItem">
                        <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt="beds icon">
                        <p>Cuisine équipée</p>
                    </div>
                    <div class="moreInformationsItem">
                        <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt="beds icon">
                        <p>Cuisine équipée</p>
                    </div>
                    <div class="moreInformationsItem">
                        <img src="{{ Vite::asset('resources/assets/icons/beds.svg') }}" alt="beds icon">
                        <p>Cuisine équipée</p>
                    </div>
                </div>
            </div>
        </section>
        <div id="map" class="box">
        </div>
    </div>
</body>

</html>
