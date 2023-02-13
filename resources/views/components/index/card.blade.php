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
                <img src="{{Vite::asset('resources/assets/icons/beds.svg')}}" alt='bed'height='20' width='30'/>
                {{ $couchages }}
                @if($couchages==1)
                    couchage
                @else
                    couchages
                @endif
            </p>

        </div>
        <div>
            <img src="{{Vite::asset('resources/assets/icons/stars.svg')}}" alt='star'height='20' width='30'/>
            {{ $etoiles }}

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
