@props(['img', 'designation','localisation', 'couchages', 'description','etoiles', 'id','lien'])

<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <img src='{{ $img}}' alt='logement'height='120' width='200'/>
     <div>
        <div>
            <h3>
                {{ $designation }}
            </h3>
            <p>
                {{ $localisation}}
            <p>
            <p>
                {{ $couchages }}
            </p>

        </div>
        <div>
            <img src='' alt='etoile'/>
            <p>
                {{ $etoiles }}
            </p>
        </div>

    </div>
    <div>
        <p>
            {{ $description }}
        </p>
        <a href="{{ $lien }}">
            Voir plus de détails
        </a>
    </div>
</div>
